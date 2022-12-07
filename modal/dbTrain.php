<?php
   class DbTrain {
    //les prop sont privé pare ce que seulement(only) cette class peut acceder a cette prop 
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "management_traines";

    //créer method qui contient la connexion de la base  de donneé
    protected  function connexion(){
        //data source name(dsn)=>type db + host + nom du db
        $dsn = 'mysql:host='.$this->host.';dbname=' .$this->dbName;
        // pdo connexion
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        //recuperer les info sous forme une associative array
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //recuperer ma connexion 
        return $pdo;
    }
   }

