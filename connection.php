<?php




$username = "root";
$password =  "";
$server = 'localhost';
$db = 'reges';


$con = mysqli_connect($server,$username,$password,$db);

if($con)
{
	//echo "Conncetion successfull";
?>
	<script>
		alert('connectin Successful');
		</script>
		<?php
}
else
{
	echo "connection not successfull";
	die("no connection" . mysqli_connect_error());
}

?>


?>