<?php
    $_host      = "localhost";
    $_username  = "root";
    $_password  = "";

    $_database  = "siren.platform";

    $_connection = mysql_connect($_host, $_username, $_password);

    mysql_select_db($_database);

    $sRequest = "SELECT `name` FROM `companies` WHERE `name` LIKE '%{$sParam}%' ORDER BY `cid`";

    $file = "text.txt";
    //если файла нету... тогда
    if (!file_exists($file)) {

    $aItemInfo = mysql_query($sRequest);
    $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
    foreach ($aItemInfo as $aValues) {
        echo $aValues['name'] . "\n";
    


        
        fwrite($fp, $aValues['name']);
        
    }
    fclose($fp);

    }

?>