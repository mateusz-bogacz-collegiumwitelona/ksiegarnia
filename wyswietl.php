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
            <a href="./index.php" class="button-link">Strona główna</a>
            <a href="./model.php" class="button-link">Model bazy danych</a>
            <a href="./wprowadz.php" class="button-link">Wprowadź dane klienta</a>
            <a href="./wprowadz1.php" class="button-link">Wprowadź dane książki</a>
            <a href="./wyswietl.php" class="button-link">Wyświetl dane klientów oraz książek</a>
            <a href="./kasuj.php" class="button-link">Skasuj dane klienta</a>
            <a href="./kasuj1.php" class="button-link">Skasuj dane książki</a>
            <a href="./mod.php" class="button-link">Modyfikuj dane klienta</a>
            <a href="./raport.php" class="button-link">Raport ze sprzedaży</a>
        </aside>
        <main>
            <h2>Wyświetl Bazę</h2>
            <form action="wyswietl.php" method="POST">
                <button type="submit" name="database" value="clients" class="styled-button">Wyświetl bazę klientów</button>
                <button type="submit" name="database" value="products" class="styled-button">Wyświetl bazę produktów</button>
            </form>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($conn->connect_error) {
                    die("Problem z połączeniem: " . $conn->connect_error);
                } 

                if ($_POST['database'] == 'clients') {
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
                } else {
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