<?php

function mb_str_split($str, $l = 0) {
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}

    if (isset($_POST["text1"])){
        $char = array("а", "е", "ё", "ж", "и", "о", "у", "ы", "э", "ю","я");
        $string = mb_str_split($_POST["text1"]);
        $count = strlen($_POST["text1"]);
        $sum = 0;
        for ($i = 0; $i <= 10; $i++) {
            for ($k = 0; $k <= $count; $k++){
                if ($char[$i] == $string[$k]) $sum++;
            }
        }
    echo ("В строке ". $sum . " гласных");   
    }
?>