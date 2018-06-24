<?php
// Pobieranie danych
	// Metoda POST
		$login = $_GET['login'];
		$password = $_GET['password'];
	// Metoda GET
		$storeNumber = $_GET['storeNumber'];

// Tworzenie sesji		
	$c = curl_init();
	// Tworzenie adresu serwera WebApi 
		$URL = 'http://sklep'.$storeNumber.'.home.pl/webapi/json/';
	
	curl_setopt($c, CURLOPT_URL, $URL);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
 
$params = Array(
	"method" => "login",
	"params" => Array($login, $password)
);
 
// Zakodowanie parametrów dla metody POST
		$postParams = "json=" . json_encode($params);
		curl_setopt($c, CURLOPT_POSTFIELDS, $postParams);
 
	// Dekodowanie rezultatu w formacie JSON do tablicy result
		$data = curl_exec($c);
		$result = (Array)json_decode($data);
 
	// Sprawdzenie, czy wystąpił błąd
		if (isset($result['error'])){
			echo "Wystąpił błąd: " . $result['error'] . ", kod: " . $result['code'] ."<br>";
		} 
		else {
			// Wyświetlenie wyniku
			$session = $result[0];
			// Wypisz id sesji
			echo $session;
		}

curl_close($c);
?>