<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="icon" href="./image/books.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="./image/logo.png" alt="logo">
        </div>
        <div class="header-content">
            <h1>Księgarnia</h1>
        </div>
    </header>
    <div class="container">
        <aside>
            <button onclick="window.location.href='./index.php'" class="aside-button">Strona główna</button>
            <br>
            <button onclick="window.location.href='./model.php'" class="aside-button">Model bazy danych</button>
            <br>
            <button onclick="window.location.href='./wprowadz.php'" class="aside-button">Wprowadź dane klienta</button>
            <br>
            <button onclick="window.location.href='./wprowadz1.php'" class="aside-button">Wprowadź dane książki</button>
            <br>
            <button onclick="window.location.href='./wyswietl.php'" class="aside-button">Wyświetl dane klientów oraz książek</button>
            <br>
            <button onclick="window.location.href='./kasuj.php'" class="aside-button">Skasuj dane klienta</button>
            <br>
            <button onclick="window.location.href='./kasuj1.php'" class="aside-button">Skasuj dane książki</button>
            <br>
            <button onclick="window.location.href='./mod.php'" class="aside-button">Modyfikuj dane klienta</button>
            <br>
            <button onclick="window.location.href='./raport.php'" class="aside-button">Raport ze sprzedaży</button>
            <br>
        </aside>
        <main>
            <form action="wprowadz1.php" method="post" class="form-container">
                <h2>Wprowadź dane książki</h2>

                <div class="form-row">
                    <div class="form-group">
                        <p>Tytuł:</p>
                        <input type="text" name="title">
                    </div>
                    <div class="form-group">
                        <p>Autor:</p>
                        <input type="text" name="author">
                    </div>
                    <div class="form-group">
                        <p>Wydawnictwo:</p>
                        <input type="text" name="publish">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <p>Cena:</p>
                        <input type="text" name="price">
                    </div>
                    <div class="form-group">
                        <p>Rok:</p>
                        <input type="text" name="year">
                    </div>
                </div>

                <div class="button-group">
                    <input type="submit" value="Wprowadź dane" class="styled-button">
                    <input type="reset" value="Wyczyść formularz" class="styled-button">
                </div>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    if ($conn->connect_error) {
                        die("Problem z połączeniem: " . $conn->connect_error);
                    } 
                    
                    $title = $_POST["title"];
                    $author = $_POST["author"];
                    $publish = $_POST["publish"];
                    $price = $_POST["price"];
                    $year = $_POST["year"];

                    if (empty($title) || empty($author) || empty($publish) || empty($price) || empty($year)) {
                        echo "<h3>Proszę uzupełnić wszystkie wymagane pola.</h3>";
                    } else {
                        $sql = "INSERT INTO `produkty` (`id_produkt`, `tytul`, `autor`, `wydawnictwo`, `cena`, `rok_wydania`) VALUES (NULL, '$title', '$author', '$publish', '$price', '$year');";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<h3>Dane zostały wprowadzone pomyślnie.</h3>";
                        } else {
                            echo "<h3>Wystąpił błąd przy wprowadzaniu danych.</h3>";
                        }
                    }
                }

                mysqli_close($conn);
                ?>
            </form>
        </main>
    </div>    
    <footer>
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>