<?php
session_start();

?>
<h1>Topic</h1>
<?php
print_r($_POST);
if($_POST['ujtopic']=="") die("<script>Nem adtál meg topic nevet!</script>");
include("kapcso.php");
mysqli_query($dab,"
INSERT INTO topic 	(tid, 	tcim, 				ttartalom, 				tdatum, tuid, 				tstatusz)
			VALUES 	(NULL, '$_POST[ujtopic]', 	'$_POST[ujtartalom]', 	NOW(), 	'$_SESSION[userid]', 'AP')
");
print"<script>die('Sikeresen töltött fel új topic-ot!') 	parent.location.href=parent.location.href</script>";
mysqli_close($dab);
?>