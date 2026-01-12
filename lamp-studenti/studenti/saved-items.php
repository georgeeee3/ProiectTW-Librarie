<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produse Favorite - Librarie Online</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* --- STILURI CSS PENTRU GRID --- */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 30px;
            padding: 20px 0;
        }
        
        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            transition: transform 0.2s;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .product-item img {
            max-width: 100%;
            height: 250px; 
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product-item h3 {
            font-size: 1rem;
            margin: 10px 0;
            height: 40px; 
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .btn-remove {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 4px;
            margin-top: auto;
            font-size: 0.9rem;
            width: 100%;
            transition: background 0.3s;
        }

        .btn-remove:hover {
            background-color: #c82333;
        }

        .empty-page-text {
            text-align: center;
            font-size: 1.2rem;
            color: #666;
            margin-top: 50px;
            grid-column: 1 / -1;
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

                <a href="saved-items.php" style="font-weight: bold;">SAVED ITEMS</a>
                <a href="basket.php">BASKET</a>
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
            <div class="page-header" style="text-align: center; margin: 30px 0;">
                <h1>Produse Favorite ❤️</h1>
            </div>
            
            <div class="product-grid" id="favorites-items-container">
                </div>
        </main>

        <footer>
            <section class="newsletter-section">
                <h3>Abonează-te la newsletter!</h3>
                <form id="newsletterForm">
                    <label for="Nume">Nume</label>
                    <input type="text" id="Nume" name="Nume" required><br>
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="Email" required><br>
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
        document.addEventListener("DOMContentLoaded", function() {
            renderFavorites();

            // --- NEWSLETTER ---
            const newsForm = document.getElementById('newsletterForm');
            if(newsForm) {
                newsForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    alert("Mulțumim pentru abonare!");
                    newsForm.reset();
                });
            }
        });

        // --- FUNCȚIA DE AFIȘARE FAVORITE DIN LOCALSTORAGE ---
        function renderFavorites() {
            const container = document.getElementById('favorites-items-container');
            
            // Citim din memoria browserului
            let savedItems = JSON.parse(localStorage.getItem('savedItems')) || [];

            if (typeof products === 'undefined') {
                container.innerHTML = '<p class="empty-page-text" style="color:red">Eroare: Baza de date cu produse nu s-a încărcat.</p>';
                return;
            }

            container.innerHTML = ''; // Curățăm containerul

            if (savedItems.length === 0) {
                container.innerHTML = '<p class="empty-page-text">Nu ai niciun produs salvat la favorite.</p>';
            } else {
                savedItems.forEach(productId => {
                    const product = products[productId];

                    if (product) {
                        const productHTML = `
                            <div class="product-item" id="fav-${productId}">
                                <a href="product.php?id=${productId}" class="product-link" style="text-decoration:none; color: inherit;">
                                    <img src="${product.image}" alt="Coperta ${product.title}">
                                    <h3>${product.title}</h3>
                                </a>
                                <p class="price" style="font-weight:bold; color: #d92323;">${product.price}</p>
                                <button class="btn-remove" onclick="removeFavorite('${productId}')">Șterge din Favorite</button>
                            </div>
                        `;
                        container.innerHTML += productHTML;
                    }
                });
            }
        }

        // --- FUNCȚIA DE ȘTERGERE ---
        window.removeFavorite = function(productId) {
            if(!confirm('Ești sigur că vrei să ștergi acest produs din lista ta?')) {
                return;
            }

            // Citim lista actuală
            let savedItems = JSON.parse(localStorage.getItem('savedItems')) || [];
            
            // Filtrăm produsul pe care vrem să îl ștergem
            savedItems = savedItems.filter(id => id !== productId);
            
            // Salvăm noua listă înapoi în browser
            localStorage.setItem('savedItems', JSON.stringify(savedItems));
            
            // Reîmprospătăm afișarea
            renderFavorites();
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