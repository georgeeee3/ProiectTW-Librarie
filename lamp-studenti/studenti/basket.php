<?php
require 'db.php';
session_start();

$cart_items_db = [];
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT product_id, cantitate FROM cos_cumparaturi WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $cart_items_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coș - Librarie Online</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <div class="page-header">
                <h1>Coș de Cumpărături</h1>
            </div>
            <div class="cart-container">
                <div id="cart-items-list"></div>
                <div class="cart-summary" id="cartSummaryBlock">
                    <div class="summary-line">
                        <span>TOTAL: </span>
                        <span class="total-price" id="cart-total-price">0,00 lei</span>
                    </div>
                    <a href="checkout.php" class="cart-checkout-button">Finalizează Comanda</a>
                </div>
            </div>
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
        const dbCart = <?php echo json_encode($cart_items_db); ?>; 

        document.addEventListener("DOMContentLoaded", function() { renderCart(); });
        
        function parsePrice(p) { return p ? parseFloat(p.replace(' lei', '').replace('.', '').replace(',', '.')) : 0; }
        function formatMoney(a) { return a.toFixed(2).replace('.', ',') + ' lei'; }

        function renderCart() {
            const container = document.getElementById('cart-items-list');
            const summary = document.getElementById('cartSummaryBlock');
            container.innerHTML = ''; let total = 0;
            let cartItems = [];

            if (isLoggedIn) {
                cartItems = dbCart.map(item => ({ id: item.product_id, qty: item.cantitate }));
            } else {
                cartItems = JSON.parse(localStorage.getItem('shoppingCart')) || [];
            }

            if (cartItems.length === 0) {
                container.innerHTML = '<p style="text-align:center; padding:20px;">Coșul este gol.</p>';
                summary.style.display = 'none';
                return;
            }

            summary.style.display = 'block';
            cartItems.forEach(item => {
                const p = products[item.id]; 
                if (p) {
                    const line = parsePrice(p.price) * item.qty;
                    total += line;
                    container.innerHTML += `
                        <div class="cart-item">
                            <div class="cart-item-image"><img src="${p.image}"></div>
                            <div class="cart-item-details">
                                <h3><a href="product.php?id=${item.id}">${p.title}</a></h3>
                                <p>Preț: ${p.price}</p>
                            </div>
                            <div class="cart-item-quantity">
                                <label>Cant:</label>
                                <input type="number" value="${item.qty}" min="1" onchange="updateQty('${item.id}',this.value)">
                            </div>
                            <div class="cart-item-subtotal">${formatMoney(line)}</div>
                            <button class="btn-remove-simple" onclick="removeItem('${item.id}')"><i class="fas fa-trash"></i></button>
                        </div>`;
                }
            });
            document.getElementById('cart-total-price').textContent = formatMoney(total);
        }

        window.updateQty = function(pid, qty) {
            if (isLoggedIn) {
                fetch('api_user_actions.php', { method:'POST', body:JSON.stringify({action:'update_cart_qty', product_id:pid, qty:qty}) }).then(()=>location.reload());
            } else {
                let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
                let item = cart.find(i => i.id === pid);
                if(item) item.qty = parseInt(qty);
                localStorage.setItem('shoppingCart', JSON.stringify(cart));
                renderCart(); 
            }
        }

        window.removeItem = function(pid) {
            if(!confirm('Ștergi produsul?')) return;
            if (isLoggedIn) {
                fetch('api_user_actions.php', { method:'POST', body:JSON.stringify({action:'remove_cart', product_id:pid}) }).then(()=>location.reload());
            } else {
                let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
                cart = cart.filter(i => i.id !== pid);
                localStorage.setItem('shoppingCart', JSON.stringify(cart));
                renderCart();
            }
        }

        window.openSearch = function() { 
            document.getElementById('searchOverlay').style.display = 'block'; 
            document.getElementById('liveSearchInput').focus(); 
        }
        window.closeSearch = function(e,f){ if(f || e.target.className==='search-overlay'){ document.getElementById('searchOverlay').style.display='none'; } }
        document.getElementById('liveSearchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase(); let res = document.getElementById('liveSearchResults'); res.innerHTML='';
            if(filter.length<2) return;
            Object.keys(products).forEach(k => { if(products[k].title.toLowerCase().includes(filter)) res.innerHTML += `<a href="product.php?id=${k}" class="search-result-item"><img src="${products[k].image}"><div>${products[k].title}</div></a>`; });
        });
    </script>
</body>
</html>