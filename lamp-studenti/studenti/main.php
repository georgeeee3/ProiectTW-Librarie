<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librarie Online</title>
    
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
            <section class="hero-banner">
                <div class="hero-text">
                    <p>NEW</p>
                    <strong>NON-FICTION</strong>
                </div>
                
                <div class="book-slider">
                    <div class="product-item">
                         <a href="product.php?id=ysl" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/65/world-according-to-yves-saint-laurent-1-1.jpg" alt="Coperta World According to Yves Saint Laurent">
                            <h3>World According to Yves Saint Laurentr</h3>
                        </a>
                        <p class="price"><strong>220,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=louis-vuitton" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/66/louis-vuitton-catwalk-the-complete-fashion-collections-1.jpg" alt="Coperta Louis Vuitton Catwalk">
                            <h3>Louis Vuitton Catwalk: The Complete Fashion Collections</h3>
                        </a>
                        <p class="price"><strong>316,80 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=wild-thing" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/73/wild-thing-2-1.jpg" alt="Coperta Wild Thing">
                            <h3>Wild Thing</h3>
                        </a>
                        <p class="price"><strong>70,50 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=our-dark-duet" class="product-link">
                            <img src="https://cdn.dc5.ro/img-prod/2219228605-0.jpeg" alt="Coperta Our Dark Duet">
                            <h3>Our Dark Duet</h3>
                        </a>
                        <p class="price"><strong>85,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=underground" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/68/underground-1.jpg" alt="Coperta Underground: Dreams and Degradations in Bucharest">
                            <h3>Underground: Dreams and Degradations in Bucharest</h3>
                        </a>
                        <p class="price"><strong>140,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=homework" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/72/homework-1.jpg" alt="Coperta Homework: A Memoir">
                            <h3>Homework: A Memoir</h3>
                        </a>
                        <p class="price"><strong>105,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                </div>
            </section>

            <section class="book-row">
                <h2>2025's Best Translated Fiction</h2>
                <div class="book-grid">
                     <div class="product-item">
                         <a href="product.php?id=murder-midwinter" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/73/murder-at-midwinter-1.jpg" alt="Coperta Murder At Midwinter">
                            <h3>Murder At Midwinter</h3>
                        </a>
                        <p class="price"><strong>52,80 lei</strong></p>
                        <p class="format">Paperback</p>
                     </div>
                     <div class="product-item">
                         <a href="product.php?id=moths" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/moths-penguin-horror-1.jpg" alt="Coperta Moths (Penguin Horror)">
                            <h3>Moths (Penguin Horror)</h3>
                        </a>
                        <p class="price"><strong>55,00 lei</strong></p>
                        <p class="format">Paperback</p>
                     </div>
                     <div class="product-item">
                         <a href="product.php?id=we-are-green" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/72/we-are-green-and-trembling-1.jpg" alt="Coperta We Are Green and Trembling">
                            <h3>We Are Green and Trembling</h3>
                        </a>
                        <p class="price"><strong>49,99 lei</strong></p>
                        <p class="format">Paperback</p>
                     </div>
                    <div class="product-item">
                         <a href="product.php?id=castle-knoll-2" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/castle-knoll-files-2-how-to-seal-your-own-fate-1.jpg" alt="Coperta Castle Knoll Files 2">
                            <h3>Castle Knoll Files 2: How To Seal Your Own Fate</h3>
                        </a>
                        <p class="price"><strong>65,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=last-kingdom" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/67/last-kingdom-1-1.jpg" alt="Coperta Last Kingdom">
                            <h3>Last Kingdom</h3>
                        </a>
                        <p class="price"><strong>63,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=city-of-fiction" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/72/city-of-fiction-1.jpg" alt="Coperta City of Fiction">
                            <h3>City of Fiction</h3>
                        </a>
                        <p class="price"><strong>79,20 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=unworthy" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/71/unworthy-1.jpg" alt="Coperta Unworthy">
                            <h3>Unworthy</h3>
                        </a>
                        <p class="price"><strong>90,40 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                </div>
            </section>

            <section class="book-row">
                <h2> New Titles Available for Pre-Order!</h2>
                <div class="book-grid">
                    <div class="product-item">
                        <a href="product.php?id=hierarchy-2" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/73/strength-of-the-few-1.jpg" alt="Coperta Hierarchy 2: Strength of the Few">
                            <h3> Hierarchy 2: Strength of the Few</h3>
                        </a>
                        <p class="price"><strong>96,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=witch-queen" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/witch-queen-rising.jpg" alt="Coperta Witch Queen Rising">
                            <h3>Witch Queen Rising</h3>
                        </a>
                        <p class="price"><strong>88,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=summer-rolls" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/summer-rolls.jpg" alt="Coperta Summer Rolls">
                            <h3>Summer Rolls</h3>
                        </a>
                        <p class="price"><strong>25,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=apple-pearl" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/apple-and-the-pearl.jpg" alt="Coperta Apple and the Pearl">
                            <h3>Apple and the Pearl</h3>
                        </a>
                        <p class="price"><strong>39,99 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=axe-buried" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/where-the-axe-is-buried.jpg" alt="Coperta Where the Axe is Buried">
                            <h3>Where the Axe is Buried</h3>
                        </a>
                        <p class="price"><strong>105,60 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=slow-gods" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/75/slow-gods.jpg" alt="Coperta Slow Gods">
                            <h3>Slow Gods</h3>
                        </a>
                        <p class="price"><strong>105,60 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                         <a href="product.php?id=i-medusa" class="product-link">
                            <img src="https://nautilus.ro/gallery/pl/74/i-medusa-1.jpg" alt="Coperta I, Medusa">
                            <h3>I, Medusa</h3>
                        </a>
                        <p class="price"><strong>100,80 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                </div>
            </section>

            <section class="book-row">
                <h2>New Comics and Manga</h2>
                <div class="book-grid">
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
                    <div class="product-item">
                        <a href="product.php?id=jojo4" class="product-link">
                            <img src="https://m.media-amazon.com/images/I/81Gxv5jzH4L._SL1500_.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7">
                            <h3>JoJo's Bizarre Adv. Part 7 Vol 4</h3>
                        </a>
                        <p class="price"><strong>105,60 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=jojo5" class="product-link">
                            <img src="https://m.media-amazon.com/images/I/81AzmasR3qL._SL1500_.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7">
                            <h3>JoJo's Bizarre Adv. Part 7 Vol 5</h3>
                        </a>
                        <p class="price"><strong>120,00 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=jojo6" class="product-link">
                            <img src="https://m.media-amazon.com/images/I/81BMT+PjP5L._SL1500_.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7 Vol 6">
                            <h3>JoJo's Bizarre Adv. Part 7 Vol 6</h3>
                        </a>
                        <p class="price"><strong>105,60 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                    <div class="product-item">
                        <a href="product.php?id=jojo7" class="product-link">
                            <img src="https://m.media-amazon.com/images/I/81R0VMoaGjL._SL1500_.jpg" alt="Coperta JoJo's Bizarre Adv. Part 7 Vol 7">
                            <h3>JoJo's Bizarre Adv. Part 7 Vol 7</h3>
                        </a>
                        <p class="price"><strong>105,60 lei</strong></p>
                        <p class="format">Paperback</p>
                    </div>
                </div>
            </section>
        
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
            
            $('.hero-banner .book-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                speed: 150, 
                responsive: [ { breakpoint: 900, settings: { slidesToShow: 1, slidesToScroll: 1 } } ]
            });

            $('.book-row .book-grid').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: false,
                speed: 150, 
                responsive: [ { breakpoint: 900, settings: { slidesToShow: 2, slidesToScroll: 1 } } ]
            });
            
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