<?php 
	include ("koneksi.php");
	$kd_peserta=$_GET['kd_peserta'];
	$queryupdatebarang="delete from peserta where kd_peserta='$kd_peserta'";
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been delete succesfully";
				header ("Location:data-siswa.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>" .mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
	?>
