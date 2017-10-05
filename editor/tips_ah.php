<?php
//Constantes


function tipsPorId($pos,$id_usuario){
	$cor_linha_data = "#A9A954";
	$cor_linha_evento = "#DCDCB8";
	
	$xmlDoc = new DOMDocument();
	
	$ch = curl_init();
	
	//$id_usuario="74980";
	// informar URL e outras fun?es ao CURL
	curl_setopt($ch, CURLOPT_URL, "http://www.online-betting-guide.co.uk".$id_usuario);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1");
	
	$output = curl_exec($ch);
	curl_close($ch);
	
	//echo $output;
	
	
	@$xmlDoc->loadHTML($output);
	
	$xpath = new DOMXPath($xmlDoc);
	
	$linhas = $xmlDoc->getElementById('pcontent')->childNodes;
	//echo $linhas;
	
	$data_tip="";
	$evento_tip="";
	foreach($linhas as $linha){
		$td=$linha->childNodes->item(0);
		//echo $td->getAttribute('bgcolor');
		if($td->getAttribute('bgcolor')=="$cor_linha_data") $data_tip=$td->nodeValue;
		if($data_tip="19th December 2010"){
			if($td->getAttribute('bgcolor')=="$cor_linha_evento") $evento_tip=$td->nodeValue;
			//echo $td->nodeValue."<br>";
			if(strstr($td->nodeValue,"Asian Handicap")!=false){
				$tip=$td->nodeValue;
				echo $evento_tip.";".$tip.";".$pos."<br>";
			}
		}
		
	}
}

//------------------------------------------------------------

$xmlDoc = new DOMDocument();

$ch = curl_init();

//$id_usuario="74980";
// informar URL e outras fun?es ao CURL
curl_setopt($ch, CURLOPT_URL, "http://www.online-betting-guide.co.uk/tables/index.php?id=47&o=p1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1");

$output = curl_exec($ch);
curl_close($ch);

//echo $output;


@$xmlDoc->loadHTML($output);

$xpath = new DOMXPath($xmlDoc);

$tipters= $xpath->query("//a[starts-with(@href,'/tipster/index.php?id=')]");
$i=1;
foreach($tipters as $tipter){
	tipsPorId($i,$tipter->getAttribute('href'));
	$i++;
}



?>