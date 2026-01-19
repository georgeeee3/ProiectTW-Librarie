<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Order - Librarie Online</title>
    
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
                <h1>PRE-ORDER</h1>
            </div>

            <div class="product-grid">
                
                <div class="product-item">
                    <a href="product.php?id=princess-of-blood" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/princess-of-blood-1.jpg" alt="Coperta Princess of Blood">
                        <h3>Princess of Blood</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=all-we-have-left" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/all-we-have-left.jpg" alt="Coperta All We Have Left">
                        <h3>All We Have Left</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=running-the-light" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/running-the-light.jpg" alt="Coperta Running the Light">
                        <h3>Running the Light</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=witch-queen-rising" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/witch-queen-rising.jpg" alt="Coperta Witch Queen Rising">
                        <h3>Witch Queen Rising</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=hook-line-sinker" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/hook-line-and-sinker-deluxe-collectors-edition.jpg" alt="Coperta Hook, Line, and Sinker Deluxe Collector's Edition">
                        <h3>Hook, Line, and Sinker Deluxe Collector's Edition</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=thistlemarsh" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/thistlemarsh.jpg" alt="Coperta Thistlemarsh"> 
                        <h3>Thistlemarsh</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=faraway-inn" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/faraway-inn.jpg" alt="Coperta Faraway Inn">
                        <h3>Faraway Inn</h3>
                    </a>
                    <p class="price"><strong>66,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=honeysuckle" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/honeysuckle.jpg" alt="Coperta Honeysuckle"> 
                        <h3>Honeysuckle</h3>
                    </a>
                    <p class="price"><strong>116,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=mother-of-death" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/mother-of-death-and-dawn-1.jpg" alt="Coperta War of Lost Hearts 3: Mother of Death and Dawn">
                        <h3>War of Lost Hearts 3: Mother of Death and Dawn</h3>
                    </a>
                    <p class="price"><strong>116,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=husky-shizun-11" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/husky-and-his-white-cat-shizun-erha-he-ta-de-bai-mao-shizun-novel-vol-11.jpg" alt="Coperta Husky and His White Cat Shizun (Novel) Vol. 11">
                        <h3>Husky and His White Cat Shizun (Novel) Vol. 11</h3>
                    </a>
                    <p class="price"><strong>88,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=aicha" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/aicha.jpg" alt="Coperta Aicha">
                        <h3>Aicha</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=fox-devil" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/fox-and-the-devil.jpg" alt="Coperta Fox and the Devil"> 
                        <h3>Fox and the Devil</h3>
                    </a>
                    <p class="price"><strong>105,60 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=all-we-have-is-time" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/all-we-have-is-time.jpg" alt="Coperta All We Have Is Time">
                        <h3>All We Have Is Time</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=one-came-back" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/one-came-back.jpg" alt="Coperta One Came Back"> 
                        <h3>One Came Back</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=behind-closed-doors" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/behind-closed-doors-deluxe-limited-edition.jpg" alt="Coperta Behind Closed Doors: Deluxe Limited Edition">
                        <h3>Behind Closed Doors: Deluxe Limited Edition</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=bloodfire-baby" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/bloodfire-baby.jpg" alt="Coperta Bloodfire, Baby"> 
                        <h3>Bloodfire, Baby</h3>
                    </a>
                    <p class="price"><strong>132,00 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=temple-fall" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/temple-fall.jpg" alt="Coperta Temple Fall">
                        <h3>Temple Fall</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=wretched-beauty" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/this-wretched-beauty.jpg" alt="Coperta This Wretched Beauty">
                        <h3>This Wretched Beauty</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
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