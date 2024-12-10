<?php
    if(!empty($_POST["text"])){
        $conn = mysqli_connect("localhost", "root", "", "forumpsy");
        $query = mysqli_query($conn, "INSERT INTO `odpowiedzi` (`Pytania_id`, `konta_id`, `odpowiedz`) VALUES (1, 5, '" . $_POST["text"] . "');");
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>Forum miłośników psów</h1>
    </header>
    <main>
        <div id="lewy">
            <img src="Avatar.png" alt="Użytkownik forum">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "forumpsy");
                $query = mysqli_query($conn, "SELECT `nick`, `postow`, `pytanie` FROM `konta` JOIN `pytania` ON konta.id = pytania.konta_id WHERE pytania.id = 1;");

                while ($row = mysqli_fetch_assoc($query)){
                    echo "<h4>Użytkownik: {$row['nick']} </h1>
                    <p> {$row['postow']} postów na forum</p>
                    <p> {$row['pytanie']} </p>";
                }
            ?>
            <video controls autoplay>
                <source src="video.mp4" type="video/mp4"/>
                Your browser doesn't support video format.
            </video>
        </div>
        <div id="prawy">
            <form action="index.php" method="POST">
                <textarea name="text" id="textarea" cols="40" rows="4"></textarea>
                <button type="submit">Dodaj odpowiedź</button>
            </form>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>
                <?php
                $conn = mysqli_connect("localhost", "root", "", "forumpsy");
                $query = mysqli_query($conn, "SELECT Odpowiedzi.id, Odpowiedzi.odpowiedz, konta.nick FROM Odpowiedzi JOIN konta ON konta.id = Odpowiedzi.konta_id WHERE Odpowiedzi.Pytania_id = 1;");
                
                while ($row = mysqli_fetch_assoc($query)){
                    echo "<li> {$row['odpowiedz']} <i>{$row['nick']}</i> <hr/> </li>";
                }
                ?>
            </ol>
            
        </div>
    </main>
    <footer>
        <span>Autor: 00000000000, </span><a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>