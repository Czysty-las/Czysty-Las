W katalogu wampa od MySQl(wamp\bin\mysql\mysql5.6.17) w pliku my.ini 
linia 38 zmieniæ na:
datadir=katalog gdzie znajduje siê u was lokalnie projekt/Czysty-Las/CzystyLasPage/Database
jak i [wampmysqld] na [wampmysqld64] w lini 26

Sprawi to, ¿e pliki z baz¹ danych bêd¹ pod opieka gita. Co oszczêdzi nam ich podmienianie w przysz³oœci. 
Zadanie to przejmie za nas GIT. 

Nale¿y wprowadziæ jeszcze jedn¹ zmianê do konfiguracji

Katalog, z którego wamp bêdzie pobiera³ nasz¹ stronê.

Apache(wamp\bin\apache\apache2.4.9\conf) plik httpd.conf
Linia 230
DocumentRoot "katalog gdzie znajduje siê u was lokalnie projekt/Czysty-Las/CzystyLasPage/public_html"

Linia 252
<Directory "katalog gdzie znajduje siê u was lokalnie projekt/Czysty-Las/CzystyLasPage/public_html">

Pozwoli to przekierowaæ wampa na katalog, gdzie bêd¹ znajdowaæ siê wszystkie niezbêdne skrypty PhP,
które bed¹ niezbêdne do dzia³ania strony.