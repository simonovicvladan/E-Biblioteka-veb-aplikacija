# E-Biblioteka-veb-aplikacija
Veb aplikacija sa AJAX funkcionalnostima, REST API. Poseduje i frontend i backend deo. Projekat sadrzi dokumetaciju
Potrebno je projektovati, razviti i implementirati veb aplikaciju, koja poseduje AJAX funkcionalnosti, koristi gotovi REST API (javni veb servis) i u kojoj se kreira i koristi sopstveni REST API (sopstveni veb servis). Temu seminarskog rada iz Internet tehnologija studenti osnovnih studija mogu predložiti sami ili izabrati sa spiska ponuđenih tema. Studenti koji sami predlažu temu za seminarski treba da se sa nekim od nastavnika ili asistenata na predmetu prethodno dogovore o tačnom nazivu i sadržaju seminarskog rada. Studenti koji biraju neku od ponuđenih tema, prijavljuju se isključivo preko sajta. Spisak tema nije konačan i biće proširen po potrebi.

Web aplikacija treba da bude skladna celina, koja poseduje javni (frontend) i administratorski (backend) deo. Seminarski rad treba da sadrži dokumentaciju i implementaciju web aplikacije.

I deo - Dokumentacija

Realizaciju aplikacije opisati preko dokumentacije, koja treba da sadrži:

Jasno specificiran i formulisan korisnički zahtev.
Opis sistema koji obuhvata:
Opis slučajeva korišćenja (za nekoliko karakterističnih slučajeva)
Opis arhitekture aplikacije - osnovni segmenti i komponente aplikacije, dijagram komponenti, način na koji komponente komuniciraju
Opis procesa za par karakterističnih slučajeva korišćenja (dijagrami sekvenci)
Model podataka - PMOV (ili dijagram klasa), struktura baze
Detaljna specifikacija REST API-ja – za svaku funkciju sopstvenog web servisa treba napraviti detaljnu dokumentaciju. Može se napraviti dokumentacija uz korišćenje uzora dokumentacija različitih javnih REST servisa (https://dev.twitter.com/docs/api/1.1,http://developer.wordpress.com/docs/api/, http://www.twilio.com/docs/api/rest i sl.). Dokumetacija REST API-ja bi trebalo da sadrži:
Naziv funkcije
Opis funkcije
Endpoint do funkcije (URL za pristup ovoj funkciji)
Metoda koja se koristi za slanje podataka (GET, POST, PUT, DELETE)
HTTP zaglavlja koja je potrebno poslati i vrednosti ovih zaglavlja sa opisima
Parametri koje je potrebno poslati i u kom formatu
Izlaz i format izlaza koji se dobija kao rezultat funkcije
Opis tehnologija korišćenih u aplikaciji - ukratko objasniti tehnologije korišćene u realizaciji aplikacije
Korisničko uputstvo - Opis karakterističnih slučajeva korišćenja preko screenshot-ova aplikacije
Prikaz reprezentativnih delova koda
II deo - Implementacija

Web aplikaciju je moguće implementirati korišćenjem proizvoljne serverske tehnologije (npr. PHP, ASP.NET, JSP, Python, Ruby…). Implementacija veb aplikacije obuhvata sledeće zahteve:


Minimalni zahtevi aplikacije, koje je neophodno ispuniti za prelazne ocene su:

Postojanje baze i osnovnih operacija nad istom (select, insert, update, delete)
Bar jedna AJAX funkcionalnost po članu ekipe
Poziv najmanje jednog javnog web servisa
Kreiranje najmanje dve funkcije sopstvenog web servisa
Bar dve korisničke uloge nad sistemom (npr. administrator, običan korisnik)
Obezbediti upravljanje sesijom (login, logout)
Bar dve dodatne jednostavnije funkcionalnosti (pretraga, sortiranje, upravljanje greškama i sl.)
Obezbediti aplikaciju od SQL injection-a
Potrebno je da sajt ima jedinstven dizajn uz poželjno korišćenje CSS-a
Primeniti JavaScript na odgovarajući način
Za višu ocenu neophodno je obezbediti:

Dobar i konzistentan dizajn
Upotreba HTML5, CSS3 i naprednih JQuery funkcionalnosti
Kvalitetan i jedinstven dizajn aplikacije (CSS)
Na adekvatan način upotrebiti JavaScript tehnologiju i primeniti jQuery funkcionalnosti
Upotreba nekog JQuery frameworka za ulepšavanje dizajna sajta i povećanje stepena interaktivnosti (npr. JQueryUI)
Za kreiranje frontend dela je poželjno korišćenje nekog CSS framework-a (npr. Twitter Bootstrap)
Poštovanje osnovnih principa razvoja web aplikacija
Neophodno je postojanje najmanje 4 međusobno povezane tabele (koristiti JOIN)
Razvoj aplikacije korišćenjem MVC paterna (moguće je korišćenje aktuelnih verzija gotovih frejmvorka, kao što su Symfony, Laravel, Django, Ruby on Rails i drugih, ali nije dozvoljeno korišćenje frejmvorka koji se više ne razvijaju ili starijih verzija aktuelnih frejmvorka)
Različite funkcionalnosti za različite uloge korisnika u aplikaciji
Naprednije funkcionalnosti (upravljanje uploadom fajlova, paginacija, kupovna korpa, obrada porudžbina, upravljanje mailovima, generisanje PDF fajlova, napredne JQuery funkcionalnosti i sl.)
Obezbediti sigurnost aplikacije po više kriterijuma
Napredna manipulacija podacima iz baze u skladu sa tematikom sajta (prikaz podataka u backend delu korišćenjem neke JQuery tabele, kao što je JQGrid ili DataTables)
Vizualizacija podataka u skladu sa tematikom sajta (npr. analiza prodaje po mesecima, grafički prikaz raznih statistika i slično) ili korišćenje Google Maps v3 JavaScript API-a uz naprednije podešavanje mape i dodavanje sopstvenih objekata i lejera. Ukoliko se primenjuje vizuelizacija, može se koristiti bilo koji API za vizuelizaciju (npr. Google Chart)
Rad sa web servisima
Sopstveni web servis (REST API) treba da bude kreiran da bez modifikacija bilo koji klijent može da koristi ovaj servis (npr. mobilni uređaji)
Sopstveni REST web servis treba da sadrži najmanje 4 različite funkcije. Treba da se koriste različite metode (POST, GET, PUT, DELETE) za slanje zahteva. Ukoliko funkcija vraća podatke, trebalo bi obezbediti da ista funkcija vraća različite formate tih podataka (XML,JSON…) u zavisnosti od dobijenog zahteva. Funkcija bi trebalo da prepozna Content-Type header zahteva ili odgovarajuću rutu zahteva i na osnovu toga da generiše odgovarajući format podataka. Trebalo bi koristiti RESTful principe razvoja servisa (odgovarajuće rute, nepostojanje stanja i slično). Dozvoljeno je korišćenje framework-a za kreiranje REST servisa.
Poziv najmanje jednog sopstvenog web servisa
Poziv najmanje dva javna REST web servisa (za poziv jednog servisa treba koristiti JQuery AJAX klijenta, a za poziv drugog servisa klijenta skriptnog jezika serverske strane (PHP ili druga serverska tehnologija)). Potrebno je da izbor javnih REST web servisa odgovara tematici sajta. Na primer, ukoliko je tema sajta Izrada elektronske prodavnice i članovi tima odaberu web servis konvertor valute, za najvišu ocenu nije dovoljno implementirati poziv konvertora valute u vidu forme sa poljima za unos iznosa i valute koja se konvertuje, već bi trebalo obezbediti prikaz combo box-a sa spiskom različitih valuta i prilikom izbora valute konvertovati cene svih proizvoda u aplikaciji.
Obezbediti adekvatnu manipulaciju XML-om i/ili JSON-om
