<style>
#topicok{
	float:left;
	width:240px;
	min-height:240px;
	background-color:#FEED;
	margin:0 12px;
	padding:12px;

}
#hszok{
	width:600px;
	min-height:240px;
	background-color:#DEDEDE;
	margin:12px;
	margin-left:290px;
}
</style>
<h1>Fórum</h1>
<div id="topicok">
<?php
$topic=mysqli_query($dab,"
SELECT * FROM topic 
");
while($topics=mysqli_fetch_array($topic))
{
	print"<a href='./?p=forum&t=$topics[tid]'>$topics[tcim]</a><br>
	";
}
?>
<hr>
<form action="forum_ir.php" method="post" target="_blank">
Új téma címe:<input name="ujtopic"><br>
Tartalom:<textarea name="ujtartalom"></textarea><br>
<input type="submit" value="Új téma létrehozása">
</form>
</div>
<div id="hszok">
<?php
/*include('kapcso.php');
$user=mysqli_query($dab,"
SELECT * FROM users WHERE userid='$_SESSION[userid]';
");*/
	if(isset($_GET['t']))
	{
		$topic=mysqli_fetch_array(mysqli_query($dab,"
SELECT * FROM topic WHERE tid='$_GET[t]'
"));
		$hsz=mysqli_query($dab,"
SELECT * FROM hsz WHERE htid='$_GET[t]' ORDER BY hdatum DESC
");
print"<h3>halihóóó</h3>";
print"$topic[ttartalom] <br><hr><h4>Hozzászólások:</h4><br>";
while($hszok=mysqli_fetch_array($hsz))
{
	print"
$hszok[hszoveg] $hszok[hlink]<br>";
	}}
print"
<br>
<form action='hsz_ir.php' method='post' target='forum.php'>
<input type='text' name='hszszov' placeholder='Hozzászólás'><input type='text' name='link' placeholder='Link'><input type='hidden'  value='$_GET[t]' name='tid'><input type='submit' value='Küldés'>
</form>";?>
</div>
