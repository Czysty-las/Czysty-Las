W katalogu wampa od MySQl(wamp\bin\mysql\mysql5.6.17) w pliku my.ini 
linia 38 zmieni� na:
datadir=katalog gdzie znajduje si� u was lokalnie projekt/Czysty-Las/CzystyLasPage/Database
jak i [wampmysqld] na [wampmysqld64] w lini 26

Sprawi to, �e pliki z baz� danych b�d� pod opieka gita. Co oszcz�dzi nam ich podmienianie w przysz�o�ci. 
Zadanie to przejmie za nas GIT. 

Nale�y wprowadzi� jeszcze jedn� zmian� do konfiguracji

Katalog, z kt�rego wamp b�dzie pobiera� nasz� stron�.

Apache(wamp\bin\apache\apache2.4.9\conf) plik httpd.conf
Linia 230
DocumentRoot "katalog gdzie znajduje si� u was lokalnie projekt/Czysty-Las/CzystyLasPage/public_html"

Linia 252
<Directory "katalog gdzie znajduje si� u was lokalnie projekt/Czysty-Las/CzystyLasPage/public_html">

Pozwoli to przekierowa� wampa na katalog, gdzie b�d� znajdowa� si� wszystkie niezb�dne skrypty PhP,
kt�re bed� niezb�dne do dzia�ania strony.