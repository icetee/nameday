<?php
require_once 'nevnap-class.php';

/*
*  Creates a new Nevnap.
*  @class Represents a name days. 
*/
$nevnap = new Nevnap();

/* Set other language */
$nevnap->setLang('pl_PL');

/* Get current Date */
print $nevnap->getDate();
print "<br>";

/* Get current Namedays - limit 3 (default) */
$nevnap->getNamedays(3);
print "<br>";

$nevnap->setLang('hu_HU');

/*
*	New query - (leap year)
*/

/* Add new date */
$nevnap->setDate("2016-02-24");
print "<br>";

print $nevnap->getDate();
print "<br>";
$nevnap->getNamedays();

print "<br><br>";

/* Set language and date */
$nevnap->setNamedays("pl_PL", "2016-02-24");
$nevnap->getDate();
print "<br>";

/* Tomorrow (limit, addDay) */
$nevnap->getNamedays(0, 1);

print "<br>";

/* Yesterday */
$nevnap->getNamedays(0, -1);
?>