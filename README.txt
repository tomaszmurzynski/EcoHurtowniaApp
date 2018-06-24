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


Quest 2.1


>> Tworzenie barcodów

Quest 2.2

>> Stworzenie standardowych wzorców dla barcode, takich jak :
- Wszystkie produkty aktywne po 1 szt barcodu
- Wszystkie produkty aktywne w ilości produktów w magazynie


Quest 2.3

>> Zapisywanie pliku z barcode na serwerze ftp.ecoflowers.nazwa.pl/EcoFlowers

Quest 2.4

>> Stworzenie filtrów dla generatora barcodów 
- Wybieranie produktu po id i dodawanie go do listy generatora barkodów

Quest 2.5    /// future 

>> Stworz barcody od produktu o numerze id do ostatnio dodanego produktu, według daty.

		











