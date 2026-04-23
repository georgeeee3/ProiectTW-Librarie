<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphic Novels & Manga - Librarie Online</title>
    
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    
    <style>
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
                <h1>GRAPHIC NOVELS & MANGA</h1>
            </div>

            <div class="product-grid">
                
                <div class="product-item">
                    <a href="product.php?id=mha-42" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/my-hero-academia-vol-42-1.jpg" alt="Coperta My Hero Academia Vol. 42">
                        <h3>My Hero Academia Vol. 42</h3>
                    </a>
                    <p class="price"><strong>43,20 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=mocha-cat" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/mocha-the-cat-and-his-forever-family-vol-1-1.jpg" alt="Coperta Mocha the Cat and His Forever Family Vol. 1">
                        <h3>Mocha the Cat and His Forever Family Vol. 1</h3>
                    </a>
                    <p class="price"><strong>66,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=moan-junji-ito" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/moan-junji-ito-collection-1.jpg" alt="Coperta Moan: Junji Ito Story Collection">
                        <h3>Moan: Junji Ito Story Collection</h3>
                    </a>
                    <p class="price"><strong>96,00 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=blue-lock-23" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/blue-lock-23-1.jpg" alt="Coperta Blue Lock 23">
                        <h3>Blue Lock 23</h3>
                    </a>
                    <p class="price"><strong>57,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jojo4" class="product-link">
                        <img src="https://m.media-amazon.com/images/I/81Gxv5jzH4L._SL1500_.jpg" alt="Coperta JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 4">
                        <h3>JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 4</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=haikyu-6" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/haikyu-3-in-1-edition-06-1.jpg" alt="Coperta Haikyu!! (3-in-1 Edition) Vol. 6">
                        <h3>Haikyu!! (3-in-1 Edition) Vol. 6</h3>
                    </a>
                    <p class="price"><strong>74,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=anime-archives" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/anime-archives-1.jpg" alt="Coperta Anime Archives: A retrospective of anime films and TV shows">
                        <h3>Anime Archives: A retrospective of anime films and TV shows</h3>
                    </a>
                    <p class="price"><strong>184,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=blue-lock-nagi-5" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/blue-lock-episode-nagi-5-1.jpg" alt="Coperta Blue Lock: Episode Nagi 5">
                        <h3>Blue Lock: Episode Nagi 5</h3>
                    </a>
                    <p class="price"><strong>61,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=hunter-x-hunter-3" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/hunter-x-hunter-3-in-1-v3-1.jpg" alt="Coperta Hunter x Hunter (3-in-1 Edition) Vol. 3">
                        <h3>Hunter x Hunter (3-in-1 Edition) Vol. 3</h3>
                    </a>
                    <p class="price"><strong>74,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jojo3" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-73-1.jpg" alt="Coperta JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 3">
                        <h3>JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 3</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=kaiju-no-8-14" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/kaiju-no-8-vol-14-1-1.jpg" alt="Coperta Kaiju No. 8 Vol. 14">
                        <h3>Kaiju No. 8 Vol. 14</h3>
                    </a>
                    <p class="price"><strong>48,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=vagabond-4" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/vagabond-definitive-ed-v4-1.jpg" alt="Coperta Vagabond Definitive Edition Vol. 4">
                        <h3>Vagabond Definitive Edition Vol. 4</h3>
                    </a>
                    <p class="price"><strong>222,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=battle-royale-4" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/battle-royale-enforcers-v4-1.jpg" alt="Coperta Battle Royale: Enforcers Vol. 4">
                        <h3>Battle Royale: Enforcers Vol. 4</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=deadpool-samurai-3" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/deadpool-samurai-vol-3-1.jpg" alt="Coperta Deadpool: Samurai Vol. 3">
                        <h3>Deadpool: Samurai Vol. 3</h3>
                    </a>
                    <p class="price"><strong>48,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=grandmaster-of-demonic-cultivation-11" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/grandmaster-of-demonic-cultivation-mo-dao-zu-shi-the-comic-manhua-vol-11-1.jpg" alt="Coperta Grandmaster of Demonic Cultivation (Manhua) Vol. 11">
                        <h3>Grandmaster of Demonic Cultivation (Manhua) Vol. 11</h3>
                    </a>
                    <p class="price"><strong>88,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=issak-omnibus-3" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/issak-omnibus-3-vol-5-6-1.jpg" alt="Coperta Issak Omnibus 3 (Vol. 5-6)">
                        <h3>Issak Omnibus 3 (Vol. 5-6)</h3>
                    </a>
                    <p class="price"><strong>101,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jujutsu-kaisen-27" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jujutsu-kaisen-vol-27-1.jpg" alt="Coperta Jujutsu Kaisen Vol. 27">
                        <h3>Jujutsu Kaisen Vol. 27</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=jojo2" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/jojos-bizarre-adv-part-72-1.jpg" alt="JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 2">
                        <h3>JoJo's Bizarre Adventure: Part 7-Steel Ball Run Vol. 2</h3>
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
                <form>
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
    </script>

</body>
</html>