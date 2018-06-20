<?php
$login = $_GET['login'];
$password = $_GET['password']; 
$c = curl_init();
curl_setopt($c, CURLOPT_URL, 'http://sklep1796123.home.pl/webapi/json/');
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
 
$params = Array(
	"method" => "login",
	"params" => Array($login, $password)
);
 
// zakodowanie parametrów dla metody POST
$postParams = "json=" . json_encode($params);
curl_setopt($c, CURLOPT_POSTFIELDS, $postParams);
 
// dekodowanie rezultatu w formacie JSON do tablicy result
$data = curl_exec($c);
$result = (Array)json_decode($data);
 
// sprawdzenie, czy wystąpił błąd
if (isset($result['error'])){
	echo "Wystąpił błąd: " . $result['error'] . ", kod: " . $result['code'];
} else {
	// wyświetlenie wyniku
	$session = $result[0];
	echo $session;
}

curl_close($c);
?>