<?php 
 class DB{

     private $host = 'mysql.hostinger.com';
     private $username = 'u889117375_forty';
     private $password = 'PW4itg@forty';
     private $database = 'u889117375_itg';
     private $db;

    public function __construct($host = null, $username = null, $password = null, $database = null){
        if ($host != null) {
       	$this->host= $host;
       	$this->username= $username;
       	$this->password= $password;
       	$this->database= $database;
       }
      
      try{
       $this->db = new PDO('mysql:host='.$this->host.'; dbname='.$this->database, $this->username, $this
        ->password, array(
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
          ));
        }catch(PDOException $e){die('Impossible de se connecter a la base de donnees'); }

    }

    function query($req, $data=array()){
      $liste = $this->db->prepare($req);
      $liste->execute($data);
      return $liste->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBD(){ return $this->db; }

 
 }

 ?>