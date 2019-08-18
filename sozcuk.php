<?php
header('Content-Type: application/json');
if (!isset($_GET['terim']) || $_GET['terim'] == "") {
	 $uyari['hata'] = 'Lütfen Terim Giriniz';
 	die(json_encode($uyari));
} 
$terim = $_GET['terim'];
function tdk($terim)
{
$sesveri = file_get_contents("http://sozluk.gov.tr/yazim?ara=$terim");
$sesjsoncoz = json_decode($sesveri, true);
$sesurl = "http://sozluk.gov.tr/ses/" .$sesjsoncoz[0]["seskod"]. ".wav";
$veri = file_get_contents("http://sozluk.gov.tr/gts?ara=" .$terim);
$veriparcala = json_decode($veri, true);
$veriparcala[0]['telaffuz'] = $sesurl;
$veri = json_encode($veriparcala);
print_r($veri);
}
tdk($terim);
?>
