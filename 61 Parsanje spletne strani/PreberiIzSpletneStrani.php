#!/usr/local/bin/php
<?php
// Osnovni skelet za izdelavo Maintenance skript (CLI) za DWM Aplikacijo
	//require("/www/BuilderV5/DEBUG.php") ;
	define("DEBUG",TRUE) ;

	define("VSTOPNASTRAN",TRUE) ;
	define("LOG_FILE","/www/EML.log") ;

	ini_set ("error_reporting",15) ;
	ini_set ("log_errors",1) ;
	ini_set ("error_log","/www/CLI-DWM-PHP-ERRORS.log") ;

	$BuilderVerzija = "BuilderV5" ;

	// Funkcije, ki so potrebne za delovanje CLI skript
	require_once("/www/".$BuilderVerzija."/www/MainInclude/CLIFunctions.php") ;

	// Preberemo nastavitve
	$BazePodatkov = parse_ini_file ("/www/".$BuilderVerzija."/ReminderBaze.ini",TRUE) ;

	// Ali imamo podan argument, ki določa bazo podatkov ?
	if ($argc != 2) {
		// Help, ki se izpiše ob napačnem številu parametrov
?>
		Skripta sparsa vse članke it spletne strani

		Uporaba:
		<?=$argv[0]?> DWMAPPName JournalEntryId

		DWMAPPName - Ime aplikacije, nad katero poganjamo trenutno skripto.
		To ime mora biti prisotno kot SECTION NAME v konfiguracijski datoteki /www/Builder/ReminderBaze.ini
<?php
		die() ;
	}

	// Označimo začetek izvajanja CLI skripte
	UserLog("START (".$argv[0].")") ;

	// Glede na aplikacijo nastavimo osnovne direktorije
	define("PGSQLHOST",$BazePodatkov[$argv[1]]["host"]) ;				// Ime PostgreSQL strežnika
	define("PGDBASE",$BazePodatkov[$argv[1]]["dbase"]) ;				// Ime PostgreSQL baze podatkov
	define("HOMEDIR",$BazePodatkov[$argv[1]]["wwwdir"]) ;
	define("DOCUMENTROOT",$BazePodatkov[$argv[1]]["wwwdir"]."/www") ;

	// Ali imamo določeno posebno uporabniško ime in geslo v konfiguracijski datoteki ?
	(isset($BazePodatkov[$argv[1]]["DBUser"])) ? $DBUname = $BazePodatkov[$argv[1]]["DBUser"] : $DBUname = "CRMinMA" ;
	(isset($BazePodatkov[$argv[1]]["DBPass"])) ? $DBPassw = $BazePodatkov[$argv[1]]["DBPass"] : $DBPassw = "Tajepamocanuser" ;

	// Povezava na bazo podatkov - če obstaja
	$PgDbase = pg_connect("host=".PGSQLHOST." dbname=".PGDBASE." user=".$DBUname." password=".$DBPassw)
				or FError("1.0","1.0 - Nisem se uspel povezati na bazo podatkov !");

	// Inkludamo potrebne funkcije iz Builderja
	require_once ("/www/".$BuilderVerzija."/CLIRepairSkripte/CLIFunctions.php") ;
	require_once (HOMEDIR."/www/MainInclude/session_func.php") ;
	require_once (HOMEDIR."/www/MainInclude/Main_functions.php") ;
	require_once (HOMEDIR."/www/MainInclude/SSO_functions.php") ;
	require_once (HOMEDIR."/www/MainInclude/PIC_functions.php") ;
	require_once (HOMEDIR."/www/Search/Search_functions.php") ;

	// Začnemo transakcijo v bazi podatkov
	pg_query($PgDbase,"BEGIN WORK") ;
	$SqlSession = TRUE ;
	
	function dodajPodatek($tempArr) {
		// Tule sedaj z novim CURL-om potegnemoi vsebino hef-a, naredimo novo DOM drevo in sparsamo naslov, vprasanje in  odgovor
		
		$serverlink2 = $tempArr["href"];
		$ch2 = curl_init();
		curl_setopt($ch2, CURLOPT_URL, $serverlink2);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
		$store2 = curl_exec($ch2);
		
		$doc2 = new DOMDocument();
		$doc2->loadHTML($store2);
	
		$tgnames = $doc2->getElementsByTagName('table');
		
		foreach ($tgnames as $tgs) {
		
			switch ($tgs->getAttribute("class")) {
				case "contentpaneopen":
					$trres = $tgs->getElementsByTagName('tr');	
						$tempo= $tgs->firstChild->getAttribute("class");
						foreach ($trres as $tdd){
							$tddFind = $tdd->getElementsByTagName('td');
								foreach ($tddFind as $tddFind2){
									switch ($tddFind2->getAttribute("class")){
										case "contentheading":
											$title = trim($tddFind2->nodeValue);
											$tempArr["title"] = $title;	
										break;
									}		
								}										
						}	
				break;
			}						
		}
		
			$tggnames = $doc2->getElementsByTagName('table');
	foreach ($tggnames as $tggs){
				switch ($tggs->getAttribute("class")){
				case "contentpaneopen":
				$tgsTD = $tggs->getElementsByTagName('tr');
					foreach($tgsTD as $tgsTD2){
						$tempHTML = str_replace(array("&#13;","<tr><td valign=\"top\" colspan=\"2\">","</td>","</tr>"),array("\n","","",""),$tgsTD2->ownerDocument->saveXML( $tgsTD2 ));
						
						$exp = explode("<span class=\"article_seperator\"> </span><div class=\"contentheading\">Odgovor:</div>" ,$tempHTML);
						$tempArr["question"] = trim($exp[0]);
						$tempArr["answer"] = trim($exp[1]);
					}
				break;
				}		
	}	
	
		// Dodamo v zaključni array
		$GLOBALS["tagAttr"][$tempArr["id"]] = $tempArr ;
	}
	
  for($x=0; $x<=240; $x+=40){
  
	// Tukaj sedaj pride dejanska obdelava
	$ServerLnk = "http://www.atama.si/index.php?option=com_content&task=blogcategory&id=35&Itemid=131&limitca=40&limitstart=".$x;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $ServerLnk);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$store = curl_exec ($ch);
	
	
	$doc = new DOMDocument();
	$doc->loadHTML($store);
	$tagNames = $doc->getElementsByTagName('td');

	$tagAttr = array();

	
	foreach ($tagNames as $tags) {

		switch ($tags->getAttribute("class")) {
		
			case "contentheading" : 
				if (isset($tempArr)) {
					dodajPodatek($tempArr);
				}
				$tempArr = array(
					"id" => 0,
					"title" => "",
					"question" => "",
					"answer" => "",
					"date" => "",
					"href" => "",
				);
				$najdeniAji = $tags->getElementsByTagName('a');
				foreach ($najdeniAji as $prviA) {
					$tempArr["href"] = $prviA->getAttribute("href")."\n" ;
					$tempArr["id"] = trim(str_replace(array("http://www.atama.si/index.php?option=com_content&task=view&id=","&Itemid=131"),"",$tempArr["href"])) ;
					break ;
				}
				
				break ;
				
			case "createdate" :
				$tempArr["date"] = trim($tags->nodeValue) ;
				break ;
			
		}
}
		print_r($tagAttr);

	// Zaključimo transakcijo
	pg_query($PgDbase,"END WORK") ;

	// Zaključimo delo in zapremo LOG datoteko, če je odprta
	UserLog("DONE !") ;
	if (isset($fperror))
		fclose($fperror) ;
		
		
	// Lokalne funkcije
	
	}
		$fp = fopen('/home/primozp/results.json', 'w');
		fwrite($fp, json_encode($tagAttr));
		fclose($fp);
	;
	
?>