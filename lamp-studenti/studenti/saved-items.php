<?php
require 'db.php';
session_start();

$fav_items_db = [];
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT product_id FROM favorite_produse WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $fav_items_db = $stmt->fetchAll(PDO::FETCH_COLUMN);
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite - Librarie Online</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body id="top">

    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <span>📞 0770 461 545</span>
                <span>✉️ samatageorge19@gmail.com</span>
            </div>
            <div class="user-links">
                <a href="https://www.facebook.com/void1ku/" target="_blank">FACEBOOK</a>
                <a href="https://www.instagram.com/georgishkaa/" target="_blank">INSTAGRAM</a>
                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <span style="font-weight: bold; margin-right: 15px; text-transform: uppercase;">
                        SALUT, <?php echo htmlspecialchars($_SESSION['prenume']); ?>!
                    </span>
                    <a href="logout.php" style="color: #d92323; font-weight: bold;">LOGOUT</a>
                <?php else: ?>
                    <a href="account.php">ACCOUNT</a>
                <?php endif; ?>

                <a href="saved-items.php">SAVED ITEMS</a>
                <a href="basket.php">BASKET</a>
            </div>
        </div>
    </div>

    <div class="grid-container pagina-fara-sidebar">
        
        <header class="main-header">
            <div class="main-header-content">
                <a href="main.php" style="text-decoration: none;">
                    <img src="https://images.rawpixel.com/image_png_social_landscape/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDI0LTEyL3Jhd3BpeGVsb2ZmaWNlOV9yZXRyb19sb2dvX2Ffb3Blbl9ib29rX2JsYWNrX2FuZF93aGl0ZV9ub19zcGxhc180YjJlZGVmOC1lMWQwLTRiNzUtODhhMi1hZWY4N2JiZjlkN2IucG5n.png" alt="Logo" class="logo-image" style="width: 70px; height: auto;">
                </a>
                <nav class="meniu-navigare">
                    <ul>
                        <li><a href="new-in.php">NEW IN</a></li>
                        <li><a href="pre-order.php">PRE-ORDER</a></li>
                        <li><a href="fiction.php">FICTION</a></li>
                        <li><a href="non-fiction.php">NON-FICTION</a></li>
                        <li><a href="graphic-novels.php">GRAPHIC NOVELS & MANGA</a></li>
                        <li><a href="childrens.php">CHILDREN'S</a></li>
                        <li><a href="young-adult.php">YOUNG ADULT</a></li>
                    </ul>
                </nav>
                <div class="search-bar">
                    <div class="search-trigger" onclick="openSearch()">
                        Search...
                    </div>
                </div>
            </div>
        </header>

        <main>
            <div class="page-header" style="text-align: center; margin: 30px 0;">
                <h1>Produse Favorite ❤️</h1>
            </div>
            
            <div class="product-grid" id="favorites-items-container"></div>
        </main>

        <footer>
            <p style="text-align: center; margin-top: 20px;">samatageorge19@gmail.com</p>
        </footer>
    </div>

    <div id="searchOverlay" class="search-overlay" onclick="closeSearch(event)">
        <div class="search-popup">
            <span class="close-search" onclick="closeSearch(event, true)">&times;</span>
            <input type="text" id="liveSearchInput" placeholder="Cauta...">
            <div id="liveSearchResults" class="search-results-list"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="products_api.js.php"></script>

    <script>
        const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
        const dbFavs = <?php echo json_encode($fav_items_db); ?>;

        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById('favorites-items-container');
            
            if (!isLoggedIn) {
                container.innerHTML = '<div style="text-align:center; grid-column: 1/-1;"><h3>Nu ești autentificat</h3><p>Loghează-te pentru a vedea favoritele.</p><a href="account.php" style="font-weight:bold;">Mergi la Login</a></div>';
                return;
            }

            if (dbFavs.length === 0) {
                container.innerHTML = '<p style="text-align:center; grid-column: 1/-1;">Nu ai produse favorite.</p>';
                return;
            }

            dbFavs.forEach(pid => {
                const product = products[pid];
                if (product) {
                    container.innerHTML += `
                        <div class="product-item">
                            <a href="product.php?id=${pid}" style="text-decoration:none; color:inherit;">
                                <img src="${product.image}">
                                <h3>${product.title}</h3>
                            </a>
                            <p style="font-weight:bold; color:#d92323;">${product.price}</p>
                            <button class="btn-remove" onclick="removeFav('${pid}')">Șterge</button>
                        </div>
                    `;
                }
            });
        });

        window.removeFav = function(pid) {
            if(!confirm('Ștergi de la favorite?')) return;
            fetch('api_user_actions.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'remove_fav', product_id: pid })
            }).then(() => location.reload());
        }

        window.openSearch = function() { 
            document.getElementById('searchOverlay').style.display = 'block'; 
            document.getElementById('liveSearchInput').focus(); 
        }
        window.closeSearch = function(e,f){ if(f || e.target.className==='search-overlay'){ document.getElementById('searchOverlay').style.display='none'; } }
        document.getElementById('liveSearchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase(); let res = document.getElementById('liveSearchResults'); res.innerHTML='';
            if(filter.length<2) return;
            Object.keys(products).forEach(k => {
                if(products[k].title.toLowerCase().includes(filter))
                    res.innerHTML += `<a href="product.php?id=${k}" class="search-result-item"><img src="${products[k].image}"><div>${products[k].title}</div></a>`;
            });
        });
    </script>
</body>
</html>