<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coș - Librarie Online</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* CSS Specific pentru Coș */
        .cart-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            min-height: 400px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding: 15px 0;
            gap: 20px;
        }

        .cart-item-image img {
            width: 80px;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
        }

        .cart-item-details {
            flex: 2;
        }

        .cart-item-details h3 { font-size: 18px; margin: 0 0 5px 0; }
        .cart-item-details a { text-decoration: none; color: #333; }
        .cart-item-details .isbn { color: #777; font-size: 12px; }

        .cart-item-quantity {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-item-quantity input {
            width: 50px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cart-item-subtotal {
            font-weight: bold;
            font-size: 18px;
            width: 120px;
            text-align: right;
        }

        .btn-remove-simple {
            background: none;
            border: none;
            color: #dc3545;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .btn-remove-simple:hover { color: #a71d2a; }

        .cart-summary {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #eee;
            text-align: right;
        }

        .summary-line {
            font-size: 24px;
            font-weight: bold;
        }

        .cart-checkout-button {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 20px 0 0 auto;
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 15px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background 0.3s;
        }
        .cart-checkout-button:hover { background-color: #333; }

        .empty-page-text {
            text-align: center;
            font-size: 20px;
            color: #666;
            padding: 50px;
        }

        /* === STILURI NOI PENTRU BUTONUL DE CĂUTARE === */
        .search-trigger {
            display: inline-block;
            width: 200px; 
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 20px; 
            background-color: #fff;
            color: #777; 
            font-size: 14px;
            cursor: pointer;
            text-align: left;
            transition: border-color 0.3s;
        }
        .search-trigger:hover {
            border-color: #000;
        }

        /* Stiluri Live Search Popup */
        .search-overlay { display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); backdrop-filter: blur(5px); }
        .search-popup { background-color: white; width: 90%; max-width: 600px; margin: 100px auto; padding: 30px; border-radius: 12px; position: relative; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .close-search { position: absolute; right: 20px; top: 15px; font-size: 30px; cursor: pointer; color: #555; }
        .search-popup input { width: 100%; padding: 15px; font-size: 18px; border: 2px solid #eee; border-radius: 8px; outline: none; box-sizing: border-box; }
        .search-results-list { margin-top: 20px; max-height: 300px; overflow-y: auto; border-top: 1px solid #eee; }
        .search-result-item { display: flex; align-items: center; gap: 15px; padding: 10px; border-bottom: 1px solid #f5f5f5; text-decoration: none; color: inherit; }
        .search-result-item:hover { background-color: #f9f9f9; }
        .search-result-item img { width: 40px; height: 60px; object-fit: cover; border-radius: 4px; }
    </style>
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

                <a href="saved-items.php">SAVED ITEMS</a> <a href="basket.php">BASKET</a>
            </div>
        </div>
    </div>

    <div class="grid-container pagina-fara-sidebar">

        <header class="main-header">
            <div class="main-header-content">
                <a href="main.php" style="text-decoration: none;">
                    <img src="https://images.rawpixel.com/image_png_social_landscape/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDI0LTEyL3Jhd3BpeGVsb2ZmaWNlOV9yZXRyb19sb2dvX2Ffb3Blbl9ib29rX2JsYWNrX2FuZF93aGl0ZV9ub19zcGxhc180YjJlZGVmOC1lMWQwLTRiNzUtODhhMi1hZWY4N2JiZjlkN2IucG5n.png" alt="Book Haven Logo" class="logo-image" style="width: 70px; height: auto;">
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
                <div id="cart-items-list">
                    </div>
                
                <div class="cart-summary" id="cartSummaryBlock">
                    <div class="summary-line">
                        <span>TOTAL DE PLATA: </span>
                        <span class="total-price" id="cart-total-price">0,00 lei</span>
                    </div>
                    <a href="checkout.php" class="cart-checkout-button">Finalizează Comanda</a>
                </div>
            </div>
        </main>

        <footer>
            <section class="newsletter-section">
                <h3>Abonează-te la newsletter!</h3>
                <form id="newsletterForm">
                    <label for="Nume">Nume</label>
                    <input type="text" id="Nume" name="Nume"><br>
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="Email"><br>
                    <button type="submit">Trimite</button>
                </form>
            </section>
            
            <p style="text-align: center; margin-top: 20px;">samatageorge19@gmail.com</p>
        </footer>
    </div>

    <div id="searchOverlay" class="search-overlay" onclick="closeSearch(event)">
        <div class="search-popup">
            <span class="close-search" onclick="closeSearch(event, true)">&times;</span>
            <h2>Ce dorești să citești?</h2>
            <input type="text" id="liveSearchInput" placeholder="Scrie titlul sau autorul..." autofocus>
            <div id="liveSearchResults" class="search-results-list"></div>
        </div>
    </div>

    <a href="#top" class="back-to-top">↑</a>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="products_api.js.php"></script>

    <script>
        // Funcție ajutătoare pentru formatarea prețului
        function formatMoney(amount) {
            return amount.toFixed(2).replace('.', ',') + ' lei';
        }

        // Funcție pentru a extrage numărul din stringul de preț (ex: "140,00 lei" -> 140.00)
        function parsePrice(priceStr) {
            if (!priceStr) return 0;
            return parseFloat(priceStr.replace(' lei', '').replace('.', '').replace(',', '.'));
        }

        document.addEventListener("DOMContentLoaded", function() {
            renderCart();

            // Newsletter
            const newsForm = document.getElementById('newsletterForm');
            if(newsForm) {
                newsForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert("Mulțumim pentru abonare! Vei primi noutăți pe email.");
                    newsForm.reset();
                });
            }
        });

        function renderCart() {
            const container = document.getElementById('cart-items-list');
            const totalElement = document.getElementById('cart-total-price');
            const summaryBlock = document.getElementById('cartSummaryBlock');
            
            // Preluăm coșul (listă de obiecte {id, qty})
            let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
            let totalPrice = 0;

            container.innerHTML = '';

            if (cart.length === 0) {
                container.innerHTML = '<div class="empty-page-text"><i class="fas fa-shopping-basket" style="font-size: 40px; margin-bottom: 20px;"></i><p>Coșul tău este gol.</p><a href="main.php" style="color:black; text-decoration:underline;">Mergi la cumpărături</a></div>';
                summaryBlock.style.display = 'none';
            } else {
                summaryBlock.style.display = 'block';
                
                cart.forEach(item => {
                    const product = products[item.id]; 

                    if (product) {
                        const unitPrice = parsePrice(product.price);
                        const lineTotal = unitPrice * item.qty;
                        totalPrice += lineTotal;

                        const itemHTML = `
                            <div class="cart-item">
                                <div class="cart-item-image">
                                    <a href="product.php?id=${item.id}">
                                        <img src="${product.image}" alt="${product.title}">
                                    </a>
                                </div>
                                <div class="cart-item-details">
                                    <h3><a href="product.php?id=${item.id}">${product.title}</a></h3>
                                    <p class="isbn">Format: ${product.format || 'Standard'}</p>
                                    <p class="unit-price">Preț unitar: ${product.price}</p>
                                </div>
                                <div class="cart-item-quantity">
                                    <label>Cantitate:</label>
                                    <input type="number" value="${item.qty}" min="1" onchange="updateQty('${item.id}', this.value)">
                                </div>
                                <div class="cart-item-subtotal">
                                    ${formatMoney(lineTotal)}
                                </div>
                                <div class="cart-item-remove">
                                    <button class="btn-remove-simple" onclick="removeFromCart('${item.id}')" title="Șterge">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        `;
                        container.innerHTML += itemHTML;
                    }
                });
                
                totalElement.textContent = formatMoney(totalPrice);
            }
        }

        // Modifică cantitatea
        window.updateQty = function(id, newQty) {
            let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
            let item = cart.find(i => i.id === id);
            if (item) {
                item.qty = parseInt(newQty);
                if (item.qty < 1) item.qty = 1;
                localStorage.setItem('shoppingCart', JSON.stringify(cart));
                renderCart(); // Re-desenează coșul
            }
        }

        // Șterge produs
        window.removeFromCart = function(id) {
            if(confirm('Sigur vrei să ștergi acest produs din coș?')) {
                let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
                cart = cart.filter(item => item.id !== id);
                localStorage.setItem('shoppingCart', JSON.stringify(cart));
                renderCart();
            }
        }

        // --- LOGICA SEARCH POPUP ---
        function openSearch() {
            document.getElementById('searchOverlay').style.display = 'block';
            document.getElementById('liveSearchInput').focus();
        }
        function closeSearch(event, force = false) {
            if (force || event.target.className === 'search-overlay') {
                document.getElementById('searchOverlay').style.display = 'none';
                document.getElementById('liveSearchInput').value = '';
                document.getElementById('liveSearchResults').innerHTML = '';
            }
        }
        document.getElementById('liveSearchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let resultsContainer = document.getElementById('liveSearchResults');
            resultsContainer.innerHTML = '';
            if (filter.length < 2) return;
            if (typeof products === 'undefined') return;
            
            let foundCount = 0;
            Object.keys(products).forEach(slug => {
                let product = products[slug];
                if (product.title.toLowerCase().includes(filter) || (product.author && product.author.toLowerCase().includes(filter))) {
                    let html = `<a href="product.php?id=${slug}" class="search-result-item"><img src="${product.image}"><div class="search-result-info"><h4>${product.title}</h4><p>${product.price}</p></div></a>`;
                    resultsContainer.innerHTML += html;
                    foundCount++;
                }
            });
            if (foundCount === 0) resultsContainer.innerHTML = '<p style="text-align:center;color:#999;">Niciun rezultat.</p>';
        });
    </script>
</body>
</html>