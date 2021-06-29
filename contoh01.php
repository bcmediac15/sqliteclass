<?php
    require_once 'sqlitePDO.php';
    $db = new sqlitePDO();

    //SQL Membuat Tabel USERS
    $sqlCreateTable ="
		CREATE TABLE IF NOT EXISTS USERS (
			iduser      INTEGER		PRIMARY KEY AUTOINCREMENT,
			nama        VARCHAR(30) NOT NULL,
			email       VARCHAR(50) NOT NULL,
			alamat  	  VARCHAR(50),
      telp        VARCHAR(15),    
			date 		TIMESTAMP
		);
		";
    //SQL menambahkan data ke tabel USERS
    $sqlInsert ="
		INSERT INTO USERS (nama, email, alamat, telp, date) VALUES 
        ('Wanti', 'wanti@artha.web.id', 'Jl. Mawar Merah Delima' , '081234343430', '".date("Y-m-d H:i:s")."'),
		('Rudiantara', 'rudi@akudinal.com', 'Jl. Seroja sari Dewi' ,   '087221234504','".date("Y-m-d H:i:s")."'),
    ('Made Artha', 'made@artha.web.id', 'Jl. Suka Dimana Saja' ,   '087221234504','".date("Y-m-d H:i:s")."');
		";

    //SQL Update Tabel USERS
    $sqlUpdate ="UPDATE USERS set password = '081338457980' where email='made@artha.web.id';";
		
	  // SQL SELECT
	  $sqlSelect ="SELECT * from USERS;";
		
	  // SQL Hapus data
	  $sqlDelete ="DELETE from USERS WHERE email='rudi@akudinal.com';";

    
    //Membuat Tabel
    //$db->cmdSql($sqlCreateTable);
    
    //menambahkan data Tabel
    //$db->cmdSql($sqlInsert);

    //Mengubah data Tabel
    //$db->cmdSql($sqlUpdate);

    //Hapus data Tabel
    //$db->cmdSql($sqlDelete);

    //Menampilkan data tabel
    $cx = 0;
    echo "<h3>Data Teman</h3>";
    $hsl = $db->selectTable($sqlSelect);
    while($row = $hsl->fetch()){
        $cx++;
        echo "Data ke-" . $cx . "<br>";
        echo "Nama: " . $row->nama . "<br>";
        echo "Email: " . $row->email . "<br>";
        echo "Alamat: ". $row->alamat . "<br>";
        echo "Telp: ". $row->telp . "<br>";
        echo "DateCreaUpdate: ". $row->date . "<br><br>";
    }
    