<?php
    require_once 'sqlitePDO.php';
    $db = new sqlitePDO();
    if(!$db) {
        echo $db->lastErrorMsg();
      }else {
        echo "Opened database successfully\n"."<br/><br/>";
      }


    //SQL Membuat Tabel USERS
    $sqlCreateTable ="
		CREATE TABLE IF NOT EXISTS USERS (
			iduser      INTEGER		PRIMARY KEY AUTOINCREMENT,
			nama        VARCHAR(30) NOT NULL,
			email 		VARCHAR(50) NOT NULL,
			password  	VARCHAR(50) NOT NULL,
			date 		TIMESTAMP
		);
		";
    //SQL menambahkan data ke tabel USERS
    $sqlInsert ="
		INSERT INTO USERS (nama,email,password,date) VALUES 
        ('Wanti', 'wanti@artha.web.id', '123456', '".date("Y-m-d H:i:s")."'),
		('Rudiantara', 'rudi@akudinal.com', '123450','".date("Y-m-d H:i:s")."');
		";

    //SQL Update Tabel USERS
    $sqlUpdate ="	
		UPDATE USERS set password = '123456789' where email='rudi@akudinal.com';
		";
		
	// SQL SELECT
	$sqlSelect ="	
		SELECT * from USERS;
		";
		
	// SQL Hapus data
	$sqlDelete ="	
		DELETE from USERS WHERE email='rudi@akudinal.com';
		";

    
    //Membuat Tabel
    $db->cmdSql($sqlCreateTable);
    
    //menambahkan data Tabel
    //$db->cmdSql($sqlInsert);

    //Mengubah data Tabel
    //$db->cmdSql($sqlUpdate);

    //Hapus data Tabel
    //$db->cmdSql($sqlDelete);

    //Menampilkan data tabel
    /*
    $hsl = $db->selectTable($sqlSelect);
    while($row = $hsl->fetch()){
        echo "Nama: " . $row->nama . "<br>";
        echo "Email: " . $row->email . "<br>";
        echo "Password: ". $row->password . "<br>";
        echo "DateCreaUpdate: ". $row->date . "<br><br>";
    }
    */