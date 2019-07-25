<?php
header('Content-Type: application/json');
$terim = $_GET['terim'];
if ($terim == "") {
	 $uyari['hata'] = 'Lütfen Terim Giriniz';
 	die(json_encode($uyari));
 } 
function tdk($terim)
{
$veri = file_get_contents("http://sozluk.gov.tr/adlar?ara=" .$terim. "&gore=1&cins=4");
$vericoz = json_decode($veri, true);
$sonsayi = count($vericoz);
$i = 0;
while ($i <= $sonsayi) {
	if ($vericoz[$i]["cins"] == "1") {
	$vericoz[$i]["cins"] = "Kız";
}elseif ($vericoz[$i]["cins"] == "2") {
	$vericoz[$i]["cins"] = "Erkek";
}
$i++;
}
$veri = json_encode($vericoz);
print_r($veri);
}
tdk($terim);
?>