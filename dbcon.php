<?php




$username = "root";
$password =  "";
$server = 'localhost';
$db = 'signup';


$con = mysqli_connect($server,$username,$password,$db);

if($con){
	?>
		<script>
			alert("connection Successful");
		</script>
		<?php
}
else{
		?>

		<script>
			alert("No connection");
		</script>
		<?php
}


?>
