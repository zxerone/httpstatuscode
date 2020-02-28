<?php
# Name : Http Status Code Checker
# Author : ZxerOne
# from PhobiaXploit
# W gans tq

system('clear');
echo "                                                          
 $$$$$$\   $$$$$$\   $$$$$$\         $$$$$$\  $$\   $$\ 
$$  __$$\ $$    $$\ $$    $$\       $$  __$$\ $$ | $$  |
\__/  $$ |$$    $$ |$$    $$ |      $$ /  $$ |$$ |$$  / 
 $$$$$$  |$$    $$ |$$    $$ |      $$ |  $$ |$$$$$  /  
$$  ____/ $$    $$ |$$    $$ |      $$ |  $$ |$$  $$<   
$$ |      $$    $$ |$$    $$ |      $$ |  $$ |$$ |\$$\  
$$$$$$$$\ \ $$$$$  /\ $$$$$  /       $$$$$$  |$$ | \$$\ 
\________| \______/  \______/        \______/ \__|  \__|

                                                        
      Http Status Code Checker
coded by ZxerOne || Saeb Randovlsky                                                        
                                                        
";

echo "[?] Masukkan nama list : ";
$flist = trim(fgets(STDIN));

$buka = fopen("$flist","r");
$ukuran = filesize("$flist");
$baca = fread($buka,$ukuran);
$lists = explode("\n",$baca);

foreach($lists as $list){
 if(!preg_match("/^http:\/\//",$list) AND !preg_match("/^https:\/\//",$list)){
	$site = "http://$list";
}else{
	$site = $list;
}

	$ch = curl_init("$site");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	echo "[#] [".$site."] [".$httpcode."]\n";
}
?>
