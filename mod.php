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
            <form action="mod.php" method="post">
                <h2>Wprowadź dane klienta</h2>

                <div class="input-group">
                    <p>ID: </p> <input type="number" name="id" class="same_lenght">
                </div>
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
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    if ($conn->connect_error) {
                        die("Problem z połączeniem: " . $conn->connect_error);
                    } 

                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $gender = $_POST["gender"];
                    $city = $_POST["city"];
                    $street = $_POST["street"];
                    $zip = $_POST["zip"];

                    if (empty($name) || empty($surname) || empty($city) || empty($street) || empty($zip) || empty($id)) {
                        echo "<h3>Proszę uzupełnić wszystkie wymagane pola.</h3>";
                    } else {
                        $sql1 = "
                            UPDATE `miasto` 
                            SET `miasto` = '$city', `ulica` = '$street', `kod_pocztowy` = '$zip' 
                            WHERE `id_miasta` = (SELECT `id_miasta` FROM `klienci` WHERE `id_klienta` = $id);
                        ";
                        $result1 = mysqli_query($conn, $sql1);

                        $sql2 = "
                            UPDATE `klienci` 
                            SET `imie` = '$name', `nazwisko` = '$surname', `płeć` = '$gender' 
                            WHERE `id_klienta` = $id;
                        ";
                        $result2 = mysqli_query($conn, $sql2);
                        
                        if ($result1 && $result2) {
                            echo "<h3>Dane zostały zmodyfikowane.</h3>";
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
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>