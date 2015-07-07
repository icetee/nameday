<?php
/**
* Nevnapok - PHP Hungarian Namedays.
*
* This program can be used to query the Hungarian name days.
* Works well with leap years.
* 
* The current nameday can be queried with these codes:
* $nevnap = new Nevnap();
* $nevnap->getNamedays();
*
* @author Tamás András Horváth <htomy92@gmail.com>
* @license The MIT License (MIT)
* @link http://icetee.hu
* @version 2014 Stable
* @since version 1.1.2
*/

/* Hungarian months */
setlocale(LC_ALL, 'hu');

/* Add Namedays */
require_once 'nevnap-list.php';

class Nevnap {

	private $_year;
	private $_months;
	private $_days;
	private $_lang;
	private $_leap;

	/* Current year/month/day and language */
	function __construct() {

		$this->_year = date("Y");
		$this->_months = utf8_encode(ucfirst(strtolower(strftime("%B"))));
		$this->_days = date("j");
		$this->_lang = "hu_HU";
	}

	/*  @return 		'bool' true/false - leap year */
	public function leapYear() {

		if (($this->_year % 4 == 0) && ($this->_year % 100 != 0) || ($this->_year % 400 == 0)) {
			return true;
		} else {
			return false;
		}	
	}

	/*
	*
	*	Set method's
	*
	*/

	/*
	*	@restult 	language modifies
	*	@warning 	__construct() reset date!
	*/
	public function setLang($lang) {

		switch ($lang) {

			case "hu_HU":
			default:
				setlocale(LC_ALL, 'hu');
				$this->__construct();
				$this->_leap = "Szökőév";
				$this->_lang = "hu_HU";
				break;

			case "pl_PL":
				setlocale(LC_ALL, 'pl');
				$this->__construct();
				$this->_leap = "Rok przestępny";
				$this->_lang = "pl_PL";
				break;
		}
	}

	/*
	*
	* @param 		'string' $date input YYYY-MM-DD format
	* @result 		modifies the global variables.
	*
	*/
	public function setDate($date) {

		$_date = date_create($date);

		$this->_year = date_format($_date, "Y");
		$this->_months = utf8_encode(ucfirst(strtolower(strftime("%B", $_date->getTimestamp()))));
		$this->_days = date_format($_date, "j");
	}

	public function setNamedays($lang, $date) {

		$this->setLang($lang);
		$this->setDate($date);
	}

	/*
	*
	*	Get method's
	*
	*/

	/* @retrun 		February (leep_month) multilanguage */
	public function getLeapMonth() {

		return array_keys(NevnapLista::nevNapok($this->_lang))[1];
	}

	/* @return 	global variables */
	public function getDate() {
		print $this->_year . ". " . $this->_months . " " . $this->_days . ".";
	}

	/*
	* @param 		$limit = get element limits
	* @result 		write name days
	* @funcition	leap year exam
	*
	*/
	public function getNowNameday($limit = 3, $addDay = 0){

		$return = array();

		if ($this->leapYear() == true && $this->_months == $this->getLeapMonth() && $this->_lang == "hu_HU") {
			if ($this->_days == 25 || $this->_days == 26 || $this->_days == 27 || $this->_days == 28 || $this->_days == 29) {
				$this->_days--;
			}
		}

		if ($this->leapYear() == true && $this->_months == $this->getLeapMonth() && $this->_days == 24 && $this->_lang == "hu_HU") { echo "(".$this->_leap.")"; } else {

			foreach (NevnapLista::nevNapok($this->_lang)[$this->_months][$this->_days-1+$addDay] as $key => $nevek) {
				$return[] = $nevek;

				if ($key == ($limit-1) && $limit != 0) {
					break;
				}
			}
		}

		return $return;
	}

	/*
	*
	* @param 		$limit = show element limits, $prefix = comma_fix, $suffix = place a comma,
	*				$before = add extra character befor name days, $after = add extra character after name days
	* @result		write name days
	*
	*/
	public function getNamedays($limit = 3, $addDay = 0, $prefix = '', $suffix = ', ', $before = '', $after = '') {

		$return = '';

		foreach ($this->getNowNameday($limit, $addDay) as $nevek) {
			$return .= $prefix . $before . $nevek . $after;
			$prefix = $suffix;
		}

		print $return;
	}

	/* @result 		write all name days (table-format) */
	public function getFullNevnap() {
		$prefix = '';
		$return = '';

		foreach (NevnapLista::nevNapok($this->_lang) as $keys => $honap) {
			print "<div style='display:inline-table;'>";
			print "<h3>".$keys."</h3>";
			
			foreach ($honap as $keys => $nap) {
				print "<b> ".($keys+1)." - </b>";
				foreach ($nap as $nevek) {
					$return .= $prefix . $nevek;
					$prefix = ', ';
				}

				print $return."<br>";
				/* Clear */
				$prefix = '';
				$return = '';
			}
			print "</div>";
		}
	}
}

?>