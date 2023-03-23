<?php
// dane logowania do bazy danych
$server= "localhost"; // adres serwera MySQL
$username = "root"; // nazwa użytkownika bazy danych
$password = ""; // hasło użytkownika bazy danych

// łączymy się z serwerem MySQL
$conn = new mysqli($server, $username, $password);

// sprawdzamy, czy udało się połączyć
if ($conn->connect_error) {
  die("Nie udało się połączyć z bazą danych: " . $conn->connect_error);
}

// tworzymy bazę danych
//$conn->query("CREATE DATABASE odziez ")
if ($conn->query($sql)) {
  echo "Baza danych została utworzona pomyślnie";
} else {
  echo "Błąd podczas tworzenia bazy danych: " . $conn->error;
}

// wybieramy bazę danych
$conn->select_db("odziez");

// Tworzenie tabeli 'produkty'
$tabela = "CREATE TABLE `produkty` (
    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nazwa` VARCHAR(255) NOT NULL,
    `cena` FLOAT(10,2) NOT NULL,
    `ilosc` INT(6) UNSIGNED NOT NULL,
    `zdjecie` VARCHAR(255) NOT NULL
)";

if ($conn->query($tabela) === TRUE) {
    echo "Tabela 'produkty' została utworzona pomyślnie";
} else {
    echo "Błąd podczas tworzenia tabeli 'produkty': " . $conn->error;
}

// Wstawienie danych do tabeli 'produkty'
$sql = "INSERT INTO `produkty` (`nazwa`, `cena`, `ilosc`, `zdjecie`)
VALUES ('Czapka zimowa', 50.00, 100, 'img/czapka.jpg'),
       ('Szalik', 35.00, 80, 'img/szalik.jpg'),
       ('Kurtka zimowa', 200.00, 50, 'img/kurtka.jpg'),
       ('Skarpetki zimowe', 40.00, 120, 'img/skarpetki.jpg'),
       ('Spodnie', 100.00, 60, 'img/spodnie.jpg'),
       ('Buty zimowe', 150.00, 40, 'img/buty-zimowe.jpg'),
       ('Bluza', 140.00, 70, 'img/bluza.jpg'),
       ('Rękawiczki', 60.00, 90, 'img/rekawiczki.jpg'),
       ('Kamizelka', 100.00, 50, 'img/kamizelka.jpg'),
       ('Kombinezon', 120.00, 30, 'img/kombinezon.jpg')",
       ('Kominiarka', 20.00, 30, 'img/kominiarka.jpg')",
       ('Ocieplacz', 120.00, 30, 'img/ocieplacz.jpg')";

if ($conn->query($sql) === TRUE) {
    echo "Dane zostały dodane do tabeli 'produkty' pomyślnie";
} else {
    echo "Błąd podczas dodawania danych do tabeli 'produkty': " . $conn->error;
}

// Zamykanie połączenia z bazą danych
$conn->close();
?>