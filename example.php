<?php
require_once 'nevnap-class.php';

/*
*  Creates a new Nevnap.
*  @class Represents a name days. 
*/
$nevnap = new Nevnap();

/* Get current Date */
print $nevnap->getDate();
print "<br>";

/* Get current Namedays - limit 3 (default) */
$nevnap->getNevnap(3);
print "<br>";

/* Add new date */
$nevnap->reDate("2016-02-24");
print "<br>";

/*
*	New query - (leap year)
*/
print $nevnap->getDate();
print "<br>";
$nevnap->getNevnap();

print "<br>";

/* Get Namedays list */
//$nevnap->getFullNevnap();

?>