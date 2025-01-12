<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Biblioteka</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <header>
            <h1>Biblioteka w Książkowicach Małych</h1>
        </header>
        <div class="center">
            <aside>
                <h4>Dodaj czytelnika</h4>
                <form action="/egzamin/egzamin-czerwiec-2023-biblioteka/biblioteka.php" method="POST">
                    <label for="imie">imie: </label><input type="text" id="imie" name="imie">
                    <label for="nazwisko">naziwsko: </label><input type="text" id="nazwisko" name="nazwisko">
                    <label for="symbol">symbol: </label><input type="number" id="symbol" name="symbol">
                    <button type="submit">AKCEPTUJ</button>
                </form>
                <?php 
                if(isset($_POST["imie"])){
                    $conn = mysqli_connect("localhost","root","","biblioteka");
                    $query = mysqli_query($conn, "INSERT INTO `czytelnicy`(`imie`, `nazwisko`, `kod`) VALUES ('".$_POST["imie"]."','".$_POST["nazwisko"]."','".$_POST["symbol"]."'); ");
                    echo "Dodano użytkownika: " . $_POST["imie"] . " " . $_POST["nazwisko"];
                    mysqli_close($conn);
                }
                ?>
            </aside>
            <main>
                <img src="biblioteka.png" alt="biblioteka">
                <h6>ul. Czytelników&nbsp;15; Książkowice Małe</h6>
                <p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
            </main>
            <aside>
                <h4>Nasi czytelnicy:</h4>
                <ol>
                    <?php
                    $conn = mysqli_connect("localhost","root","","biblioteka");
                    $query = mysqli_query($conn, "SELECT imie, nazwisko FROM `czytelnicy` ORDER BY nazwisko; ");
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<li>".$row["imie"]." ".$row["nazwisko"]."</li>";
                    }
                    mysqli_close($conn);
                    ?>
                </ol>
                
            </aside>
        </div>
        <footer><p>Projekt witryny: 000-000-000-00</p></footer>
    </body>
</html>