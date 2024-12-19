<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="icon" href="./image/books.png" type="image/x-icon">
</head>
<body>
    <header>
        <h1>Księgarnia</h1>
    </header>
    <div class="container">
        <aside>
            <a href="./index.php">Strona główna</a>
            <a href="./model.php">Model bazy danych</a>
            <a href="./wprowadz.php">Wprowadź dane klienta</a>
            <a href="./wprowadz1.php">Wprowadź dane książki</a>
            <a href="./wyswietl.php">Wyświtel dane kliętów oraz książek</a>
            <a href="./kasuj.php">Skasuj dane klienta</a>
            <a href="./kasuj1.php">Skasuj dane książki</a>
            <a href="./mod.php">Modyfikuj dane klięta</a>
            <a href="./raport.php">Raport ze sprzedaży</a>
            <a href="./zakupy.php">Zakup</a>
        </aside>
        <main>
            <form action="wprowadz.php" method="post">
                <h2>Wprowadź dane klienta</h2>

                <div class="input-group">
                    <p>Imię: </p> <input type="text" name="name">
                    <p>Nazwisko: </p> <input type="text" name="surname">
                    <p>Płeć: </p> <input type="text" name="gender">
                </div>

                <div class="input-group">
                    <p>Miasto: </p> <input type="text" name="city">
                    <p>Ulica: </p> <input type="text" name="street">
                    <p>Kod pocztowy: </p> <input type="text" name="zip">
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane">
                <input type="reset" value="Wyczyść formularz">

                <?php
                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $gender = $_POST["gender"];
                    $city = $_POST["city"];
                    $street = $_POST["street"];
                    $zip = $_POST["zip"];

                    if (empty($name) || empty($surname) || empty($city) || empty($street) || empty($zip)) {
                        echo "<h3>Proszę uzupełnić wszystkie wymagane pola.</h3>";
                    } else {
                        $sql = "INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `miasto`, `ulica`, `kod pocztowy`, `płeć`) VALUES (NULL, '$name', '$surname', '$city', '$street', '$zip', '$gender');";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result) {
                            echo "<h3>Dane zostały wprowadzone pomyślnie.</h3>";
                        } else {
                            echo "<h3>Wystąpił błąd przy wprowadzaniu danych.</h3>";
                        }
                    }

                    mysqli_close($conn);
                }
                ?>

            </form>
        </main>
    </div>    
    <footer>
            <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. Wszelie prawa zastrzeżone.</p>
    </footer>
</body>
</html>