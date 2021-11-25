<html>
    <title>Пупков Егор андреевич</title>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
    <body>
        <form method="POST" action="<?php print $PHP_SELF ?>">
            Login:
            <input type="text" name="login" size="10">
            <input type="hidden" name="log1" value="Ivanov_php">
            <input type="hidden" name="log2" value="Petrov_php">
            <input type="hidden" name="log3" value="Sidorov_php">
            <input type="hidden" name="log4" value="Pupkov_php">
            <input type="submit" name="prov" value="Вход">       
        </form>

        <?php
            if (isset($_POST["login"])) {
            if ($_POST["login"] == $_POST["log1"]) {
                echo "Здравствуйте, Иванов Иван Иванович!";
            } else if ($_POST["login"] == $_POST["log2"]) {
                echo "Здравствуйте, Петров Пётр Петрович!";
            } else if ($_POST["login"] == $_POST["log3"]) {
                echo "Здравствуйте, Сидоров Сергей Васильевич!";
            } else if ($_POST["login"] == $_POST["log4"]) {
                echo "Здравствуйте, Пупков Егор Андреевич!";
            } else echo "Вы не зарегестрированы!";
        }
        ?>
    </body>
</html>