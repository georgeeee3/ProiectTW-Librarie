<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Young Adult - Librarie Online</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
    <style>
        /* Ajustări specifice pentru slider-ul din sidebar */
        .aside-slider .product-item {
            margin: 0 5px;
            text-align: center;
        }
        .aside-slider img {
            margin: 0 auto 10px auto;
            max-height: 200px;
        }
        /* Asigură-te că butoanele slider-ului sunt vizibile */
        .slick-prev:before, .slick-next:before {
            color: #333; 
        }

        /* === STILURI NOI PENTRU BUTONUL DE CĂUTARE === */
        .search-trigger {
            display: inline-block;
            width: 200px; 
            padding: 8px 15px;
            border: 1px solid #ccc;
            border-radius: 20px; /* Rotunjire tip 'pill' */
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

                <a href="saved-items.php">SAVED ITEMS</a>
                <a href="basket.php">BASKET</a>
            </div>
        </div>
    </div>

    <div class="grid-container">

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
                <h1>YOUNG ADULT</h1>
            </div>

            <div class="product-grid">
                <div class="product-item">
                    <a href="product.php?id=bridge-kingdom-deluxe" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/bridge-kingdom-deluxe-edition-1.jpg" alt="Coperta Bridge Kingdom (Deluxe Edition)">
                        <h3>Bridge Kingdom (Deluxe Edition)</h3>
                    </a>
                    <p class="price"><strong>140,00 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=prince-of-sin-2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/a-prince-of-sin-2-throne-of-secrets-1.jpg" alt="Coperta A Prince of Sin 2: Throne of Secrets">
                        <h3>A Prince of Sin 2: Throne of Secrets</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=river-drags-her-down-special" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/and-the-river-drags-her-down-special-edition-1.jpg" alt="Coperta And the River Drags Her Down (Special Edition)">
                        <h3>And the River Drags Her Down (Special Edition)</h3>
                    </a>
                    <p class="price"><strong>92,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=warring-gods-2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/warring-gods-2-river-and-the-star.jpg" alt="Coperta Warring Gods 2: River and the Star">
                        <h3>Warring Gods 2: River and the Star</h3>
                    </a>
                    <p class="price"><strong>116,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=bridge-kingdom-5" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/twisted-throne-1.jpg" alt="Coperta Bridge Kingdom 5: Twisted Throne">
                        <h3>Bridge Kingdom 5: Twisted Throne</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=curse-bearer-2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/curse-bearer-2-to-clutch-a-razor-1.jpg" alt="Coperta Curse Bearer 2: To Clutch a Razor">
                        <h3>Curse Bearer 2: To Clutch a Razor</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=holly-belladonna" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/holly-a-belladonna-novella-1.jpg" alt="Coperta Holly: A Belladonna Novella">
                        <h3>Holly: A Belladonna Novella</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=they-own-the-night" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/they-own-the-night-1.jpg" alt="Coperta They Own the Night">
                        <h3>They Own the Night</h3>
                    </a>
                    <p class="price"><strong>42,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=tourist-season" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/tourist-season-1.jpg" alt="Coperta Tourist Season">
                        <h3>Tourist Season</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=twelve-days-christmas" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/twelve-days-of-christmas-1.jpg" alt="Coperta Twelve Days of Christmas">
                        <h3>Twelve Days of Christmas</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=blood-tea-2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/a-steeping-of-blood-1.jpg" alt="Coperta Blood and Tea 2: A Steeping of Blood">
                        <h3>Blood and Tea 2: A Steeping of Blood</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=river-drags-her-down-pb" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/and-the-river-drags-her-down-1.jpg" alt="Coperta And the River Drags Her Down">
                        <h3>And the River Drags Her Down</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=court-of-the-dead-special" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/court-of-the-dead-fom-the-world-of-percy-jackson-the-nico-di-angelo-adventures.jpg" alt="Coperta Court of the Dead: (Nico Di Angelo Adventures 2) - special edition">
                        <h3>Court of the Dead: (Nico Di Angelo Adventures 2) - special edition</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=court-of-the-dead" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/from-the-world-of-percy-jackson-the-cou-1.jpg" alt="Coperta Court of the Dead: (Nico Di Angelo Adventures 2)">
                        <h3>Court of the Dead: (Nico Di Angelo Adventures 2)</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=catching-fire-deluxe" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/hunger-games-3-catching-fire-deluxe-edition-1.jpg" alt="Coperta Hunger Games 2: Catching Fire (deluxe edition)">
                        <h3>Hunger Games 2: Catching Fire (deluxe edition)</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=cerulean-chronicles-2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/cerulean-chronicles-2-somewhere-beyond-the-sea-special-edition-1.jpg" alt="Coperta Cerulean Chronicles 2: Somewhere Beyond the Sea (special edition)">
                        <h3>Cerulean Chronicles 2: Somewhere Beyond the Sea (special edition)</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=lore-of-tides" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/lore-of-the-tides-1.jpg" alt="Coperta Lore of the Tides">
                        <h3>Lore of the Tides</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>

                <div class="product-item">
                    <a href="product.php?id=kill-creatures" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/kill-creatures-1.jpg" alt="Coperta Kill Creatures">
                        <h3>Kill Creatures</h3>
                    </a>
                    <p class="price"><strong>48,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>

            </div>
        </main>

        <aside>
            <h3>Categorii Populare</h3>
            <ul>
                <li><a href="fiction.php">Fiction</a></li>
                <li><a href="non-fiction.php">Non-Fiction</a></li>
                <li><a href="graphic-novels.php">Manga</a></li>
            </ul>
            <hr>
            <h3>Promotia Saptamanii</h3>
            
            <div class="aside-slider">
                
                <div class="product-item">
                    <a href="product.php?id=jojo1" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-71-1.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7">
                        <h3>JoJo's Bizarre Adv. Part 7 Vol 1</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jojo2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-72-1.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7">
                        <h3>JoJo's Bizarre Adv. Part 7 Vol 2</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jojo3" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-73-1.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7">
                        <h3>JoJo's Bizarre Adv. Part 7 Vol 3</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                
            </div> 
        </aside>

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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="products_api.js.php"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.aside-slider').slick({
                slidesToShow: 1,      
                slidesToScroll: 1,
                autoplay: true,       
                autoplaySpeed: 3000,
                arrows: true,         
                dots: false,
                speed: 150
            });
        });
    </script>
    
    <script>
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
                    let html = `
                        <a href="product.php?id=${slug}" class="search-result-item">
                            <img src="${product.image}" alt="${product.title}">
                            <div class="search-result-info">
                                <h4>${product.title}</h4>
                                <p>${product.author || ''} - <strong>${product.price}</strong></p>
                            </div>
                        </a>
                    `;
                    resultsContainer.innerHTML += html;
                    foundCount++;
                }
            });
            if (foundCount === 0) resultsContainer.innerHTML = '<p style="text-align:center;color:#999;">Niciun rezultat.</p>';
        });

        // 2. GESTIONARE NEWSLETTER
        const newsForm = document.getElementById('newsletterForm');
        if(newsForm) {
            newsForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert("Mulțumim pentru abonare! Vei primi noutăți pe email.");
                newsForm.reset();
            });
        }
    </script>

</body>
</html>