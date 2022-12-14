<?php
session_start();

class dbcon{
    static public function conn() {
        try{
            $db = new PDO('mysql:host=localhost;dbname=management_traines','root','');
            $db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);
            return $db;
        }
        catch (PDOException $e){
            print "err". $e ->getMessage();
            die();
        }
    }
    static public function searchby($table,$by,$id){
        $sql = "SELECT * FROM $table WHERE `$by` = $id";
            $exe = self::conn() -> query($sql);
            $res = $exe->fetch();
            return $res;

    }
  
}

class user extends dbcon{
    public $nom;
    public $email;	
    public $password;
    public $repetpassword;	
    public $errormsg;

    public function __construct($nom,$email,$password,$repetpassword)
    {
        $this->email = $email;
        $this->nom = $nom;
        $this->password = $password;
        $this->repetpassword = $repetpassword;
    }


    public function checkdata(){
            $sql = "SELECT * FROM `users` WHERE `email` = ?";
            $exe = $this ->conn() -> prepare($sql);
            $exe ->execute([$this -> email]);
            if($exe ->rowCount() > 0){
                $this -> errormsg = 'email already token';
                return false;  
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$this->nom)) {
              $this -> errormsg = 'only letters and white space are allowed in username';
                return false;
           }
            if(empty($this->nom) || empty($this->email) || empty($this->password) || empty($this->repetpassword)){
                $this -> errormsg = 'all inputs required';
                return false;
            }
            if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                $this -> errormsg = 'enter valid email';
                return false;
            }
            if($this->password != $this->repetpassword){
                $this -> errormsg = 'passwords are not identical';
                return false;
            }
            return true;


    }
    public function insertuser(){
        $sql = "INSERT INTO `users`(`nom`, `email`, `password`, `image`, `id_role`) VALUES (?,?,?,?,?)";
        $exe = $this ->conn() -> prepare($sql);
        $exe ->execute([$this->nom,$this->email, password_hash($this->password, PASSWORD_DEFAULT),'',2]);
    }
   static public function signin($email,$pass){
       
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        $exe = self::conn() -> prepare($sql);
        $exe ->execute([$email]);
        if($exe ->rowCount() > 0){
        $res = $exe -> fetch();
        if(password_verify($pass,$res['password'])){
            return $res;
        }else
        {
        return false;
        }   
    }
    }
    static function checkEtat($email){
        $sql = "SELECT * FROM `users` where email=?";
        $exe = self:: conn() -> prepare($sql);
        $exe->execute([$email]);
        if($exe ->rowCount() > 0){
            $res = $exe -> fetch();
            return $res;
        }
        
    }
    public function getuser($id){
        $sql = "SELECT * FROM `users` WHERE `email` = ?";
        $exe = self::conn() -> prepare($sql);
        $exe ->execute([$id]);
        $res = $exe -> fetch();
        return $res;    
    }
    static public function logout(){
        session_destroy();
    } 
}



class reviews extends dbcon{
        public $commentaire;
        public $userid;
        public function __construct($comm,$userid)
        {
            $this ->commentaire = $comm;
            $this->userid = $userid;
        }
        public function getgoodrev(){
            $badwords = array('jamal','ded','bad');
            $goodrev = array();
            $sql = "SELECT * FROM `commentaires`";
            $exe = $this -> conn() -> query($sql);
            
            while($res = $exe -> fetch()){
                $badwordscount = 0;
            for($i=0;$i< count($badwords);$i++){
                if(str_contains(strtolower($res['commentaire']),strtolower($badwords[$i]))){
                    $badwordscount ++;
                }
            }
            if($badwordscount==0) array_push($goodrev, array("commentaire"=>$res['commentaire'],"id_user"=>$res['id_user']));
        }
            return $goodrev;

        }
        static public function getallrev($id = 'any(SELECT id_user FROM `commentaires`)'){
            $sql = "SELECT * FROM `commentaires` WHERE `id_user` = $id";
            $exe = self::conn() -> query($sql);
            $res = $exe -> fetchAll();
            return $res;
        }
        public function addrev(){
            if($this->commentaire != ''){
            $sql = "INSERT INTO `commentaires`(`commentaire`,`id_user`) VALUES (?,?)";
            $exe = $this->conn() -> prepare($sql);
            $exe -> execute([$this->commentaire,$this->userid]);
        }else{
            echo 'comment cant be empty';
        } }
}


class voyage extends dbcon{
    public $date_dep;
    public $date_darr;
    public $train_id;
    public $gare_dep;
    public $gare_darr;

    public function __construct($dd,$da,$ti,$gd,$ga)
    {
        $this->date_dep = $dd;
        $this->date_darr = $da;
        $this->train_id = $ti;
        $this->gare_dep = $gd;
        $this->gare_darr = $ga;
    }

    public function addvoyage(){
        $sql = "INSERT INTO `voyages`(`date_dep`, `date_arr`, `id_train`, `id_gare_dep`, `id_gare_arr`) VALUES (?,?,?,?,?)";
        $exe = $this->conn() -> prepare($sql);
        $exe -> execute([$this->date_dep,
        $this->date_darr,
        $this->train_id,
        $this->gare_dep,
        $this->gare_darr]);
    }
    
    public function checkvoyagedata(){
            if(empty( $this->date_dep )||
            empty( $this->date_darr) ||
         empty( $this->train_id )||
         empty( $this->gare_dep )||
            empty( $this->gare_darr)|| 
            $this->gare_dep == $this->gare_darr ||
            $this->date_dep >= $this->date_darr)return false;
            else return true;
    }
    static public function searchvoyage($gd = 'any(SELECT `id_gare_dep` FROM `voyages`)',$ga = 'any(SELECT `id_gare_arr` FROM `voyages`)'){
        $now = date('20y-m-d h:m:s');
        $sql = "SELECT * FROM `voyages` WHERE id_gare_dep = $gd and id_gare_arr = $ga and date_dep >= '$now'";
        $exe = self::conn() -> query($sql);
        $rows = $exe->fetchAll();
        return $rows;
    }


}

function secsToStr($d1,$d2){ 
    $r='';
    $d1 = strtotime($d1);
    $d2 = strtotime($d2);
    $secs = abs($d1-$d2); 
    if($secs>=3600){$hours=floor($secs/3600);$secs=$secs%3600;$r.=$hours.'h';}  
    if($secs>=60){$minutes=floor($secs/60);$secs=$secs%60;$r.=$minutes.'min';}
    return $r;  
}




