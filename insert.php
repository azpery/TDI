<?php
	try{
		include_once "db_functions.php";
		$function = (new DB_Functions())->useConnexion(); 
		$result = 0;
		switch($_POST['type']){
			case 2 : 
			$result = $function->insertQuery("INSERT INTO modele VALUES('".$_POST['codeVoiture']."', '".$_POST['nomVoiture']."', '".$_POST['carburant']."')");
			echo $result;
			break;
			case 3 : 
			if(!empty($_POST["nom"])&&!empty($_POST["prenom"])){
			$result = $function->insertQuery("INSERT INTO proprietaire VALUES(DEFAULT, '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['adresse']."', '".$_POST['ville']."', '".$_POST['cp']."')");
			}
			if(!empty($_POST["codeVoiture"])){
			$result = $function->insertQuery("INSERT INTO modele VALUES('".$_POST['codeVoiture']."', '".$_POST['nomVoiture']."', '".$_POST['carburant']."')");
			}
			if(!empty($_POST["na"])){
			$result = $function->insertQuery("INSERT INTO voitures VALUES('".$_POST['na']."', '".$_POST['id_modele']."', '".$_POST['couleur']."', '".$_POST['dateimmat']."')");
			}
			echo $result;
			break;
			case 4 : 
			$result = $function->createXML();
			echo $result;
			break;
			case 5 : 
			$result = $function->readRSS($_POST["path"]);
			echo $result;
			break;
		}
		

	}catch(PDOException $e){
		echo '{"results":[{"error":'.$e->getCode().'}]}';
	}
?>