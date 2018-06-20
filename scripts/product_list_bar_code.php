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
	// echo "Identyfikator sesji użytkownika: " . $session;
}
 
 
if ($session != null) {
    $params = Array(
        "method" => "call",
        "params" => Array($session, "product.list", 
                Array(true, true, true, false, false, null)
            //            Array(59, 91, 92, 93, 94) // id produktów
            //        )
            )
    );
 
    // zakodowanie parametrów dla metody POST
    $postParams = "json=" . json_encode($params);
    curl_setopt($c, CURLOPT_POSTFIELDS, $postParams);
 
    // dekodowanie rezultatu w formacie JSON do tablicy result
    $data = curl_exec($c);
    $result = (Array)json_decode($data);
 
    // sprawdzenie, czy wystąpił błąd
    if (isset($result['error'])) {
        echo "Wystąpił błąd: " . $result['error'] . ", kod: " . $result['code'];
    } else {
        foreach ($result as $item) {
            $product = (Array)$item;
			$stock = (Array)$product['stock'];
			$mag = $stock['stock'];
			
			
			if ($mag != 0) {
			
			
			
			$product = (Array)$item;
 
            echo $product['product_id'] . "<br>";
 
            $translations = (Array)$product['translations'];
            $translPL = (Array)$translations['pl_PL'];
            echo $translPL['name'] . "<br>";
 
            $stock = (Array)$product['stock'];
            echo $stock['price'] . "<br>";
            echo $stock['stock'] . "<br>";
            echo "<hr>";
        }}
    }
} else {
    echo "Wystąpił błąd logowania";
}
 
curl_close($c);
?>