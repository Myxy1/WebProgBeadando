<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<?php

	if(!isset($_POST['nev']) || strlen($_POST['nev']) < 5)
	{
		exit("Hibás név: ".$_POST['nev']);
	}

	$re = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
	if(!isset($_POST['email']) || !preg_match($re,$_POST['email']))
	{
		exit("Hibás email: ".$_POST['email']);
	}

	if(!isset($_POST['szoveg']) || empty($_POST['szoveg']))
	{
		exit("Hibás szöveg: ".$_POST['szoveg']);
	}

	echo "Kapott értékek: ";
	echo "<pre>";
	echo "Név: " , $_POST["nev"] , "<br>";
	echo "Email: " , $_POST["email"] , "<br>";
	echo "Üzenet: " , $_POST["szoveg"] , "<br>";
	echo "</pre>";

	if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['szoveg'])) {
		try {
			
			$dbh = new PDO('mysql:host=localhost;dbname=labor7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
       
			$sqlInsert = "insert into uzenetek(nev,email,uzenet) values(:nev,:email,:szoveg)";
			$sth = $dbh->prepare($sqlInsert);
			$sth->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':szoveg'=> $_POST['szoveg']));
			if($count = $sth->rowCount()){
				$newid = $dbh->lastInsertId();
				$uzenet = "Az üzenet sikeresen el lett küldve!<br>";
			}
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
	<?php if(isset($_SESSION['login'])): ?>	
	<table>
		<tr>
			<th>Név</th>
			<th>Email</th>
			<th>Üzenet</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost","root","","labor7");
		$sql = "select * from uzenetek";
		$result = $conn->query($sql);
		if($result-> num_rows >0){
			while($row = $result->fetch_assoc()){
				echo "<tr><td>".$row["nev"]."</td><td>".$row["email"]."</td><td>".$row["uzenet"]."</td></tr>";
			}
		}
		$conn->close();
				
		?>
	</table>
	<?php endif ?>	
	</body>
</html>
