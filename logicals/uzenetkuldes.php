<?php
if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['uzenet'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlInsert = "insert into uzenetek(nev,email,uzenet) values(:nev,:email,:uzenet)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':nev' => $_POST['nev']), ':email' => $_POST['email'], ':uzenet'=> $_POST['uzenet']);
		if($count = $sth->rowCount()){
			$newid = $dbh->lastInsertId();
			$uzenet = "Az üzenet sikeresen el lett küldve!<br>";
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: ".$e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>