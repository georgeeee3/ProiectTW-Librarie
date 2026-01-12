<?php
// === LOGICA PHP DE ÎNREGISTRARE ===
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $prenume = trim($_POST['prenume']);
    $nume = trim($_POST['nume']);
    $telefon = trim($_POST['telefon']);
    $parola = $_POST['parola'];
    $confirmare = $_POST['confirmare-parola']; 

    if ($parola !== $confirmare) {
        echo "<script>
            alert('Parolele nu coincid!'); 
            window.history.back();
        </script>";
        exit(); 
    }

    // Verificăm dacă emailul există deja
    $check = $pdo->prepare("SELECT id FROM utilizatori WHERE email = :email");
    $check->execute(['email' => $email]);
    
    if ($check->rowCount() > 0) {
        echo "<script>
            alert('Acest email este deja înregistrat. Te rugăm să te loghezi.'); 
            window.location.href = 'account.php';
        </script>";
        exit();
    } else {
        $hash = password_hash($parola, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO utilizatori (nume, prenume, email, telefon, parola) VALUES (:nume, :prenume, :email, :telefon, :parola)";
        $stmt = $pdo->prepare($sql);
        
        if ($stmt->execute([
            'nume' => $nume, 
            'prenume' => $prenume, 
            'email' => $email, 
            'telefon' => $telefon, 
            'parola' => $hash
        ])) {

            echo "<script>
                alert('Cont creat cu succes! Te rugăm să te autentifici.');
                window.location.href = 'account.php';
            </script>";
            exit();
        } else {
            echo "Eroare la baza de date. Te rugăm să încerci din nou.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare - Librarie Online</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
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
                <h1>Creează cont nou</h1>
            </div>

            <div class="login-container">
                <form action="register.php" method="POST">
                    
                    <div class="form-grup">
                        <label for="nume">Nume</label>
                        <input type="text" id="nume" name="nume" required>
                    </div>

                    <div class="form-grup">
                        <label for="prenume">Prenume</label>
                        <input type="text" id="prenume" name="prenume" required>
                    </div>

                    <div class="form-grup">
                        <label for="email">Adresă de email</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-grup">
                        <label for="telefon">Telefon</label>
                        <input type="tel" id="telefon" name="telefon" required>
                    </div>
                    
                    <div class="form-grup">
                        <label for="parola">Parolă</label>
                        <input type="password" id="parola" name="parola" required>
                    </div>

                    <div class="form-grup">
                        <label for="confirmare-parola">Confirmă Parola</label>
                        <input type="password" id="confirmare-parola" name="confirmare-parola" required>
                    </div>
                    
                    <button type="submit" class="login-button">Înregistrează-te</button>
                    
                    <div class="extra-links">
                        <a href="account.php">Ai deja cont? Autentifică-te</a>
                    </div>
                </form>
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

        // --- NEWSLETTER ---
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