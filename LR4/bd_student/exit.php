<?php
session_start();
if (!isset($_SESSION['type'])) {
    header("Location: index.php");
}
?>
<?php
if (isset($_GET["exit"])) {
    unset($_SESSION['type']);
    session_destroy();
    header("Location: index.php");
}
?>