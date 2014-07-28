<?php
/**
* Nevnapok - PHP Hungarian Namedays.
*
* This program can be used to query the Hungarian name days.
* Works well with leap years.
* 
* The current nameday can be queried with these codes:
* $nevnap = new Nevnap();
* $nevnap->getNevnap();
*
* @author Tamás András Horváth <htomy92@gmail.com>
* @license The MIT License (MIT)
* @link http://icetee.hu
* @version 2014 Stable
* @since version 1.0.1
*/

/* Hungarian months */
setlocale(LC_ALL, 'hungarian');

class Nevnap {

	private $_year;
	private $_months;
	private $_days;

	/*
	* Creates a current Date.
	* @constructor 
	*/ 
	function __construct() {

		/* Current year/month/day */
		$this->_year = date("Y");
		$this->_months = utf8_encode(ucfirst(strtolower(strftime("%B"))));
		$this->_days = date("j");
	}
	/*
	*
	* @function data storage
	* @return name day array
	*
	*/
	function nevNapok() {

		return array(
		 	"Január"		=>	array(
		 		array("Alpár", "Fruzsina", "Bazil"),
		 		array("Ábel", "Gergely", "Vazul"),
		 		array("Genovéva", "Gyöngyvér", "Benjámin", "Dzsenifer"),
		 		array("Titusz", "Leona", "Angéla"),
				array("Simon", "Emília"),
				array("Gáspár", "Menyhért", "Boldizsár"),
				array("Attila", "Ramóna", "Rajmund", "Bálint"),
				array("Gyöngyvér", "Szeverin", "Szörény"),
				array("Marcell", "Juliánusz"),
				array("Melánia", "Vilmos", "Vilma"),
				array("Ágota", "Honoráta"),
				array("Ernő", "Erneszta", "Tatjána"),
				array("Veronika", "Csongor", "Yvett"),
				array("Bódog", "Félix"),
				array("Lóránt", "Loránd", "Pál"),
				array("Gusztáv", "Marcell"),
				array("Antal", "Antónia"),
				array("Margit", "Piroska"),
				array("Sára", "Márta", "Márió"),
				array("Fábián", "Sebestyén"),
				array("Ágnes", "Agnéta"),
				array("Vince", "Artúr"),
				array("Zelma", "Rajmund", "Emerencia", "Emese"),
				array("Timót", "Ferenc"),
				array("Pál", "Henrik"),
				array("Vanda", "Paula", "Timóteusz"),
				array("Angéla", "Angelika"),
				array("Károly", "Karola", "Tamás"),
				array("Adél", "Valér"),
				array("Martina", "Gerda", "Jácinta"),
				array("Marcella", "János")
			),
			"Február"		=>	array(
				array("Ignác", "Brigitta", "Kincső"),
				array("Karolina", "Karola", "Aida"),
				array("Balázs", "Oszkár", "Celerina"),
				array("Ráhel", "Csenge", "Veronika", "András"),
				array("Ágota", "Ingrid", "Etelka", "Léda"),
				array("Dorottya", "Dóra", "Pál"),
				array("Tódor", "Rómeó", "Richárd"),
				array("Aranka", "Jeromos"),
				array("Abigél", "Alex", "Apollónia"),
				array("Elvira"),
				array("Bertold", "Marietta"),
				array("Lívia", "Lídia", "Eulália"),
				array("Ella", "Linda", "Levente", "Katalin"),
				array("Bálint", "Valentin", "Cirill", "Metód"),
				array("Kolos", "Györgyi", "Georgina"),
				array("Julianna", "Lilla", "Filippa"),
				array("Donát"),
				array("Bernadett", "Simon", "Zenkő"),
				array("Zsuzsanna", "Eliza", "Konrád"),
				array("Aladár", "Álmos", "Leó"),
				array("Eleonóra", "Zelmira", "Péter"),
				array("Gerzson", "Margit", "Zétény"),
				array("Alfréd", "Polikárp", "Mirtill"),
				/* Szökőév */
				array("Mátyás", "Jázmin"),
				array("Géza", "Cézár", "Vanda"),
				array("Edina", "Viktor", "Győző"),
				array("Ákos", "Bátor", "Gábor"),
				array("Elemér", "Oszvald", "Román")
				),
			"Március"		=>	array(
				array("Albin", "Albina", "Leonita", "Lea"),
				array("Lujza", "Ágnes", "Henrik", "Magor"),
				array("Kornélia", "Kunigunda", "Frigyes"),
				array("Kázmér", "Lúciusz", "Zorán"),
				array("Adorján", "Adrián"),
				array("Leonóra", "Inez", "Koletta"),
				array("Tamás", "Perpétua", "Felicitász"),
				array("János", "Zoltán", "Apolka"),
				array("Franciska", "Fanni"),
				array("Ildikó", "Emil", "Gusztáv"),
				array("Szilárd", "Tímea", "Konstantin"),
				array("Gergely", "Maximilián"),
				array("Krisztián", "Ajtony", "Egyed", "Patrícia"),
				array("Matild", "Matilda", "Trilla"),
				array("Kristóf", "Kelemen"),
				array("Henrietta", "Herbert"),
				array("Gertrúd", "Patrik"),
				array("Sándor", "Ede", "Cirill"),
				array("József", "Bánk"),
				array("Klaudia", "Alexandra"),
				array("Benedek", "Bence", "Miklós"),
				array("Beáta", "Izolda", "Lea"),
				array("Emőke", "Botond", "Ottó", "Kartal"),
				array("Gábor", "Karina"),
				array("Irén", "Írisz", "Lúcia"),
				array("Emánuel", "Emánuéla", "Larissza", "Árpád"),
				array("Hajnalka", "Lídia", "Auguszta"),
				array("Gedeon", "Johanna"),
				array("Auguszta", "Bertold"),
				array("Zalán"),
				array("Árpád", "Benjámin", "Benő")
				),
			"Április"		=>	array(
				array("Hugó", "Agád"),
				array("Áron", "Ferenc"),
				array("Buda", "Richárd", "Hóvirág", "Indira"),
				array("Izidor"),
				array("Vince", "Irén", "Teodóra"),
				array("Vilmos", "Bíborka", "Taksony", "Celesztin"),
				array("Herman", "János"),
				array("Dénes", "Valér", "Valter"),
				array("Erhard", "Ákos", "Döme"),
				array("Zsolt", "Ezékiel"),
				array("Leó", "Szaniszló", "Glória"),
				array("Gyula", "Baldvin", "Sába"),
				array("Ida", "Márton", "Hermina"),
				array("Tibor"),
				array("Anasztázia", "Tas", "Oktávia"),
				array("Csongor", "Bernadett"),
				array("Rudolf", "Izidóra"),
				array("Andrea", "Ilma", "Apolló", "Aladár"),
				array("Emma", "Malvin", "Zseraldina"),
				array("Tivadar", "Tihamér", "Töhötöm"),
				array("Konrád", "Zelmira", "Anzelm"),
				array("Csilla", "Noémi", "Kájusz"),
				array("Béla", "Adalbert"),
				array("György", "Fidél", "Debóra"),
				array("Márk", "Ányos"),
				array("Ervin", "Klétusz"),
				array("Zita", "Mariann", "Anasztáz"),
				array("Valéria", "Péter"),
				array("Péter", "Katalin", "Roberta"),
				array("Katalin", "Kitti", "Zsófia", "Piusz")
			),
			"Május"			=>	array(    
			    array("Fülöp", "Jakab", "Zsaklin", "Jefte", "József"),
			    array("Zsigmond", "Atanáz", "Zoé"),
			    array("Tímea", "Irma", "Jakab", "Fülöp"),
			    array("Mónika", "Flórián"),
			    array("Györgyi", "Irén"),
			    array("Ivett", "Frida", "Judit", "Yvett"),
			    array("Gizella", "Gusztáv", "Bendegúz"),
			    array("Mihály", "Győző"),
			    array("Gergely", "Katinka", "Alberta", "Édua"),
			    array("Ármin", "Pálma", "Izidor"),
			    array("Ferenc"),
			    array("Pongrác"),
			    array("Szervác", "Imola", "Imelda"),
			    array("Bonifác", "Gyöngyi"),
			    array("Zsófia", "Szonja", "Döníz"),
			    array("Mózes", "Botond", "János"),
			    array("Paszkál", "Ditmár", "Rezeda"),
			    array("Erik", "Alexandra", "János"),
			    array("Ivó", "Iván", "Milán"),
			    array("Bernát", "Bernardin", "Felícia"),
			    array("Konstantin", "András"),
			    array("Júlia", "Rita", "Emil"),
			    array("Dezső", "Vilmos", "Renáta"),
			    array("Eszter", "Eliza", "Vanessza"),
			    array("Orbán", "Gergely"),
			    array("Fülöp", "Evelin"),
			    array("Hella", "Pelbárt", "Ágoston"),
			    array("Emil", "Csanád", "Vilmos"),
			    array("Magdolna", "Magda", "Ervin", "Léna"),
			    array("Janka", "Zsanett", "Johanna", "Nándor"),
			    array("Angéla", "Petronella")
			),
			"Június"		=>	array(    
			    array("Tünde", "Jusztinusz"),
			    array("Kármen", "Anita", "Péter", "Marcellinusz"),
			    array("Klotild", "Cecília", "Károly"),
			    array("Bulcsú", "Kerény", "Kerubin"),
			    array("Fatime", "Fatima", "Bonifác"),
			    array("Norbert", "Norberta", "Cintia"),
			    array("Róbert", "Robertina", "Arianna", "Fülöp", "Roberta"),
			    array("Medárd", "Helga"),
			    array("Félix", "Előd", "Annamária", "Annabella"),
			    array("Margit", "Gréta"),
			    array("Barnabás"),
			    array("Villő", "Orfeusz", "Adelaida"),
			    array("Antal", "Anett"),
			    array("Vazul", "Elizeus", "Herta"),
			    array("Jolán", "Vid", "Viola"),
			    array("Jusztin", "Jusztina", "Auréliusz"),
			    array("Laura", "Alida", "Alina", "Szabolcs", "Adolf", "Bató"),
			    array("Arnold", "Levente", "Doloróza"),
			    array("Gyárfás", "Romuald"),
			    array("Rafael", "Dina"),
			    array("Alajos", "Leila"),
			    array("Paulina", "Tamás"),
			    array("Zoltán", "Szultána"),
			    array("János", "Iván"),
			    array("Vilmos", "Viola", "Vilma"),
			    array("János", "Pál", "Cirill"),
			    array("László", "Sámson"),
			    array("Levente", "Irén", "Iréneusz"),
			    array("Péter", "Pál","Emőke", "Judit", "Petra", "Szulamit", "Ivett"),
			    array("Pál")
			),
			"Július"		=>	array(
				array("Tihamér", "Annamária", "Olivér", "Áron"),
				array("Ottó"),
				array("Kornél", "Soma", "Tamás"),
				array("Ulrik", "Erzsébet"),
				array("Emese", "Sarolta", "Lotti", "Antal"),
				array("Csaba", "Mária"),
				array("Apollónia", "Vilibald", "Bene"),
				array("Ellák", "Edgár", "Eperke"),
				array("Lukrécia", "Veronika", "Hajnalka"),
				array("Amália", "Melina", "Engelbert", "Ulrika"),
				array("Nóra", "Lili", "Nelli", "Benedek"),
				array("Izabella", "Dalma", "Eleonóra"),
				array("Jenő", "Henrik"),
				array("Örs", "Stella", "Kamil"),
				array("Örkény", "Henrik", "Roland", "Bonaventúra"),
				array("Valter", "Irma"),
				array("Endre", "Elek", "András"),
				array("Szömér", "Frigyes", "Milla", "Hedvig", "Mirkó"),
				array("Emília"),
				array("Illés", "Margaréta"),
				array("Dániel", "Daniella", "Lőrinc"),
				array("Magdolna", "Mária", "Magda"),
				array("Lenke", "Brigitta", "Apollinár"),
				array("Kinga", "Kunigunda", "Kincső", "Krisztina"),
				array("Kristóf", "Jakab"),
				array("Anna", "Anikó", "Joakim"),
				array("Olga", "Liliána", "Natália", "Pantaleon"),
				array("Szabolcs", "Alina", "Ince", "Győző"),
				array("Márta", "Flóra"),
				array("Judit", "Xénia", "Péter"),
				array("Oszkár", "Ignác", "Bató")
			),
			"Augusztus"		=>	array(
				array("Boglárka", "Nimród", "Alfonz"),
				array("Lehel"),
				array("Hermina", "Lídia", "Kamélia", "Mirtill"),
				array("Domonkos", "Dominik", "János", "Dominika"),
				array("Krisztina"),
				array("Berta", "Bettina"),
				array("Ibolya"),
				array("László", "Domonkos"),
				array("Emőd", "Román"),
				array("Lőrinc", "Blanka", "Csilla"),
				array("Zsuzsanna", "Tiborc", "Klára"),
				array("Klára", "Hilária", "Diána"),
				array("Ipoly", "Ince", "Vitália"),
				array("Marcell", "Maximilián"),
				array("Mária"),
				array("Ábrahám", "Rókus"),
				array("Jácint", "Réka", "Hetény"),
				array("Ilona", "Rajnald"),
				array("Huba", "Marián", "Emília"),
				array("István", "Bernát"),
				array("Sámuel", "Hajna", "Piusz"),
				array("Menyhért", "Mirjam"),
				array("Bence", "Róza", "Szidónia"),
				array("Bertalan", "Aliz", "Detre"),
				array("Lajos", "Patrícia"),
				array("Izsó", "Tália", "Natália", "Zamfira"),
				array("Gáspár", "Mónika"),
				array("Ágoston", "Mózes"),
				array("Beatrix", "Erna"),
				array("Rózsa", "Félix", "Letícia"),
				array("Erika", "Bella", "Arisztid")
			),
			"Szeptember"	=>	array(
				array("Egyed", "Egon", "Noémi", "Tamara"),
				array("Rebeka", "Dorina", "Renáta", "Ingrid", "István"),
				array("Hilda", "Gergely"),
				array("Rozália", "Róza", "Ida"),
				array("Viktor", "Lőrinc", "Ofélia"),
				array("Zakariás", "Beáta"),
				array("Regina"),
				array("Mária", "Adrienn"),
				array("Ádám", "Péter"),
				array("Nikolett", "Hunor", "Miklós"),
				array("Teodóra", "Jácint", "Igor", "Helga"),
				array("Mária", "Irma"),
				array("Kornél", "János"),
				array("Szeréna", "Roxána"),
				array("Enikő", "Melitta"),
				array("Edit", "Ciprián"),
				array("Zsófia", "Róbert"),
				array("Diána", "József"),
				array("Vilhelmina", "Januáriusz", "Dorián"),
				array("Friderika"),
				array("Máté", "Mirella", "Jónás"),
				array("Móric", "Tamás"),
				array("Tekla", "Líviusz", "Ila"),
				array("Gellért", "Gerda", "Mercédesz"),
				array("Eufrozina", "Kende"),
				array("Jusztina", "Kozma", "Damján"),
				array("Adalbert", "Vince"),
				array("Vencel", "Salamon"),
				array("Mihály", "Gábor", "Rafael", "Mirabella"),
				array("Jeromos", "Honória", "Hunor")
			),
			"Október"		=>	array(
				array("Malvin", "Teréz"),
				array("Petra", "Örs"),
				array("Helga", "Évald"),
				array("Ferenc", "Hajnalka"),
				array("Aurél", "Placid", "Attila", "Rella"),
				array("Brúnó", "Renáta", "Renátó"),
				array("Amália", "Bekény"),
				array("Koppány", "Benedikta"),
				array("Dénes", "János"),
				array("Gedeon", "Ferenc", "Bendegúz"),
				array("Brigitta", "Placida", "Etel", "Gitta"),
				array("Miksa", "Rezső", "Edvin"),
				array("Kálmán", "Ede", "Edvárd"),
				array("Helén", "Kaldixtusz"),
				array("Teréz", "Aranka"),
				array("Gál", "Margit", "Hedvig"),
				array("Hedvig", "Ignác", "Rudolf"),
				array("Lukács", "Jusztusz"),
				array("Nándor", "János", "Pál"),
				array("Vendel", "Irén", "Kleopátra"),
				array("Orsolya", "Zsolt"),
				array("Előd", "Szalóme", "Kordélia"),
				array("Gyöngyvér", "János", "Gyöngyi"),
				array("Salamon", "Antal"),
				array("Blanka", "Bianka", "Mór"),
				array("Dömötör", "Armand", "Örs"),
				array("Szabina", "Antonietta"),
				array("Simon", "Szimonetta", "Szimóna", "Júdás", "Tádé"),
				array("Nárcisz", "Melinda", "Őzike"),
				array("Alfonz", "Zenóbia"),
				array("Farkas", "Rodrigó", "Wolfgang")
			),
			"November"		=>	array(
				array("Marianna"),
			    array("Achilles", "Bató"),
			    array("Győző", "Márton"),
			    array("Károly", "Karola"),
			    array("Imre", "Zakariás", "Tétény"),
			    array("Lénárd", "Krisztina"),
			    array("Csenger", "Rezső", "Ernő", "Florentin"),
			    array("Zsombor", "Kolos", "Gottfrid"),
			    array("Tivadar"),
			    array("Réka", "András", "Leó"),
			    array("Márton", "Atád", "Tódor"),
			    array("Jónás", "Renátó", "Jozafát"),
			    array("Szilvia", "Szaniszló"),
			    array("Aliz", "Vanda", "Huba", "Klementina"),
			    array("Albert", "Lipót"),
			    array("Ödön", "Margit"),
			    array("Hortenzia", "Gergő", "Dénes"),
			    array("Jenő"),
			    array("Erzsébet", "Zsóka"),
			    array("Jolán", "Zsolt", "Ödön", "Bódog"),
			    array("Olivér"),
			    array("Cecília", "Filemon"),
			    array("Kelemen", "Klementina", "Kolumbán"),
			    array("Emma", "Flóra", "Virág"),
			    array("Katalin", "Liza", "Katinka"),
			    array("Virág", "Szvetlana", "Konrád", "Viktória", "Milos"),
			    array("Virgil", "Virgínia"),
			    array("Stefánia", "Jakab"),
			    array("Taksony", "Ilma", "Filoména"),
			    array("András", "Andor", "Andrea")
			),
			"December"		=>	array(
				array("Elza", "Natália", "Blanka", "Bonita"),
			    array("Melinda", "Vivien", "Aranka"),
			    array("Ferenc", "Olívia"),
			    array("Borbála", "Barbara", "János"),
			    array("Vilma", "Ünige", "Csaba"),
			    array("Miklós", "Csinszka", "Gyopár", "Gyopárka"),
			    array("Ambrus", "Ambrózia"),
				array("Mária", "Emőke"),
			    array("Natália", "Valéria", "Filótea"),
			    array("Judit", "Loretta", "Eulália"),
			    array("Árpád", "Árpádina", "Damazusz"),
			    array("Gabriella", "Johanna", "Franciska"),
			    array("Luca", "Otília", "Lúcia", "Éda", "Tilia"),
			    array("Szilárda", "Szilárd", "János"),
			    array("Valér", "Detre"),
			    array("Etelka", "Aletta", "Adelaida"),
			    array("Lázár", "Olimpia"),
			    array("Auguszta", "Gracián"),
			    array("Viola", "Anasztáz"),
			    array("Teofil", "Liberátusz"),
			    array("Tamás", "Péter"),
			    array("Zénó", "Flórián"),
			    array("Viktória", "János"),
			    array("Ádám", "Éva", "Adél"),
			    array("Eugénia", "Anasztázia"),
			    array("István"),
			    array("János", "Teodor"),
			    array("Kamilla", "Apor"),
			    array("Tamás", "Tamara"),
			    array("Dávid", "Hunor", "Libériusz"),
			    array("Szilveszter", "Donáta")
			)
		);
	}

	/*
	*
	* @return 		'bool' true/false - leap year
	*
	*/
	public function szokoEv() {

		if (($this->_year % 4 == 0) && ($this->_year % 100 != 0) || ($this->_year % 400 == 0)) {
			return true;
		} else {
			return false;
		}	
	}

	/*
	*
	* @param 		'string' $date input YYYY-MM-DD format
	* @result 		modifies the global variables.
	*
	*/
	public function reDate($date) {

		$_date = date_create($date);

		$this->_year = date_format($_date, "Y");
		$this->_months = utf8_encode(ucfirst(strtolower(strftime("%B", $_date->getTimestamp()))));
		$this->_days = date_format($_date, "j");
	}

	/*
	*
	* @return 	global variables
	*
	*/
	public function getDate() {
		return $this->_year . ". " . $this->_months . " " . $this->_days . ".";
	}

	/*
	* @param 		$limit = get element limits
	* @result 		write name days
	* @funcition	leap year exam
	*
	*/
	public function getNowNevnap($limit = 3){

		$return = array();

		if ($this->szokoEv() == true && $this->_months == "Február") {
			if ($this->_days == 25 || $this->_days == 26 || $this->_days == 27 || $this->_days == 28 || $this->_days == 29) {
				$this->_days--;
			}
		}

		if ($this->szokoEv() == true && $this->_months == "Február" && $this->_days == 24) { echo "(Szökőév)"; } else {

			foreach ($this->nevNapok()[$this->_months][$this->_days-1] as $key => $nevek) {
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
	public function getNevnap($limit = 3, $prefix = '', $suffix = ', ', $before = '', $after = '') {

		$return = '';

		foreach ($this->getNowNevnap($limit) as $nevek) {
			$return .= $prefix . $before . $nevek . $after;
			$prefix = $suffix;
		}

		print $return;
	}

	/*
	*
	* @result 		write all name days (table-format)
	*
	*/
	public function getFullNevnap() {
		$prefix = '';
		$return = '';

    	foreach ($this->nevNapok() as $keys => $honap) {
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