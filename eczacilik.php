<?php
header('Content-Type: application/json');
$terim = $_GET['terim'];
if ($terim == "") {
	 $uyari['hata'] = 'Lütfen Terim Giriniz';
 	die(json_encode($uyari));
 } 
function tdk($terim)
{
$veri = file_get_contents("http://sozluk.gov.tr/eczacilik?ara=" .$terim);
print_r($veri);
}
tdk($terim);
?>