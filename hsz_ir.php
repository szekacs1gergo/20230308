<?php
session_start();
print_r($_POST);
include('kapcso.php');/*
if($_POST['hszszov']=="") print('<script>die("Nem lehet üres a hozzászólásod!")</script>');*/
mysqli_query($dab,"
INSERT INTO hsz (hid, htid, huid, hdatum, hszoveg, heredeti, hkep, hlink, hstatusz)
VALUES (NULL, '$_POST[tid]', '$_SESSION[userid]', NOW(), '$_POST[hszszov]', '', '', '$_POST[link]', 'A');
");
print("<script>die('Comment sent.')
location.href='./?p=forum'</script>");
?>