## Névnap ##

### Használat ###
Ahogy az example.php fájlban is megtalálható, egy új objektumot kell létrehozni, hogy hívatkozni lehessen az osztályra.

======

Ehhez először meg kell hívni az osztályt tartalmazó fájlt:

    require_once 'nevnap-class.php';


Majd csak ezútán lehet létrehozni az új objektumot:

    $nevnap = new Nevnap();

A jelenlegi dátum lekérdezés így lehetséges:

    print $nevnap->getDate();

A jelenlegi névnap kiírása pedig így történik:

    $nevnap->getNevnap();

Van lehetőség arra is, hogy ne az összes névnapos jelenjen meg, hanem csak korlátozott létszámban:

    $nevnap->getNevnap(3);

Amennyiben nem a mai névnaposokat akarjuk kiírni, akkor adjunk meg egy dátumot, majd a névnapok újra lekérdezésével frissülnek a névnapok.

    $nevnap->reDate("2016-02-24");
    $nevnap->getNevnap();