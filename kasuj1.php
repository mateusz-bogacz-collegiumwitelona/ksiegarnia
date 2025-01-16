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
            <form action="kasuj1.php" method="post">
                <h2>Usuń dane książki</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <p>Wybierz książkę: </p>
                            <select name="id" class="same_lenght">
                            <?php 
                                $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");
                                $sql = "SELECT `id_produkt`,`tytul`,`autor`,`wydawnictwo` FROM `produkty`;";
                                $result = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='".$row['id_produkt']."'>ID: ".$row['id_produkt']." - ".$row['tytul']." (".$row['autor'].")</option>";
                                }
                            ?>
                            </select>
                        </div>
                    </div> 

                <div class="button-group">
                    <input type="submit" value="Wprowadź dane" class="styled-button">
                    <input type="reset" value="Wyczyść formularz" class="styled-button">
                </div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if ($conn->connect_error) {
                        die("Problem z połączeniem: " . $conn->connect_error);
                    } 
                    $id = $_POST['id'];

                    if (empty($id)) {
                        echo "<h3>Proszę wybrać książkę z listy.</h3>";
                    } else {
                        $sql = "DELETE FROM produkty WHERE `produkty`.`id_produkt` = $id;";
                        $result = mysqli_query($conn, $sql);
                        
                        if ($result) {
                            echo "<h3>Dane zostały usunięte pomyślnie.</h3>";
                        } else {
                            echo "<h3>Wystąpił błąd przy usuwaniu danych.</h3>";
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