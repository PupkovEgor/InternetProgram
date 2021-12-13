<?php
    if (isset($_POST["text1"]) and isset($_POST["word1"])) {
        $text = str_replace($_POST["word1"], "", $_POST["text1"]);
        echo $text;
    }
?>