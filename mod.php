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
            <form action="mod.php" method="post">
                <h2>Wprowadź dane klienta</h2>

                <div class="form-row">
                    <div class="form-group"></div>
                    <div class="form-group">
                        <p>ID:</p>
                        <input type="number" name="id">
                    </div>
                    <div class="form-group"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <p>Imię:</p>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <p>Nazwisko:</p>
                        <input type="text" name="surname">
                    </div>
                    <div class="form-group">
                        <p>Płeć:</p>
                        <input type="text" name="gender">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <p>Miasto:</p>
                        <input type="text" name="city">
                    </div>
                    <div class="form-group">
                        <p>Ulica:</p>
                        <input type="text" name="street">
                    </div>
                    <div class="form-group">
                        <p>Kod pocztowy:</p>
                        <input type="text" name="zip">
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