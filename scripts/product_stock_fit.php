

<?php
// Pobieranie danych
	// Metoda POST
		$login = $_GET['login'];
		$password = $_GET['password'];
	// Metoda GET
		$storeNumber = $_GET['storeNumber'];
		$id = $_GET['id'];
		$stock = $_GET['stock'];

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
		}
 
if ($session != null) {
    // Sprawdzenie czy stan magazynu jest równy 0
	if ($stock == 0) {
		$product = Array(        
        "stock" => Array(
            "stock" => $stock,
        ),
		"translations" => Array(
            "pl_PL" => Array(
                "active" => 0,                
            ),
		),
		);
	}
	// Jeśli stan magazynu jest wiekszy od 0
	else {
		$product = Array(        
        "stock" => Array(
            "stock" => $stock,
        ),        
    );
	}
 
    $params = Array(
        "method" => "call",
        "params" => Array($session, "product.save", Array($id, $product, true))             
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
    } else {
        if ($result[0] == -1) {
            echo "Podane dane są nieprawidłowe i nie spełniają wymagań walidacji";
        } else if ($result[0] == 0) {
            echo "Operacja się nie udała";
        } else if ($result[0] == 1) {
            echo "Produkt został zapisany";
        } else if ($result[0] == 2) {
            echo "Operacja się nie udała - obiekt jest zablokowany przez innego administratora";
        }
    }
} else {
    echo "Wystąpił błąd logowania";
}
 
curl_close($c);
?>