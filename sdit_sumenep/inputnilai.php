<?php 
session_start();
	
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}
include("koneksi.php");
mysql_connect("localhost","root","");
mysql_select_db("sdit_sumenep");
//Fungsi autonumber
function autonumber($tabel, $kolom, $lebar=0, $awalan='')
{
	$query="select $kolom from $tabel order by $kolom desc limit 1";
	$hasil=mysql_query($query);
	$jumlahrecord = mysql_num_rows($hasil);
	if($jumlahrecord == 0)
		$nomor=1;
	else
	{
		$row=mysql_fetch_array($hasil);
		$nomor=intval(substr($row[0],strlen($awalan)))+1;
	}
	if($lebar>0)
		$angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
	else
		$angka = $awalan.$nomor;
	return $angka;
}


?>

<!DOCTYPE html>

<html>
	<head>
	
		<title>Form Tambah Nilai</title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
	</head>
	<body>
	
	<?php
	#Include the connect.php file
	include('koneksi.php');
	#Connect to the database
	//connection String
	$hostname="localhost";
	$username="root";
	$password="";
	$database="sdit_sumenep";


	$connect = mysql_connect($hostname, $username, $password)
	or die('Could not connect: ' . mysql_error());
	//Select The database
	$bool = mysql_select_db($database, $connect);
	if ($bool === False){
	   print "can't find $database";
	}
	?>
	
	<h2>Tambah Nilai</h2>
		<form method="post" enctype="multipart/form-data">
			<table class="table table-stripped">
			<tr>
				<td>ID Data</td>
				<td>:</td>
				<td><input type="text" name="iddata" value="<?=autonumber("sistem_psb","id_nilai",3,"no")?>" ></td>
				</tr>
				<tr>
				<td>Kode peserta</td>
				<td>:</td>
				<td><select name="kd_peserta">
				<?php 
					$tampil=mysql_query("SELECT * from peserta");
					if ($r[kd_peserta]==0){
					echo "<option value=0 selected>- Pilih kode -</option>";
					}
					while($w=mysql_fetch_array($tampil)){
					if ($r[kd_peserta]==$w[kd_peserta]){
					echo "<option value=$w[kd_peserta] selected>$w[kd_peserta]</option>";
					}
					else{
					echo "<option value=$w[kd_peserta]>$w[kd_peserta]</option>";
					}
					}
					 ?>
					 </select>
				</tr>
				<tr>
				<td>Mata Pelajaran</td>
				<td>:</td>
				<tr>
				<td>Psikologi</td>
				<td>:</td>
				<td><input type="number" name="psikologi">
				</td>
				</tr>
				<tr>
				<td>Al Quran</td>
				<td>:</td>
				<td><input type="number" name="quran">
				</td>
				</tr>
				<tr>
				<td>Akademik</td>
				<td>:</td>
				<td><input type="number" name="akademik">
				</td>
				</tr>
				</tr>
				
				<td>Petugas</td>
				<td>:</td>
				<td><input type="text" name="petugas" value= "<?php echo $_SESSION['USERNAME_ADMIN'];?>">
				</td>
				</tr>
				
				<tr>
				
				<td>Tanggal Input</td>
				<td>:</td>
				<td><input type="text" name="tanggalinput" readonly value="<?php
				date_default_timezone_set('Asia/Jakarta');
				$tanggal= mktime(date("m"),date("d"),date("Y"));
				$tglsekarang = date("Y-m-d", $tanggal);
				echo $tglsekarang;
				?>" style='color:grey' /></td>
				</tr>
				<tr>
					<td colspan=3 align="center"><input type="submit" name="submit"> </td>					
					</tr>
			</table>
		</form>

		<a href="nilai-siswa.php"> lihat data </a><br/> 
		<?php 
		
		
			if(isset($_POST['submit'])){
				$iddata=$_POST['iddata'];
				$kd_peserta=$_POST['kd_peserta'];
				$psikologi=$_POST['psikologi'];
				$alquran=$_POST['quran'];
				$akademik=$_POST['akademik'];
				$petugas=$_POST['petugas'];
				$tanggalinput=$_POST['tanggalinput'];
				$rata= ($psikologi+$alquran+$akademik)/3;
			
				
				$queryinserttransaksi= "INSERT INTO `sdit_sumenep`.`sistem_psb` (`id_nilai`, `kd_peserta`, `psikologi`, `alquran`,`akademik`,`nama_petugas`,`nilai_rata`,`tanggal_input`) VALUES 
				('$iddata', '$kd_peserta', '$psikologi', '$alquran','$akademik','$petugas','$rata','$tanggalinput');";
				if(mysqli_query($koneksi,$queryinserttransaksi)){
					echo "New record created succesfully ";		
					
				} else {
					echo "Error: ". $queryinserttransaksi . "<br>" . mysqli_error($koneksi);
				}
				
				mysqli_close($koneksi);
			}
			
			?>
	</body>
</html>
		