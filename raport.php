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
            <h2>Raport sprzedaży</h2>
            <form action="raport.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <p>Od: </p> 
                        <select name="od" >
                        <?php 
                            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                            if ($conn->connect_error) {
                                die("Problem z połączeniem: " . $conn->connect_error);
                            }
                            $sql = "SELECT DISTINCT DATE(data) as data FROM zakupy ORDER BY data ASC;";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['data']."'>".$row['data']."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">      
                        <p>Do: </p> 
                        <select name="do" >
                        <?php
                            $sql = "SELECT DISTINCT DATE(data) as data FROM zakupy ORDER BY data DESC;";
                            $result = mysqli_query($conn, $sql);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='".$row['data']."'>".$row['data']."</option>";
                            }
                        ?>
                        </select>
                    </div>   
                </div>

                <div class="button-group">
                    <input type="submit" value="Wprowadź dane" class="styled-button">
                    <input type="reset" value="Wyczyść formularz" class="styled-button">
                </div>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($conn->connect_error) {
                    die("Problem z połączeniem: " . $conn->connect_error);
                } 
                $od = mysqli_real_escape_string($conn, $_POST["od"]);
                $do = mysqli_real_escape_string($conn, $_POST["do"]);
            
                if (empty($od) || empty($do)) {
                    echo "<h3>Proszę wybrać daty z listy.</h3>";
                } else {
                    $sql = "
                        SELECT 
                            k.id_klienta, 
                            CONCAT(k.imie, ' ', k.nazwisko) AS klient, 
                            ROUND(SUM(p.cena), 2) AS suma_zakupow 
                        FROM zakupy z 
                        JOIN klienci k ON z.id_klienta = k.id_klienta 
                        JOIN produkty p ON z.id_produktu = p.id_produkt 
                        WHERE DATE(z.data) BETWEEN ? AND ?
                        GROUP BY k.id_klienta, k.imie, k.nazwisko 
                        ORDER BY suma_zakupow DESC 
                        LIMIT 25
                    ";

                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $od, $do);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<div class='table-container'>
                                <table border='2'>
                                    <tr>
                                        <th>ID klienta</th>
                                        <th>Dane klienta</th>
                                        <th>Suma zakupów (PLN)</th>
                                    </tr>";
                        while ($row = $result->fetch_row()) {
                            echo "<tr> 
                                    <td>" . htmlspecialchars($row[0]) . "</td>
                                    <td>" . htmlspecialchars($row[1]) . "</td>
                                    <td>" . htmlspecialchars($row[2]) . "</td>
                                </tr>";
                        }
                        echo "</table></div>";
                    } else {
                        echo "<h3>Brak danych dla wybranego okresu.</h3>";
                    }
                    $stmt->close();
                }
            }
            if (isset($conn)) {
                mysqli_close($conn);
            }
            ?>
        </main>
    </div>
    <footer>
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>