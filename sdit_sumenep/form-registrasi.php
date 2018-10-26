<?php 
session_start();
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}

//Fungsi autonumber


	/*
	if(!isset($_SESSION['LEVEL'])){
		header("Location: login.php");
	}
	*/
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
		<title>SDIT Sumenep</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
	
		<div class="container">
      
      <div class="hero-unit">
       <h2>Form Pendaftaran</h2>
	   <form class="form-horizontal" method="post">
	   <div class="control-group">
			<label class="control-label>">Kode_Peserta</label>
			<div class="control"><input type="text" name="kode_peserta" readonly value="<?=autonumber("peserta","kd_peserta",3,"PS")?>" style='color:grey' ></td></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Peserta</label>
			<div class="control"><input type="text" name="nama_peserta" placeholder="Nama Peserta"></div>
		</div>
	   <div class="control-group">
			<label class="control-label>">Panggilan</label>
			<div class="control"><input type="text" name="panggilan" placeholder="Panggilan"></div>
		</div>
		 <div class="control-group">
			<label class="control-label>">NIK</label>
			<div class="control"><input type="text" name="nik" placeholder="NIK"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Jenis Kelamin</label>
			<div class="control"><input type="text" name="jk" placeholder="Jenis Kelamin"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">TK Asal</label>
			<div class="control"><input type="text" name="tkasal" placeholder="TK Asal"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Alamat TK Asal</label>
			<div class="control"><input type="text" name="alamattkasal" placeholder="Alamat TK Asal"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Tempat Lahir</label>
			<div class="control"><input type="text" name="tempatlahir" placeholder="Tempat Lahir"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Tanggal Lahir</label>
			<div class="control"><input type="date" name="tanggallahir" ></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Agama</label>
			<div class="control"><input type="text" name="agama" placeholder="Agama"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Jumlah Saudara Kandung</label>
			<div class="control"><input type="number" name="jmlsodara" placeholder="Jumlah Saudara"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Saudara Kandung 1</label>
			<div class="control"><input type="text" name="sdr1" placeholder="Nama"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Sekolah Saudara Kandung 1</label>
			<div class="control"><input type="text" name="skolsdr1" placeholder="Nama Sekolah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Saudara Kandung 2</label>
			<div class="control"><input type="text" name="sdr2" placeholder="Nama"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Sekolah Saudara Kandung 2</label>
			<div class="control"><input type="text" name="skolsdr2" placeholder="Nama Sekolah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Saudara Kandung 3</label>
			<div class="control"><input type="text" name="sdr3" placeholder="Nama"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Sekolah Saudara Kandung 3</label>
			<div class="control"><input type="text" name="skolsdr3" placeholder="Nama Sekolah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Bahasa Rumah</label>
			<div class="control"><input type="text" name="bhsrumah" placeholder="Bahasa"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Golongan Darah</label>
			<div class="control"><input type="text" name="gol" placeholder="Golongan"></div>		
			</div>
		<div class="control-group">
			<label class="control-label>">Alamat</label>
			<div class="control"><input type="text" name="alamat" placeholder="Alamat"></div>
		</div>
		
		<div class="control-group">
			<label class="control-label>">NO HP Orang Tua</label>
			<div class="control"><input type="number" name="nohp" placeholder="Nomor Handphone"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Alat Transportasi</label>
			<div class="control"><input type="text" name="transport" placeholder="Jenis Kendaraan"></div>
		</div>
		
		<div class="control-group">
			<label class="control-label>">Jarak Sekolah (Dalam Kilometer)</label>
			<div class="control"><input type="number" name="jarak" placeholder="Jarak"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Ayah</label>
			<div class="control"><input type="text" name="ayah" placeholder="Nama Ayah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Ibu</label>
			<div class="control"><input type="text" name="ibu" placeholder="Nama Ibu"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Pendidikan Ayah</label>
			<div class="control"><input type="text" name="pddayah" placeholder="Pendidikan Ayah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Pendidikan Ibu</label>
			<div class="control"><input type="text" name="pddibu" placeholder="Pendidikan Ibu"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Pekerjaan Ayah</label>
			<div class="control"><input type="text" name="pkjayah" placeholder="Pekerjaan Ayah"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Pekerjaan Ibu</label>
			<div class="control"><input type="text" name="pkjibu" placeholder="Pekerjaan Ibu"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Nama Wali Siswa</label>
			<div class="control"><input type="text" name="wali" placeholder="Nama Wali"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Hubungan Keluarga</label>
			<div class="control"><input type="text" name="hub" placeholder="Hubungan"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">Pekerjaan Wali</label>
			<div class="control"><input type="text" name="pkjwali" placeholder="Pekerjaan"></div>
		</div>
		<div class="control-group">
			<label class="control-label>">No HP Wali</label>
			<div class="control"><input type="number" name="nohpwali" placeholder="Nomor Hp wali"></div>
		</div>
		<div class="control-group">
			<div class="control">
			<button type="submit" class="btn btn-info" name="submit">Submit</button> <a href="admin-page.php">Back</a>
			
			</div>
		</div>
	</form>
      </div>
	
	<?php
		include("koneksi.php");
		
		if(isset($_POST['submit'])){
			$kode_peserta=$_POST['kode_peserta'];
			$nama_peserta=$_POST['nama_peserta'];
			$panggilan=$_POST['panggilan'];
			$nik=$_POST['nik'];
			$jk=$_POST['jk'];
			$tkasal=$_POST['tkasal'];
			$alamattkasal=$_POST['alamattkasal'];
			$tempatlahir=$_POST['tempatlahir'];
			$tanggallahir=$_POST['tanggallahir'];
			$agama=$_POST['agama'];
			$jmlsodara=$_POST['jmlsodara'];
			$sdr1=$_POST['sdr1'];
			$skolsdr1=$_POST['skolsdr1'];
			$sdr2=$_POST['sdr2'];
			$skolsdr2=$_POST['skolsdr2'];
			$sdr3=$_POST['sdr3'];
			$skolsdr3=$_POST['skolsdr3'];
			$bhsrumah=$_POST['bhsrumah'];
			$gol=$_POST['gol'];
			$alamat=$_POST['alamat'];
			$nohp=$_POST['nohp'];
			$transport=$_POST['transport'];
			$jarak=$_POST['jarak'];
			$ayah=$_POST['ayah'];
			$ibu=$_POST['ibu'];
			$pddayah=$_POST['pddayah'];
			$pddibu=$_POST['pddibu'];
			$pkjayah=$_POST['pkjayah'];
			$pkjibu=$_POST['pkjibu'];
			$wali=$_POST['wali'];
			$hub=$_POST['hub'];
			$pkjwali=$_POST['pkjwali'];
			$nohpwali=$_POST['nohpwali'];


			
			$sqlinsert="INSERT INTO peserta (`kd_peserta`,	`nama_peserta`,	`pangilan`,	`NIK`,	`jenis_kelamin`,	`tk_asal`,	`alamat_tkasal`,	`tempat_lahir`,	`tgl_lhr`,	`agama`,	`jml_sdrkndung`,	`nama_sdrkndung1`,	`sekolah_sdrkndung1`,	`nama_sdrkndung2`,	`sekolah_sdrkandung2`,	`nama_sdrkndung3`,	`sekolah_sdrkndung3`,	`bhs_rmh`,	`gol_darah`,	`alamat`,	`no_hp_orangtua`,	`alat_transportasi`,	`jrk_kesekolah`,	`nama_ayah`,	`nama_ibu`,	`pdd_ayah`,	`pdd_ibu`,	`pekerjaan_ayah`,	`pekerjaan_ibu`,	`nama_walisiswa`,	`hbg_klg`,	`pkj_wali`,	`no_telp`) VALUES ('$kode_peserta',	'$nama_peserta',	'$panggilan',	'$nik',	'$jk',	'$tkasal',	'$alamattkasal',	'$tempatlahir',	'$tanggallahir',	'$agama',	'$jmlsodara',	'$sdr1',	'$skolsdr1',	'$sdr2',	'$skolsdr2',	'$sdr3',	'$skolsdr3',	'$bhsrumah',	'$gol',	'$alamat',	'$nohp',	'$transport',	'$jarak',	'$ayah',	'$ibu',	'$pddayah',	'$pddibu',	'$pkjayah',	'$pkjibu',	'$wali',	'$hub',	'$pkjwali',	'$nohpwali')";
			if(mysqli_query($koneksi,$sqlinsert)){
				echo "New Record created succesfully";
				echo '<META http-equiv="refresh" content="1;URL=admin-page.php">';
			}
		
				else{
					echo "Error:". $sqlinsert . "<br>" . mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
			
		}		
	?>
	</div> 
	<div>
      <hr>
      <footer>
        <p>STID Sumenep &copy; 2018</p>
      </footer>
    </div>
	</body>
	
</html>
