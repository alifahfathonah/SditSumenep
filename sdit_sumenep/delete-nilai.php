<?php 
	include ("koneksi.php");
	$id_nilai=$_GET['id_nilai'];
	$queryupdatebarang="delete from sistem_psb where id_nilai='$id_nilai'";
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been delete succesfully";
				header ("Location:nilai-siswa.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>" .mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
	?>
