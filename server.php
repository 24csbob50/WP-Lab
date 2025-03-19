<!DOCTYPE HTML>
<html>
<body>

    <form action="server.php" method="get">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = htmlspecialchars($_GET["name"]);
        $email = htmlspecialchars($_GET["email"]);
        
        echo "Welcome " . $name . "<br>";
        echo "Your email address is: " . $email;
    }
    ?>

</body>
</html>
