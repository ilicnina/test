<?php

include_once 'db.php';

class DAO{
	private $db;
	private $GETMIN = "SELECT * FROM prisustva ORDER BY trajanjePrisustva ASC LIMIT 1";
	private $INSERT = "INSERT INTO prisustva(id, brRadnika, trajanjePrisustva) VALUES (?,?,?)";
	private $GETSVI = "SELECT * FROM prisustva WHERE id=?";

	public function __construct(){
		$this->db=DB::createInstance();
	}

	public function getRadnici($id){
		$statement = $this->db->prepare($this->GETSVI);
		$statement->bindValue(1, $id);
		$statement->execute();
		$result = $statement->fetch();
		return $result;
	}

	public function getMin(){
		$statement = $this->db->prepare($this->GETMIN);
		$statement->execute();
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function unesi($id, $brRadnika, $trajanjePrisustva){
		$statement = $this->db->prepare($this->INSERT);
		$statement->bindValue(1, $id);
		$statement->bindValue(2, $brRadnika);
		$statement->bindValue(3, $trajanjePrisustva);
		$statement->execute();
	}
}


?>
