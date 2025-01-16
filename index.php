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
            <div class="conn">
                <p>Projekt modelu obsługi księgarni "Księgarnia by Mateusz Bogacz-Drewniak".</p>
                <p>Jest to projekt na zaliczenie przedmiotu bazy danych mający na celu stworzenie prostego modelu zarządzania księgarnią.</p>
                <p>Enjoy 😊</p>    

            </div>
        </main>
    </div>    
    <footer>
        <p>Wykonał Mateusz Bogacz-Drewewniak, student 2 roku Informatyki na Collegium Witelona Uczelnia Państwowa, nr.indexu: 44491. &copy Wszelkie prawa zastrzeżone.</p>
    </footer>
</body>
</html>