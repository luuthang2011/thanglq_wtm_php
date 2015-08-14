<?php
    $rand = rand(0,1);
    $isBitten = true;
    if ($rand) {
        $isBitten = false;
    }
    if ($isBitten) {
        echo 'Charlie bit your finger!';
    }
    else {
        echo 'Charlie did not bite your finger!';
    }

    function countWords ($str) {
        for ($i=0;$i<strlen($str);$i++) {
            $word = substr($str,$i,1);
            echo $word . substr_count($str,$word);
        }
    }
    function countWords2 ($str) {
        $array = array();
        for ($i=0;$i<strlen($str);$i++) {
            $word = substr($str,$i,1);
            if (in_array($word,$array)==false) {
                array_push($array,$word);
            }
        }
        foreach ($array as $a) {
            echo '<p>' . $a . substr_count($str,$a) . '</p>';
        }
    }
    $str = 'luu quang thang';
    //countWords2($str);


?>