<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Fiction - Librarie Online</title>
    
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
                <h1>NON-FICTION</h1>
            </div>

            <div class="product-grid">
                
                <div class="product-item">
                    <a href="product.php?id=black-milk" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/black-milk-on-motherhood-and-writing-1.jpg" alt="Coperta Black Milk: On Motherhood and Writing">
                        <h3>Black Milk: On Motherhood and Writing</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=mornings-with-mii" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/mornings-with-my-cat-mii-1-1.jpg" alt="Coperta Mornings With My Cat Mii">
                        <h3>Mornings With My Cat Mii</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=raise-your-soul" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/raise-your-soul-a-personal-history-of-resistance.jpg" alt="Coperta Raise Your Soul: A Personal History of Resistance">
                        <h3>Raise Your Soul: A Personal History of Resistance</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=sonny-boy" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/sonny-boy-2.jpg" alt="Coperta Sonny Boy"> 
                        <h3>Sonny Boy</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=indignity" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/indignity-a-life-reimagined.jpg" alt="Coperta Indignity: A Life Reimagined">
                        <h3>Indignity: A Life Reimagined</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=mother-mary" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/mother-mary-comes-to-me-1.jpg" alt="Coperta Mother Mary Comes To Me">
                        <h3>Mother Mary Comes To Me</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=plato-of-athens" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/plato-of-athens-1.jpg" alt="Coperta Plato of Athens: A Life in Philosophy">
                        <h3>Plato of Athens: A Life in Philosophy</h3>
                    </a>
                    <p class="price"><strong>79,20 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=somebody-walking" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/somebody-is-walking-on-your-grave-exp.jpg" alt="Coperta Somebody Is Walking on Your Grave: My Cemetery Journeys"> 
                        <h3>Somebody Is Walking on Your Grave: My Cemetery Journeys</h3>
                    </a>
                    <p class="price"><strong>79,20 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=sophie-from-romania" class="product-link">
                        <img src="https://m.media-amazon.com/images/I/813mwxd2ECL._SL1500_.jpg" alt="Coperta Sophie From Romania">
                        <h3>Sophie From Romania</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=all-the-way-river" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/all-the-way-to-the-river-love-loss-and-liberation.jpg" alt="Coperta All the Way to the River: Love, Loss and Liberation">
                        <h3>All the Way to the River: Love, Loss and Liberation</h3>
                    </a>
                    <p class="price"><strong>79,20 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=finest-hotel-kabul" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/finest-hotel-in-kabul-a-richly-immersive-history-of-afghanistan-from-the-bbcs.jpg" alt="Coperta Finest Hotel in Kabul">
                        <h3>Finest Hotel in Kabul: A richly immersive history...</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Trade Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=from-here-great-unknown" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/from-here-to-the-great-unknown-a-memoir-1.jpg" alt="Coperta From Here to the Great Unknown: A Memoir"> 
                        <h3>From Here to the Great Unknown: A Memoir</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=lifeblood" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/72/lifeblood-a-mother-in-search-of-hope-1.jpg" alt="Coperta Lifeblood: A Mother in Search of Hope"> 
                        <h3>Lifeblood: A Mother in Search of Hope</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=wild-thing" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/wild-thing-2-1.jpg" alt="Coperta Wild Thing"> 
                        <h3>Wild Thing</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=why-fish-dont-exist" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/why-fish-dont-exist-longlisted-for-the-womens-prize-for-non-fiction-2025.jpg" alt="Coperta Why Fish Don't Exist">
                        <h3>Why Fish Don't Exist: Longlisted for the Women's Prize...</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=our-daily-war" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/our-daily-war-1.jpg" alt="Coperta Our Daily War">
                        <h3>Our Daily War</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=outrun" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/outrun-1.jpg" alt="Coperta Outrun">
                        <h3>Outrun</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=kitchen-confidential" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/kitchen-confidential-1.jpg" alt="Coperta Kitchen Confidential: 25th Anniversary Edition">
                        <h3>Kitchen Confidential: 25th Anniversary Edition</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
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