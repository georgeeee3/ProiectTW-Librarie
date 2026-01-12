<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Librarie Online</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* === STILURI NOI PENTRU BUTONUL DE CĂUTARE === */
        .search-trigger {
            display: inline-block;
            width: 200px; /* Sau cât de lat vrei să fie */
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 20px; /* Rotunjire tip 'pill' */
            background-color: #fff;
            color: #777; /* Culoare text gri, ca un placeholder */
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
                <h1>Checkout</h1>
            </div>
            
            <form class="checkout-container" action="proceseaza_comanda.php" method="POST">
                
                <div class="checkout-section">
                    <h2>Datele utilizatorului*</h2>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" 
                               value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="prenume">Prenume*</label>
                        <input type="text" id="prenume" name="prenume" 
                               value="<?php echo isset($_SESSION['prenume']) ? htmlspecialchars($_SESSION['prenume']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nume">Nume*</label>
                        <input type="text" id="nume" name="nume" 
                               value="<?php echo isset($_SESSION['nume']) ? htmlspecialchars($_SESSION['nume']) : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="telefon">Telefon*</label>
                        <input type="tel" id="telefon" name="telefon" required>
                    </div>
                </div>

                <div class="checkout-section">
                    <h2>Modalitatea de livrare</h2>
                    <div class="radio-option">
                        <input type="radio" id="ridicare" name="livrare" value="ridicare" checked>
                        <label for="ridicare">Ridicare din libraria noastra</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="sameday" name="livrare" value="sameday">
                        <label for="sameday">Sameday - livrare la domiciliu; cost transport: GRATUIT</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="easybox" name="livrare" value="easybox">
                        <label for="easybox">Sameday - ridicare din Easybox; cost transport: GRATUIT</label>
                    </div>
                </div>

                <div class="checkout-section">
                    <h2>Valoare totala, inclusiv transport</h2>
                    <div class="total-display">
                        <span>Total</span>
                        <span class="total-price" id="checkout-total-price">0,00 lei</span>
                    </div>
                </div>

                <div class="checkout-section">
                    <h2>Modalitatea de plata</h2>
                    <div class="radio-option">
                        <input type="radio" id="numerar" name="plata" value="numerar" checked>
                        <label for="numerar">Numerar / card in librarie</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="online" name="plata" value="online">
                        <label for="online">Plata online cu cardul</label>
                    </div>
                </div>

                <div class="checkout-section">
                    <h2>Date de facturare*</h2>
                    <div class="form-group">
                        <label>Tipul facturii*</label>
                        <div class="radio-option">
                            <input type="radio" id="fizica" name="tip_factura" value="fizica" checked>
                            <label for="fizica">persoana fizica</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="juridica" name="tip_factura" value="juridica">
                            <label for="juridica">persoana juridica</label>
                        </div>
                    </div>
                    <h2>Adresa de facturare*</h2>
                    <div class="form-group">
                        <label for="judet">Judet*</label>
                        <select id="judet" name="judet" required>
                            <option value="Bucuresti" selected>Bucuresti</option>
                            <option value="Ilfov">Ilfov</option>
                            <option value="Cluj">Cluj</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="localitate">Localitate*</label>
                        <input type="text" id="localitate" name="localitate" required>
                    </div>
                    <div class="form-group">
                        <label for="adresa">Adresa*</label>
                        <textarea id="adresa" name="adresa" required></textarea>
                    </div>
                </div>
                
                <div class="checkout-section">
                    <h2>Observatii, comentarii si preferinte</h2>
                    <div class="form-group">
                        <label for="preferinte">Preferinte</label>
                        <textarea id="preferinte" name="preferinte"></textarea>
                    </div>
                </div>

                <button type="submit" class="cart-checkout-button">Finalizează comanda</button>
            </form>

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
        function parsePrice(priceStr) {
            if (!priceStr) return 0;
            return parseFloat(priceStr.replace(',', '.').replace(' lei', ''));
        }

        document.addEventListener("DOMContentLoaded", function() {
            const totalElement = document.getElementById('checkout-total-price');
            // Citim coșul corect (listă de obiecte {id, qty})
            let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
            let totalPrice = 0;

            if (cart.length > 0) {
                cart.forEach(item => {
                    const product = products[item.id];
                    if (product) {
                        const price = parsePrice(product.price);
                        totalPrice += price * item.qty; // Înmulțim cu cantitatea
                    }
                });
                totalElement.textContent = totalPrice.toFixed(2).replace('.', ',') + ' lei';
            }

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