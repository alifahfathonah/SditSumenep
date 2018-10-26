<?php 
	include ("koneksi.php");
	$id_nilai=$_GET['id_nilai'];
	session_start();
	/*
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
		
	}*/
	
	?>
<!DOCTYPE html>
<html>	
	<head>
		<title>Form Edit Data </title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="metro.min.css" media="screen">
	</head>
	<body>
	
		<form method="post" class="form-search" enctype="multipart/form-data">
		<?php	
			$queryselectbarang="select a.id_nilai, a.kd_peserta,b.nama_peserta,a.nama_petugas,a.tanggal_input,a.psikologi,a.alquran,a.akademik,a.nilai_rata from sistem_psb a inner join peserta b on a.kd_peserta = b.kd_peserta where a.id_nilai='$id_nilai'";
			$resultbarang= mysqli_query($koneksi,$queryselectbarang);
			$row = mysqli_fetch_array($resultbarang, MYSQLI_ASSOC);
			
			if(mysqli_num_rows($resultbarang)== 0){
				echo '<center><h2><font color="red">Data tidak ditemukan</font></h2></center>';
			}else {	
			
			?>
		<h3> Form Edit Data</h3>
		<table class="table table-hover">
			<tr>
				<td>Id nilai</td>
				<td>:</td>
				<td><input type="text" name="idnilai" readonly value="<?php echo $row['id_nilai'] ?>" /></td>
				</tr>
				<tr>
				<td>Kode Peserta</td>
				<td>:</td>
				<td><input type="text" name="kd_peserta" value="<?php echo $row['kd_peserta'] ?>"/></td>
				</tr>
				<tr>
				<td>Nama Peserta</td>
				<td>:</td>
				<td><input type="text" name="nama_peserta" value="<?php echo $row['nama_peserta'] ?>"/></td>
				</tr>
				<tr>
				<td>Psikologi</td>
				<td>:</td>
				<td><input type="number" name="psikologi" value="<?php echo $row['psikologi'] ?>" /></td>
				</tr>
				<tr>
				<td>Al Qur'an</td>
				<td>:</td>
				<td><input type="number" name="quran" value="<?php echo $row['alquran'] ?>" /></td>
				</tr>
				<tr>
				<td>Akademik</td>
				<td>:</td>
				<td><input type="number" name="akademik" value="<?php echo $row['akademik'] ?>" /></td>
				</tr>
				
				
				
								
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit" class="btn"> <a class="btn" href="nilai-siswa.php">Back</a> </td>	
						
					</tr>
			</table>
		</form>	
		
		<?php
			}
			
			if(isset($_POST['submit'])){
				$target_dir = "picfilm/";
			
				$idnilai=$_POST['idnilai'];
				$kd_peserta=$_POST['kd_peserta'];
				$psikologi=$_POST['psikologi'];
				$alquran=$_POST['quran'];
				$akademik=$_POST['akademik'];
				$rata= ($psikologi+$alquran+$akademik)/3;
				$queryupdatebarang="update sistem_psb set psikologi='$psikologi',alquran=$alquran,akademik='$akademik', nilai_rata='$rata'
				where id_nilai='$idnilai'" ;
			if(mysqli_query($koneksi,$queryupdatebarang)){
				echo "Data has been update Succesfully";
				header ("Location: nilai-siswa.php");
			}
			else{
				echo "Error". $queryupdatebarang . "<br/>". mysqli_error($koneksi);
			}
			mysqli_close($koneksi);
			}
		?>
	</body>
</html>