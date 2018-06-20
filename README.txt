# EcoHurtowniaApp

Quest 1.0

>> Sklep internetowy ClickShop

W sklepie ClickShop stworzyć użytkownika z dostępem do webApi



Quest 1.1

>> CanvasFirstRunSettings

Wprowadzenie parametrów aplikacji przy pierwszym uruchomieniu:
- Adres serwera zawierającego skrypty php (webApi)  >> https://ecoflowers.nazwa.pl/EcoFlowers/
- Numer sklepu ClickShop                            >> 1796123
Zapisanie parametrów do bazy danych tinyDBLogin jako:
- ScriptAddres
- NumberOfStore

Zatwierdź przyciskiem "Zapisz"


Quest 1.2

>> CanvasLogin

Wprowadzenie pozostałych parametrów z możliwością zapamiętania przy ponownym uruchomieniu:
- Login                                             >> ecoflowersapp
- Hasło                                             >> standard EcoFlowers
- Boolen Zapamiętaj
Jeśli zmienna Boolen "Zapamiętaj" == true

    Zapisz parametry do bazy danych TinyDBLogin jako:
    - Login
    - Password
    
Jeśli zmienna Boolen "Zapamiętaj" == false

    Nie zapisuj parametrów do bazy

Zatwierdź przyciskiem "Zaloguj"


Quest 1.3

>> Sprawdzenie poprawności danych

Stworzyć skrypt PHP o nazwie login.php który będzie łączył się z sklepem internetowym ClickShop wykorzystując wcześniej wprowadzone dane.
Skrypt po wykonaniu powinien zwracać numer rozpoczętej sesji.

Numer sesji należy zapisać w bazie danych tinyDBLogin jako:

	- Session 


Quest 1.3.1   /// future

>> Przypomnienie hasła


Quest 1.4


>> Tworzenie barcodów









