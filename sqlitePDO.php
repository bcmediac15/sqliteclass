<?php
/**
 * Contoh class PHP untuk Proses CRUD SQLITE
 **************************
 * @author Made Artha <made@artha.web.id>
 * @License GPL
 */
class sqlitePDO{
    private
		$dirDataBase = 'dbs',
		$dbName      = 'sqlite.db',
        $dbh;
		
	public function __construct() {
        $PT = "sqlite:".$this->dirDataBase."/".$this->dbName;
		try {
			$this->dbh = new PDO($PT);
		}catch(PDOException $e) {
			die($e->getMessage());
		}
    }
	public function cmdSql($sql){
		return $this->dbh->query($sql);
	}
	public function selectTable($sqlcommand){
		$STH = $this->dbh->query($sqlcommand);
		$STH->setFetchMode(PDO::FETCH_OBJ);
		return $STH;
	}
}