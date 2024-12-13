<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Subj = $_POST['Subj'];
    $Mes =$_POST['Mes'];

	$conn = new mysqli('localhost','root','','carlyn');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into yes(Name, Email,  Subj, Mes) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Name, $Email, $Subj, $Mes);
		$execval = $stmt->execute();    
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>