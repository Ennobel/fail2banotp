<?php
	$code=$_POST['c'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	require_once('rfc6238.php');
	$secretkey='GEZDGNBVGY3TQOJQGEZDGNBVGY3TQOJQ';
	$currentcode=$code;
	if(TokenAuth6238::verify($secretkey,$currentcode)){
		if($username=="ohdir" && $password=="ohdir"){
			echo "code is valid\n";
		}else{
			echo "username dan passwd is invalid";
			$tanggal=date('M j H:i:s');
			system("echo ".$tanggal." GAGAL ".$_SERVER['REMOTE_ADDR']." >> /var/www/html/log/report");
 		}
	}else{
		if($username=="ohdir" && $password=="ohdir"){
			echo "invalid code\n";
		}else{
			echo "username and passwordd is invalid";
			$tanggal=date('M j H:i:s');
			system("echo ".$tanggal." GAGAL ".$_SERVER['REMOTE_ADDR']." >> /var/www/html/log/report");
		}
	}
print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl('ohdir','ohdir.my.id',$secretkey,'Ohdir%20TFA'));
?>

