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
        <h1>Księgarnia</h1>
    </header>
    <div class="container">
        <aside>
            <a href="./index.php" class="button-link">Strona główna</a> <br>
            <a href="./model.php" class="button-link">Model bazy danych</a> <br>
            <a href="./wprowadz.php" class="button-link">Wprowadź dane klienta</a> <br>
            <a href="./wprowadz1.php" class="button-link">Wprowadź dane książki</a> <br>
            <a href="./wyswietl.php" class="button-link">Wyświetl dane klientów oraz książek</a> <br>
            <a href="./kasuj.php" class="button-link">Skasuj dane klienta</a> <br>
            <a href="./kasuj1.php" class="button-link">Skasuj dane książki</a> <br>
            <a href="./mod.php" class="button-link">Modyfikuj dane klienta</a> <br>
            <a href="./raport.php" class="button-link">Raport ze sprzedaży</a> <br>
        </aside>
        <main>
            <form action="wprowadz1.php" method="post">
                <h2>Wprowadź dane klienta</h2>

                <div class="input-group">
                    <p>Tytuł: </p> <input type="text" name="title" class="same_lenght">
                    <p>Autor: </p> <input type="text" name="author" class="same_lenght">
                    <p>Wydawnictwo: </p> <input type="text" name="publish" class="same_lenght">
                </div>

                <div class="input-group">
                    <p>Cena: </p> <input type="text" name="price" class="same_lenght">
                    <p>Rok: </p> <input type="text" name="year" class="same_lenght">
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane" class="styled-button" >
                <input type="reset" value="Wyczyść formularz" class="styled-button">

                <?php
                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
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