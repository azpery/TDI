<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
    }
    function useConnexion() {
        include_once './db_connect.php';
        $instance = new self();
        // connecting to database

        $pdo = (new DB_Connect())->useConnexion();
        $instance->db = $pdo->connect();
        return $instance;
    }
    function getQuery($query){
        $query = $query;
        $requetePrep = $this->db->prepare($query);
        $requetePrep->execute();
        $result = $requetePrep->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function insertQuery($query){
        $query = $query;
        $requetePrep = $this->db->prepare($query);
        $result = $requetePrep->execute();
        return $result;
    }
    function get_enum_values( $table, $field )
    {
        $type = $this->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $type, $matches);
        $enum = explode("','", $matches[1]);
        return $enum;
    }
    function readRSS($path){
        $feed = implode(file($path));
        $xml = simplexml_load_string($feed);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $json ;
    }
    function readXML($path){
        $data = simplexml_load_file($path);
        return $data;
    }
    function createXML(  )
    {
        $xml = "<?xml version='1.0'?>\n";
        $data = $this->getQuery("SELECT * FROM modele");

        foreach ($data as $value){
            $xml .= "<modele>\n";
            $xml.= "\t<id_modele>".$value["id_modele"]."</id_modele>\n";
            $xml.= "\t<modele>".$value["modele"]."</modele>\n";
            $xml.= "\t<carburant>".$value["carburant"]."</carburant>\n";
            $xml .= "</modele>\n";
        }
        $data = $this->getQuery("SELECT * FROM proprietaire");

        foreach ($data as $value){
            $xml .= "<proprietaire>\n";
            $xml.= "\t<id_pers>".$value["id_pers"]."</id_pers>\n";
            $xml.= "\t<nom>".$value["nom"]."</nom>\n";
            $xml.= "\t<prenom>".$value["prenom"]."</prenom>\n";
            $xml.= "\t<adresse>".$value["adresse"]."</adresse>\n";
            $xml.= "\t<ville>".$value["ville"]."</ville>\n";
            $xml.= "\t<codepostal>".$value["codepostal"]."</codepostal>\n";
            $xml .= "</proprietaire>\n";
        }
        $data = $this->getQuery("SELECT * FROM voitures");

        foreach ($data as $value){
            $xml .= "<voitures>\n";
            $xml.= "\t<immat>".$value["immat"]."</immat>\n";
            $xml.= "\t<id_modele>".$value["id_modele"]."</id_modele>\n";
            $xml.= "\t<couleur>".$value["couleur"]."</couleur>\n";
            $xml.= "\t<datevoiture>".$value["datevoiture"]."</datevoiture>\n";
            $xml .= "</voitures>\n";
        }
        $myfile = fopen("voitures.xml", "w");
        fwrite($myfile, $xml);
        header("Location: voitures.xml");
        fclose($myfile);
        return $xml;
    }

}   
?>
