#######################################
#### Aplikacja "Rejestr Produktów" ####
#######################################



Zadanie:

Stworzyć aplikacje umożliwiającą zarządzającą tabelką produkty.
Aplikacja ma umożliwić wykonywanie podstawowych operacji CRUD na rekordach tabeli.
Aplikacja powinna działać w oparciu wzorca: Single-page application.


########################################################
#### Podstawowe wymagane funkcjonalności aplikacji: ####
########################################################

- Tabela z listą produktów
- Formularz dodania/edycji produktu
- Usuwanie produktów
- Należy wykorzystać bieżący szkielet aplikacji:
  * katalog "client", warstwa klienta (HTML, JS, CSS)
  * katalog "server", warstwa serwera, (PHP - REST API) 


#Dodatkowe mile widziane funkcjonalności:
- Paginacja tabeli produktów
- Możliwość sortowania elementów tabeli w kolumnach
- Możliwość wyszukiwania elementów w tabeli
- Formularz dodania/edycji produktu umieszczony w oknie modalnym




################################
#### Krótki opis aplikacji: ####
################################

W głównym widoku aplikacji powinna znajdować się tabela (GRID) z listą dostępnych produktów.
Przy każdym z nich powinna być dostępna akcja z możliwością edycji i usunięcia produktu.
Nad tabelką powinien znajdować się przycisk umożliwiający dodanie nowego produktu.



##################################################
#### Technologie użyte do realizacji zadania: ####
##################################################

#Warstwa Klienta:
- Framework AngularJS (obowiązkowy)
- HTML
- JavaScript
- Dowolne inne, dodatkowe narzędzia JS, CSS, moduły AngularJS


#Warstwa Serwera:
- PHP
- lub dowolny Framework PHP (np. Yii, Yii2)


#DB:
- Należy wykorzystać bazę umieszczoną w projkecie: Katalog server/db.
- Można korzystać z dowolnej wybranej bazy danych: MySql, PgSql, SQLite; lub całą obsługę zrobić na plikach JSON lub CSV


___________________________________________________________________________________________________________________________


#################################
#### Uruchomienie Aplikacji: ####
#################################


Do uruchomienia aplikacji potrzebny jest serwer http ( Apache,Nginx lub inny). Po sklonowaniu aplikacji należy pobrać potrzebne biblioteki. Aby to zrobić trzeba skorzystać z narzędzia „bower”. Opis instalacji znajdziemy pod adresem: http://bower.io/#install-bower Po instalacji narzędzia przechodzimy do katalogu ‘client’ i z linii komend wykonujemy polecenie: $ bower update To polecenie pobierze nam potrzebne biblioteki do uruchomienia aplikacji. Pobrane biblioteki znajdują się w katalogu 'vendor'. Jeśli chcemy dodać kolejną bibliotekę aktualizujemy plik 'bower.json' a następnie wykonujemy polecenie: $ bower update.



###############################
#### Przesłanie aplikacji: ####
###############################


Prosimy o przesłanie gotowej aplikacji w formie paczki .zip pod adres e-mail wskazany w rekrutacji. Prosimy o nie dołączanie do aplikacji katalogu vendor.
Najlepszym sposobem na przesłanie aplikacji będzie umieszczenie jej w repozytorium GIT (GitHub, Bitbucket) a następnie przesłanie linka z możliwością
sklonowania aplikacji pod wskazany wcześniej adres e-mail

___________________________________________________________________________________________________________________________


Powodzenia!
