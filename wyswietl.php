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
            <h2>Wyświetl Bazę</h2>
            <form action="wyswietl.php" method="POST">
                <div class="button-group">
                    <input type="submit" name="database" value="klienci" class="styled-button">
                    <input type="submit" name="database" value="produkty" class="styled-button">
                </div>
            </form>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
            if (!$conn) {
                die("Problem z połączeniem: " . mysqli_connect_error());
            }

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['database']) && $_POST['database'] == 'klienci') {
                    $sql = 'SELECT klienci.id_klienta, klienci.imie, klienci.nazwisko, klienci.płeć, miasto.miasto, miasto.ulica, miasto.kod_pocztowy 
                            FROM klienci 
                            INNER JOIN miasto ON klienci.id_miasta = miasto.id_miasta;';
                    $result = mysqli_query($conn, $sql);

                    echo "<div class='table-container'>
                            <table border=\"2\">
                                <tr>
                                    <th>Id klienta</th>
                                    <th>Imię</th>
                                    <th>Nazwisko</th>
                                    <th>Miasto</th>
                                    <th>Ulica</th>
                                    <th>Kod Pocztowy</th>
                                    <th>Płeć</th>
                                </tr>";
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<tr> 
                                <td>" . $row[0] . "</td>
                                <td>" . $row[1] . "</td>
                                <td>" . $row[2] . "</td>
                                <td>" . $row[4] . "</td>
                                <td>" . $row[5] . "</td>
                                <td>" . $row[6] . "</td>
                                <td>" . $row[3] . "</td>
                            </tr>";
                    }
                    echo "</table></div>";
                } elseif (isset($_POST['database']) && $_POST['database'] == 'produkty') {
                    $sql = 'SELECT * FROM `produkty`;';
                    $result = mysqli_query($conn, $sql);
                    echo "<div class='table-container'>
                            <table border=\"2\">
                                <tr>
                                    <th>Id produktu</th>
                                    <th>Tytuł</th>
                                    <th>Autor</th>
                                    <th>Wydawnictwo</th>
                                    <th>Cena</th>
                                    <th>Rok Wydania</th>
                                </tr>";
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<tr> 
                                <td>" . $row[0] . "</td>
                                <td>" . $row[1] . "</td>
                                <td>" . $row[2] . "</td>
                                <td>" . $row[3] . "</td>
                                <td>" . $row[4] . "</td>
                                <td>" . $row[5] . "</td>
                            </tr>";
                    }
                    echo "</table></div>";
                }
            }
            mysqli_close($conn);
            ?>
        </main>
    </div>    
    <footer>
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>