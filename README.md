# Hudobná knižnica a správa playlistov

Tomáš Sobek

Študijná skupina: 5ZYI33

## Stručný opis projektu
Projekt je webová aplikácia slúžiaca ako osobná hudobná knižnica na organizáciu a prehrávanie hudby. Rieši problém neprehľadnej správy vlastných audio súborov a poskytuje používateľom prehľadné rozhranie pre kategorizáciu skladieb, tvorbu vlastných zoznamov skladieb (playlistov) a ich hodnotenie. 

Aplikácia je určená pre bežných poslucháčov aj nadšencov, ktorí si chcú prehľadne organizovať svoju hudobnú zbierku, objavovať nové skladby a nahrávať vlastné audio súbory na jedno miesto.

## Role v projekte
* **Návštevník:** Neregistrovaný používateľ, ktorý môže prehliadať verejný katalóg skladieb, albumov a vyhľadávať v ňom.
* **Registrovaný používateľ:** Má prístup k vytváraniu a správe vlastných playlistov, nahrávaniu audio súborov na server a hodnoteniu skladieb.
* **Správca:** Administrátor systému, ktorý dohliada na obsah, spravuje kategórie a používateľské účty.

## Prípady použitia podľa rolí

### Návštevník
* Vyhľadávanie a filtrovanie skladieb v katalógu podľa žánru alebo názvu.
* Zobrazenie detailu skladby a jej prehratie.

### Registrovaný používateľ
* Prihlásenie a registrácia do systému.
* Nahrávanie nových skladieb (audio súboru a obalu) a ich úprava alebo vymazanie.
* Vytváranie, úprava a mazanie vlastných playlistov.
* Pridávanie a odoberanie skladieb z playlistu.
* Pridávanie hodnotení a komentárov ku skladbám.

### Správca
* Správa používateľských účtov.
* Moderovanie obsahu (odstránenie nevhodných skladieb alebo komentárov).

## Plánované entity
* **Používateľ:** Reprezentuje používateľský účet v systéme. Obsahuje najmä prihlasovacie údaje (meno, email, zašifrované heslo) a rolu používateľa.
* **Skladba:** Reprezentuje audio súbor v systéme. Obsahuje najmä názov, cestu k súboru, obal a informácie o autorovi.
* **Playlist:** Zoznam skladieb vytvorený používateľom.
* **Album:** Zoskupenie viacerých skladieb pod jeden celok.
* **Hodnotenie:** Hodnotenie alebo komentár priradený ku skladbe od používateľa.

## Vzťahy medzi entitami
* **Používateľ – Skladba (1:N):** Používateľ môže nahrať viacero skladieb.
* **Používateľ – Playlist (1:N):** Používateľ môže vytvoriť viacero playlistov.
* **Používateľ – Hodnotenie (1:N):** Používateľ môže pridať viacero hodnotení.
* **Album – Skladba (1:N):** Album obsahuje viacero skladieb.
* **Playlist – Skladba (M:N):** Playlist môže obsahovať viacero skladieb a jedna skladba môže byť vo viacerých playlistoch.
* **Skladba – Hodnotenie (1:N):** Skladba môže mať viacero hodnotení.

## Hlavné stránky aplikácie
* **Katalóg skladieb:** Hlavná stránka s prehľadom a vyhľadávaním hudby.
* **Detail skladby:** Stránka s informáciami o skladbe, hodnoteniami a (možno) prehrávačom.
* **Prehľad playlistov:** Zoznam používateľských playlistov s možnosťou vytvorenia nového.
* **Detail playlistu:** Zobrazenie a úprava konkrétneho playlistu a jeho skladieb.
* **Správa vlastnej hudby:** Stránka na nahrávanie nových audio súborov a správu nahraného obsahu.

## Rozdelenie funkcionality

### Základné funkcie
* Registrácia, prihlásenie a autorizácia používateľov podľa rolí.
* Správa skladieb a playlistov.
* Nahrávanie audio súborov a obrázkov na server.
* Vyhľadávanie a filtrovanie skladieb.
* Zobrazenie obsahu na mobilných aj desktopových zariadeniach.

### Rozširujúce funkcie
* Interaktívny prehrávač hudby.
* Pridávanie hodnotení a filtrovanie bez opätovného načítania stránky.
* Pokročilá klientska validácia formulárov.