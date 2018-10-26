	<?php 
		include ("koneksi.php");
		$id_nilai=$_GET['kd_peserta'];
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
		<div class="container">
		  
		  <div class="hero-unit">
			<form method="post" class="form-search" enctype="multipart/form-data">
			<?php	
				$queryselectbarang="select * from peserta  where kd_peserta='$id_nilai'";
				$resultbarang= mysqli_query($koneksi,$queryselectbarang);
				$row = mysqli_fetch_array($resultbarang, MYSQLI_ASSOC);
				
				if(mysqli_num_rows($resultbarang)== 0){
					echo '<center><h2><font color="red">Data tidak ditemukan</font></h2></center>';
				}else {	
				
				?>
			<h3> Form Edit Data</h3>
			<form class="form-horizontal" method="post">
		   <div class="control-group">
				<label class="control-label>">Kode_Peserta</label>
				<div class="control"><input type="text" name="kode_peserta" readonly value="<?php echo $row['kd_peserta'] ?>" style='color:grey' ></td></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Peserta</label>
				<div class="control"><input type="text" name="nama_peserta" readonly value= "<?php echo $row['nama_peserta']?>"></div>
			</div>
		   <div class="control-group">
				<label class="control-label>">Panggilan</label>
				<div class="control"><input type="text" name="panggilan" readonly value= "<?php echo $row['pangilan']?>"> </div>
			</div>
			 <div class="control-group">
				<label class="control-label>">NIK</label>
				<div class="control"><input type="text" name="nik" readonly value= "<?php echo $row['NIK']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Jenis Kelamin</label>
				<div class="control"><input type="text" name="jk" readonly value= "<?php echo $row['jenis_kelamin']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">TK Asal</label>
				<div class="control"><input type="text" name="tkasal" readonly value= "<?php echo $row['tk_asal']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Alamat TK Asal</label>
				<div class="control"><input type="text" name="alamattkasal" readonly value= "<?php echo $row['alamat_tkasal']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Tempat Lahir</label>
				<div class="control"><input type="text" name="tempatlahir" readonly value= "<?php echo $row['tempat_lahir']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Tanggal Lahir</label>
				<div class="control"><input type="text" readonly name="tanggallahir" </div>
			</div>
			<div class="control-group">
				<label class="control-label>">Agama</label>
				<div class="control"><input type="text" name="agama" readonly value= "<?php echo $row['agama']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Jumlah Saudara Kandung</label>
				<div class="control"><input type="text" name="jmlsodara" readonly value="<?php echo $row['jml_sdrkndung']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Saudara Kandung 1</label>
				<div class="control"><input type="text" name="sdr1" readonly value="<?php echo $row['nama_sdrkndung1']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Sekolah Saudara Kandung 1</label>
				<div class="control"><input type="text" name="skolsdr1" readonly value="<?php echo $row['sekolah_sdrkndung1']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Saudara Kandung 2</label>
				<div class="control"><input type="text" name="sdr2" readonly value="<?php echo $row['nama_sdrkndung2']?>" </div>
			</div>
			<div class="control-group">
				<label class="control-label>">Sekolah Saudara Kandung 2</label>
				<div class="control"><input type="text" name="skolsdr2" readonly value="<?php echo $row['sekolah_sdrkandung2']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Saudara Kandung 3</label>
				<div class="control"><input type="text" name="sdr3" readonly value="<?php echo $row['nama_sdrkndung3']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Sekolah Saudara Kandung 3</label>
				<div class="control"><input type="text" name="skolsdr3" readonly value="<?php echo $row['sekolah_sdrkndung3']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Bahasa Rumah</label>
				<div class="control"><input type="text" name="bhsrumah" readonly value="<?php echo $row['bhs_rmh']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Golongan Darah</label>
				<div class="control"><input type="text" name="gol" readonly value="<?php echo $row['gol_darah']?>"</div>		
				</div>
			<div class="control-group">
				<label class="control-label>">Alamat</label>
				<div class="control"><input type="text" name="alamat" readonly value="<?php echo $row['alamat']?>"></div>
			</div>
			
			<div class="control-group">
				<label class="control-label>">NO HP Orang Tua</label>
				<div class="control"><input type="text" name="nohp" readonly value="<?php echo $row['no_hp_orangtua']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Alat Transportasi</label>
				<div class="control"><input type="text" name="transport" readonly value="<?php echo $row['alat_transportasi']?>"></div>
			</div>
			
			<div class="control-group">
				<label class="control-label>">Jarak Sekolah (Dalam Kilometer)</label>
				<div class="control"><input type="number" name="jarak" readonly value="<?php echo $row['jrk_kesekolah']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Ayah</label>
				<div class="control"><input type="text" name="ayah" readonly value="<?php echo $row['nama_ayah']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Ibu</label>
				<div class="control"><input type="text" name="ibu" readonly value="<?php echo $row['nama_ibu']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Pendidikan Ayah</label>
				<div class="control"><input type="text" name="pddayah" readonly value="<?php echo $row['pdd_ayah']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Pendidikan Ibu</label>
				<div class="control"><input type="text" name="pddibu" readonly value="<?php echo $row['pdd_ibu']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Pekerjaan Ayah</label>
				<div class="control"><input type="text" name="pkjayah" readonly value="<?php echo $row['pekerjaan_ayah']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Pekerjaan Ibu</label>
				<div class="control"><input type="text" name="pkjibu" readonly value="<?php echo $row['pekerjaan_ibu']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Nama Wali Siswa</label>
				<div class="control"><input type="text" name="wali" readonly value="<?php echo $row['nama_walisiswa']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Hubungan Keluarga</label>
				<div class="control"><input type="text" name="hub" readonly value="<?php echo $row['hbg_klg']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">Pekerjaan Wali</label>
				<div class="control"><input type="text" name="pkjwali" readonly value="<?php echo $row['pkj_wali']?>"></div>
			</div>
			<div class="control-group">
				<label class="control-label>">No HP Wali</label>
				<div class="control"><input type="number" name="nohpwali" readonly value="<?php echo $row['no_telp']?>"></div>
			</div>
			<div class="control-group">
				<div class="control">
				  <a class="btn" href="data-siswa.php">Back</a> 
				
				</div>
			</div>
		</form>
				</div>
					</div>
									
					
				</table>
			</form>	
			
			<?php
				}
				
				
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


					$queryupdatebarang="update peserta set kd_peserta='$kode_peserta',
						nama_peserta='$nama_peserta',
						pangilan='$panggilan',
						NIK='$nik',
						jenis_kelamin='$jk',
						tk_asal='$tkasal',
						alamat_tkasal='$alamattkasal',
						tempat_lahir='$tempatlahir',
						tgl_lhr='$tanggallahir',
						agama='$agama',
						jml_sdrkndung='$jmlsodara',
						nama_sdrkndung1='$sdr1',
						sekolah_sdrkndung1='$skolsdr1',
						nama_sdrkndung2='$sdr2',
						sekolah_sdrkandung2='$skolsdr2',
						nama_sdrkndung3='$sdr3',
						sekolah_sdrkndung3='$skolsdr3',
						bhs_rmh='$bhsrumah',
						gol_darah='$gol',
						alamat='$alamat',
						no_hp_orangtua='$nohp',
						alat_transportasi='$transport',
						jrk_kesekolah='$jarak',
						nama_ayah='$ayah',
						nama_ibu='$ibu',
						pdd_ayah='$pddayah',
						pdd_ibu='$pddibu',
						pekerjaan_ayah='$pkjayah',
						pekerjaan_ibu='$pkjibu',
						nama_walisiswa='$wali',
						hbg_klg='$hub',
						pkj_wali='$pkjwali',
						no_telp='$nohpwali'

					where kd_peserta='$kode_peserta'" ;
				if(mysqli_query($koneksi,$queryupdatebarang)){
					echo "Data has been update Succesfully";
					echo("<script>location.href = 'data-siswa.php';</script>");
				}
				else{
					echo "Error". $queryupdatebarang . "<br/>". mysqli_error($koneksi);
				}
				mysqli_close($koneksi);
				}
			?>
		</body>
	</html>