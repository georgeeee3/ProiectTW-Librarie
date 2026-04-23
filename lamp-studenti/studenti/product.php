<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalii Produs - Librarie Online</title>
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
            <div class="product-detail-container">
                <div class="product-detail-image">
                    <img src="" alt="Coperta" id="product-image">
                </div>
                <div class="product-detail-info">
                    <h1 id="product-title">Se încarcă...</h1>
                    <p class="author">de <a href="#" id="product-author">...</a></p>
                    <p class="description" id="product-description">...</p>
                    <p class="publish-date" id="product-publish-date"></p>
                    
                    <div class="product-actions">
                        <div class="meta-info">
                            <p id="product-format">...</p>
                            <p>ISBN: <span id="product-isbn">...</span></p>
                        </div>
                        <div class="price-block">
                            <span class="rrp-price" id="product-rrp"></span>
                            <span class="sale-price" id="product-price">...</span>
                        </div>
                        <div class="button-block">
                            <button class="btn-add-to-cart" id="add-to-cart-btn">Adaugă în Coș</button>
                            <button class="btn-add-to-favorites" id="add-to-fav-btn">Adaugă la Favorite</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer>
            <section class="newsletter-section">
                <h3>Abonează-te la newsletter!</h3>
                <form id="newsletterForm">
                    <label>Nume</label><input type="text" name="Nume" required><br>
                    <label>Email</label><input type="email" name="Email" required><br>
                    <button type="submit">Trimite</button>
                </form>
            </section>
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
        document.addEventListener("DOMContentLoaded", function() {
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

            if (typeof products === 'undefined') return;
            const params = new URLSearchParams(window.location.search);
            const productId = params.get('id');
            const product = products[productId];
            const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;

            function animateButton(btnId, msg, type) {
                const btn = document.getElementById(btnId);
                const original = btn.textContent;
                btn.textContent = msg;
                btn.classList.add(type === 'success' ? 'btn-success' : 'btn-warning');
                setTimeout(() => { btn.textContent = original; btn.classList.remove('btn-success', 'btn-warning'); }, 2000);
            }

            if (product) {
                document.title = product.title;
                document.getElementById('product-title').textContent = product.title;
                document.getElementById('product-author').textContent = product.author;
                document.getElementById('product-description').textContent = product.description;
                document.getElementById('product-image').src = product.image;
                document.getElementById('product-format').textContent = product.format;
                document.getElementById('product-isbn').textContent = product.isbn;
                document.getElementById('product-price').textContent = product.price;
                if(product.publishDate) document.getElementById('product-publish-date').textContent = product.publishDate;

                document.getElementById('add-to-cart-btn').addEventListener('click', function() {
                    if (isLoggedIn) {
                        fetch('api_user_actions.php', {
                            method: 'POST', headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ action: 'add_cart', product_id: productId })
                        }).then(r => r.json()).then(d => {
                            if(d.success) animateButton('add-to-cart-btn', '✅ Adăugat în DB!', 'success');
                            else alert(d.message);
                        });
                    } else {
                        let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
                        let existingItem = cart.find(item => item.id === productId);
                        if (existingItem) existingItem.qty += 1;
                        else cart.push({ id: productId, qty: 1 });
                        localStorage.setItem('shoppingCart', JSON.stringify(cart));
                        animateButton('add-to-cart-btn', '✅ Adăugat Local!', 'success');
                    }
                });

                document.getElementById('add-to-fav-btn').addEventListener('click', function() {
                    if (!isLoggedIn) { alert("Pentru Favorite trebuie să ai cont!"); window.location.href="account.php"; return; }
                    fetch('api_user_actions.php', {
                        method: 'POST', headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ action: 'add_fav', product_id: productId })
                    }).then(r => r.json()).then(d => {
                        if(d.success) animateButton('add-to-fav-btn', d.status==='added'?'❤️ Adăugat!':'⚠️ Deja favorit', 'success');
                    });
                });
            } else {
                document.getElementById('product-title').textContent = "Produs indisponibil";
            }
        });
    </script>
</body>
</html>