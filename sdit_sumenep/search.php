<?php 
	include ("koneksi.php");
	$nama_peserta=$_GET['nama_peserta'];
	/*
	session_start();
	
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
			$queryselectbarang="select a.id_nilai, a.kd_peserta,b.nama_peserta,a.nama_petugas,a.tanggal_input,a.psikologi,a.alquran,a.akademik,a.nilai_rata from sistem_psb a inner join peserta b on a.kd_peserta = b.kd_peserta where b.nama_peserta='$nama_peserta'";
			$resultbarang= mysqli_query($koneksi,$queryselectbarang);
			if(mysqli_num_rows($resultbarang) == 0){
				echo '<center><h2><font color="red">Data tidak ditemukan</font></h2></center>';
			}else {	
			
			
			?>
		<h3> Hasil Pencarian</h3>
		<table class="table table-hover">
				<td align="center">No.</td>
		<td align="center">ID Nilai.</td>
		<td align="center">Kode Peserta.</td>
		<td align="center">Nama Peserta</td>
		<td align="center">Nama Petugas.</td>
		<td align="center">Tanggal Input.</td>
		<td align="center">Psikologi.</td>
		<td align="center">Al Quran.</td>
		<td align="center">Akademik.</td>
		<td align="center">Nilai Rata-rata.</td>
		<td align="center">Status.</td>
		
					<?php
					
					$no=1;
			
			while($row=mysqli_fetch_array($resultbarang,MYSQLI_ASSOC)){
					echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>".$row["id_nilai"]."</td>";
				echo"<td>". $row["kd_peserta"] . "</td>";
				echo"<td>". $row["nama_peserta"] . "</td>";
				echo"<td>". $row["nama_petugas"] . "</td>";
				echo"<td>". $row["tanggal_input"] . "</td>";
				echo"<td>". $row["psikologi"] . "</td>";
				echo"<td>". $row["alquran"] . "</td>";
				echo"<td>". $row["akademik"] . "</td>";
				echo"<td>". $row["nilai_rata"] . "</td>";
				if($row["nilai_rata"]>='70'){
					echo "<td>Lulus</td>";
				}
				else{
					echo "<td>Tidak Lulus</td>";
				}
				$no++;
				
					}
			}
			
			
		?>
					
					</tr>
			</table>
			 </td>	
		</form>	
		<td colspan=2 align="right"> <a class="btn" href="nilai-siswa.php">Back</a>	
		
	</body>
</html>