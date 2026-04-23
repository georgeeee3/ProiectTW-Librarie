<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiction - Librarie Online</title>
    
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
                <h1>FICTION</h1>
            </div>

            <div class="product-grid">
                <div class="product-item">
                    <a href="product.php?id=a-tale-unasked" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/a-tale-unasked-1.jpg" alt="Coperta A Tale Unasked">
                        <h3>A Tale Unasked</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=devils-elixirs" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/devils-elixirs-annotated-edition-alma-classics.jpg" alt="Coperta Devil's Elixirs: Annotated Edition (Alma Classics)">
                        <h3>Devil's Elixirs: Annotated Edition (Alma Classics)</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=magpie-at-night" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/magpie-at-night-1.jpg" alt="Coperta Magpie at Night">
                        <h3>Magpie at Night</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=supernatural-tales" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/supernatural-tales-1.jpg" alt="Coperta Supernatural Tales: Annotated Edition">
                        <h3>Supernatural Tales: Annotated Edition</h3>
                    </a>
                    <p class="price"><strong>48,00 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=vampyre" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/vampyre-1.jpg" alt="Coperta Vampyre (Penguin Little Black Classics)">
                        <h3>Vampyre (Penguin Little Black Classics)</h3>
                    </a>
                    <p class="price"><strong>21,60 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=little-women" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/little-women-macmillan-collectors-library-1.jpg" alt="Coperta Little Women (Macmillan Collector's Library)">
                        <h3>Little Women (Macmillan Collector's Library)</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=monkey-king" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/75/monkey-king-journey-to-the-west.jpg" alt="Coperta Monkey King: Journey to the West">
                        <h3>Monkey King: Journey to the West</h3>
                    </a>
                    <p class="price"><strong>68,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=fall-house-of-usher" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/fall-of-the-house-of-usher-and-other-writings-1.jpg" alt="Coperta Fall of the House of Usher (Penguin Clothbound Classics)">
                        <h3>Fall of the House of Usher and Other Writings (Penguin Clothbound Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=1984" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/1984-vintage-collectors-classics.jpg" alt="Coperta 1984">
                        <h3>1984 (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=sherlock-holmes" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/the-adventures-of-sherlock-holmes-vintage-collectors-classics.jpg" alt="Coperta Adventures of Sherlock Holmes">
                        <h3>Adventures of Sherlock Holmes (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=alice-in-wonderland" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/alices-adventures-in-wonderland-and-through-the-looking-glass-vintage-collecto.jpg" alt="Coperta Alice's Adventures in Wonderland">
                        <h3>Alice's Adventures in Wonderland and Through the Looking Glass</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=great-expectations" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/great-expectations-vintage-collectors-classics.jpg" alt="Coperta Great Expectations">
                        <h3>Great Expectations (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=mansfield-park" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/mansfield-park-jane-austen-vintage-collectors-classics.jpg" alt="Coperta Mansfield Park">
                        <h3>Mansfield Park (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=dorian-gray" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/73/picture-of-dorian-gray-1-1.jpg" alt="Coperta Picture of Dorian Gray">
                        <h3>Picture of Dorian Gray (Macmillan Collector's Library)</h3>
                    </a>
                    <p class="price"><strong>52,80 lei</strong></p>
                    <p class="format">Paperback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=sense-sensibility" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/sense-and-sensibility-jane-austen-vintage-collectors-classics.jpg" alt="Coperta Sense and Sensibility">
                        <h3>Sense and Sensibility (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=christmas-carol" class="product-link">
                        <img src="https://nautilus.ro/gallery/pm/74/a-christmas-carol-vintage-collectors-classics.jpg" alt="Coperta A Christmas Carol">
                        <h3>A Christmas Carol (Vintage Collector's Classics)</h3>
                    </a>
                    <p class="price"><strong>100,80 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=bewitched" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/bewitched-the-ghostly-tales-of-edith-wharton-18-british-library-gilded-nightm.jpg" alt="Coperta Bewitched: The Ghostly Tales of Edith Wharton"> 
                        <h3>Bewitched: The Ghostly Tales of Edith Wharton</h3>
                    </a>
                    <p class="price"><strong>90,40 lei</strong></p>
                    <p class="format">Hardback</p>
                </div>
                <div class="product-item">
                    <a href="product.php?id=carmilla" class="product-link">
                        <img src="https://nautilus.ro/gallery/pl/74/carmilla-1-1.jpg" alt="Coperta Carmilla">
                        <h3>Carmilla</h3>
                    </a>
                    <p class="price"><strong>58,40 lei</strong></p>
                    <p class="format">Hardback</p>
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