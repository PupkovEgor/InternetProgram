<html>
<body>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <h2>Авторизация</h2>
    Введите Логин: <input type="text" name="username"> <br>
    Введите Пароль: <input type="password" name="password"> <br>
    <input type="submit" name="come" value="Войти"> <br>
    <input type="reset" name="reset" value="Очистить"> <br>
</form>
<?php

$mysqli = new mysqli("localhost", "root");
mysqli_connect("localhost", "root") or die ("Невозможно подключиться к серверу");
mysqli_select_db($mysqli, "students") or die("Нет такой таблицы!");
if (isset($_POST["come"])) {
    $user = mysqli_query($mysqli,"SELECT id, username, password, type FROM users");
    // Ввод
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Для индитификации входа
    $errFlag = false;
    // Проверка вводимых данных
    while ($data = mysqli_fetch_array($user)) {
        $usernameBD = $data['username'];
        $passwordBD = $data['password'];
        $typeBD = $data['type'];
        $idUserBD = $data['id'];

        if ($username === $usernameBD && md5($password) === $passwordBD) {
            $errFlag = true;
            session_start();
            $_SESSION['type'] = $typeBD;
            $_SESSION['id'] = $idUserBD;
            break;
        } else
            $errFlag = false;
    }

    if ($errFlag && $_SESSION['type'] == 1)
        header("Refresh:0; url=menuOper.php");
    elseif ($errFlag && $_SESSION['type'] == 2)
        header("Refresh:0; url=menuAdmin.php");
    else
        echo "Логин или пароль введен не верно";

}
?>
<br>
</body>
</html>