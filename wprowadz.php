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
            <form action="wprowadz.php" method="post">
                <h2>Wprowadź dane klienta</h2>

                <div class="input-group">
                    <p>Imię: </p> <input type="text" name="name" class="same_lenght">
                    <p>Nazwisko: </p> <input type="text" name="surname" class="same_lenght">
                    <p>Płeć: </p> <input type="text" name="gender" class="same_lenght">
                </div>

                <div class="input-group">
                    <p>Miasto: </p> <input type="text" name="city" class="same_lenght">
                    <p>Ulica: </p> <input type="text" name="street" class="same_lenght">
                    <p>Kod pocztowy: </p> <input type="text" name="zip" class="same_lenght">
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane" class="styled-button">
                <input type="reset" value="Wyczyść formularz" class="styled-button">

                <?php
                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                if (!$conn) {
                    die("<h3>Nie udało się połączyć z bazą danych: " . mysqli_connect_error() . "</h3>");
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $gender = $_POST["gender"];
                    $city = $_POST["city"];
                    $street = $_POST["street"];
                    $zip = isset($_POST["zip"]) ? $_POST["zip"] : '';

                    if (empty($name) || empty($surname) || empty($city) || empty($street) || empty($zip)) {
                        echo "<h3>Proszę uzupełnić wszystkie wymagane pola.</h3>";
                        return;
                    } else {
                        $sql1 = "INSERT INTO `miasto` (`id_miasta`, `miasto`, `ulica`, `kod_pocztowy`) VALUES (NULL, '$city', '$street', '$zip')";
                        $result1 = mysqli_query($conn, $sql1);
                        
                        $id_miasta = mysqli_insert_id($conn);
                        $sql2 = "INSERT INTO `klienci` (`id_klienta`, `imie`, `nazwisko`, `płeć`, `id_miasta`) VALUES (NULL, '$name', '$surname', '$gender', '$id_miasta')";
                        $result2 = mysqli_query($conn, $sql2);

                        if ($result2 && $result1) {
                            echo "<h3>Dane zostały wprowadzone pomyślnie.</h3>";
                        } else {
                            echo "<h3>Wystąpił błąd przy wprowadzaniu danych.</h3>";
                            return;
                        }
                    }

                    mysqli_close($conn);
                }
                ?>
            </form>
        </main>
    </div>    
    <footer>
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>