<?PHP
	/* * * * * * * * * * * * * * * * * * * * * * * * * * *
	 *      Class pour simplifie les requets MYSQL       *
	 * * * * * * * * * * * * * * * * * * * * * * * * * * */

	  class Database extends mysqli{
		function __construct($HOSTNAME,$HOST_USER,$HUSER_PSWD,$DATABASE){
			parent::__construct($HOSTNAME,$HOST_USER,$HUSER_PSWD,$DATABASE);
			}

		function fetch($fetch){
			return $this->fetch_array($fetch,MYSQLI_BOTH);
		}
		function num($rows){
			if($this->num_rows($rows)) throw new Exception("Database num_rows manager not valid, please verif and try again !");
			else return $this->num_rows($rows);
		}
		function mytables($db){
			if($this->list_table($db)) throw new Exception("Database list_table manager not valid, please verif and try again !");
			else return $this->list_table($db);
		}
		function create_table($table,$valeur,$primary){ 
		     $this->query("CREATE TABLE $table ($valeur , primary key ($primary) )");
		}
		function drop_table($table){
		    if(!$this->query("DROP TABLE $table ")) throw new Exception(" Cannot drop ".$table.", please verif database query manager and try again !");
		    else return $this->query("DROP TABLE $table ");
		}
		function create_row($table,$row,$valeur){
		    if(!$this->query("ALTER TABLE $table ADD $row $valeur NOT NULL ")) throw new Exception("Cannot create ".$row." in ".$table.", please verif database query manager and try again");
		    else return $this->query("ALTER TABLE $table ADD $row $valeur NOT NULL ");
		}
		function drop_row($table,$row){
		    if(!$this->query("ALTER TABLE $table DROP $row ")) throw new Exception("Cannot drop ".$row." from ".$table.", please verif database query manager and try again !");
		    else return $this->query("ALTER TABLE $table DROP $row ");
		}
		function select($table,$row,$where = "",$limit = ""){
		     if(!$this->query("SELECT ".$row." FROM ".$table." ".$where." ".$limit)) throw new Exception("Cannot select ".$row." from ".$table.", please verif database query manager and try again !");
		     else return $this->query("SELECT ".$row." FROM ".$table." ".$where." ".$limit);
		}
		function insert($table,$rows,$valeurs,$limit = ""){
		     if(!$this->query("INSERT INTO $table ($rows) VALUES ($valeurs) ".$limit)) throw new Exception(" Cannot execute insert method, please verif database query manager and try again !");
		     else return $this->query("INSERT INTO $table ($rows) VALUES ($valeurs) ".$limit);
		}
		function deletes($table,$where = "",$limit = ""){
		      if(!$this->query("DELETE FROM $table ".$where." ".$limit)) throw new Exception(" Cannot execute delete method, please verif query manager !");
		      else return $this->query("DELETE FROM $table ".$where." ".$limit);
		}
		function update($table,$valeurs,$where = "",$limit = ""){
		    if(!$this->query("UPDATE $table SET $valeurs ".$where." ".$limit)) throw new Exception("cannot execute update method, please verif query manager !");
		    else return $this->query("UPDATE $table SET $valeurs ".$where." ".$limit);
		}
	 }

?>