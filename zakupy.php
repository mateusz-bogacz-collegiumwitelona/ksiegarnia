<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Księgarnia</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./image/books.png" type="image/x-icon">
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
            <a href="./zakupy.php" class="button-link">Zakup</a>
        </aside>

        <main>
            <h2>Dodaj Zakup</h2>
            <form method="POST" action="zakupy.php">
                <div class="input-group">
                    <p>Imię: </p> 
                    <input type="text" name="name" required>
                    <p>Nazwisko: </p> 
                    <input type="text" name="surname" required>
                </div>

                <div class="input-group">
                    <p>Tytuł książki: </p> 
                    <input type="text" name="title" required>
                </div>

                <br><br>
                <input type="submit" value="Wprowadź dane" class="styled-button">
                <input type="reset" value="Wyczyść formularz" class="styled-button">
            </form>

            <?php
            $conn = mysqli_connect("localhost", "root", "", "ksiegarnia");

            if (!$conn) {
                die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               
                $name = isset($_POST["name"]) ? $_POST["name"] : null;
                $surname = isset($_POST["surname"]) ? $_POST["surname"] : null;
                $title = isset($_POST["title"]) ? $_POST["title"] : null;

               
                if (empty($name) || empty($surname) || empty($title)) {
                    echo "<h3>Proszę uzupełnić wszystkie wymagane pola.</h3>";
                } else {
                    $query_klient = "SELECT id_klienta FROM klienci WHERE imie = '$name' AND nazwisko = '$surname'";
                    $result_klient = $conn->query($query_klient);

                    if ($result_klient->num_rows > 0) {
                        $id_klienta = $result_klient->fetch_assoc()['id_klienta'];

                        $query_produkt = "SELECT id_produkt FROM produkty WHERE tytul = '$title'";
                        $result_produkt = $conn->query($query_produkt);

                        if ($result_produkt->num_rows > 0) {
                            $id_produktu = $result_produkt->fetch_assoc()['id_produkt'];

                            $query_insert = "INSERT INTO zakupy (id_klienta, id_produktu, data) VALUES ('$id_klienta', '$id_produktu', NOW())";
                            if ($conn->query($query_insert) === TRUE) {
                                echo "<h3>Zakup został dodany pomyślnie!</h3>";
                            } else {
                                echo "<h3>Błąd podczas dodawania zakupu: " . $conn->error . "</h3>";
                            }
                        } else {
                            echo "<h3>Nie znaleziono produktu o tytule: $title</h3>";
                        }
                    } else {
                        echo "<h3>Nie znaleziono klienta o imieniu: $name i nazwisku: $surname</h3>";
                    }
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
