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
			// wyświetlenie wyniku
			$session = $result[0];
		}
 
// Wykonanie zapytania 
	if ($session != null) {
		$params = Array(
			"method" => "call",
			"params" => Array($session, "product.list", 
						Array(true, true, false, false, false, null)
			)
		);
	// Zakodowanie parametrów dla metody POST
		$postParams = "json=" . json_encode($params);
		curl_setopt($c, CURLOPT_POSTFIELDS, $postParams);
	// Dekodowanie rezultatu w formacie JSON do tablicy result
		$data = curl_exec($c);
		$result = (Array)json_decode($data);
	// Sprawdzenie, czy wystąpił błąd
		if (isset($result['error'])) {
			echo "Wystąpił błąd: " . $result['error'] . ", kod: " . $result['code'];
		} 
		else {
			// Sprawdzenie odpowiedzi serwera 
			foreach ($result as $item) {
				// Sprawdzenie czy produkt jest aktywny
					$product = (Array)$item;
					$translations = (Array)$product['translations'];
					$translPL = (Array)$translations['pl_PL'];
				if ($translPL['active'] == 1) {
					$product = (Array)$item;
					// Wypisz ID produktu
						echo $product['product_id'] . "<br>";
					// Sprawdzenie nazwy produktu
						$translations = (Array)$product['translations'];
						$translPL = (Array)$translations['pl_PL'];
					// Wypisz nazwę produktu
						echo $translPL['name'] . "<br>";
					// Sprawdzanie ceny i dostępnej ilości produktu
						$stock = (Array)$product['stock'];
						// Wypisz cenę produktu
							echo $stock['price'] . "<br>";
					// Zakończenie
						//Wypisz </n> jako rozdzielenie produktu
							echo "</n>";
				}
			}
		}
	}
	else {
    // Wypisz błąd logowania
		echo "Wystąpił błąd logowania";
	}
// Zakończenie sesji
	curl_close($c);
?>