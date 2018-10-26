<?php 
session_start();
	/*
	if(!isset($_SESSION['LEVEL_ADMIN'])){
		header("Location: loginadmin.php");
	}*/
include("koneksi.php");
mysql_connect("localhost","root","");
mysql_select_db("sdit_sumenep");
//Fungsi autonumber




?>
<!DOCTYPE html>
<html>
<head>

	<title>Nilai</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="metro.min.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* width */
::-webkit-scrollbar {
    width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: red; 
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #b30000; 
}
$(document).ready(function () {
  $('#dtHorizontalVerticalExample').DataTable({
    "scrollX": true,
    "scrollY": 200,
  });
  $('.dataTables_length').addClass('bs-select');
});
</style>
</head>    
<body>
<script src="selectharga.js"></script>
	<div class="container theme-showcase" role="main" >
	 <script>
		function delet(nomor,nama_peserta){
		tanya = confirm("Yakin delete dengan nama: "+nama_peserta);
		if(tanya == 1){
        window.location.href="delete-nilai.php?id_nilai="+nomor;
			}
		}
		</script>
		<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
		
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		
          <ul class="nav navbar-nav">
		  
            <li ><a href="data-siswa.php">Home</a></li>
            <li class="active"><a href="nilai-siswa.php">Nilai Siswa</a></li>
            
            <li class="dropdown">
             
			  <?php 
	
	
	?>
              
            </li>
			<?php
			
            
			?>
          </ul>
		  
		   <?php
		   
		   	include ("koneksi.php");
		  
		?><?php
		   if(isset($_SESSION['LEVEL_ADMIN'])){
		   	echo "<div class='btn-group navbar-form pull-right'>
			<a class='btn btn-primary' href='#'><i class='icon-user icon-white'></i>ADMIN </a> 
			<a class='btn btn-primary dropdown-toggle' data-toggle='dropdown' href='#'><span class='caret'></span></a>
			<ul class='dropdown-menu'>
			<li><a href='logout.php'><i class'icon-off'></i> Logout</a></li>
			</ul>
        </div>
		  ";
		   }
		?>
		
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<h1>Daftar Nama Peserta:</h1>
	
	<div class="table-wrapper-scroll-y">
	<table class="table table-bordered table-striped >
		<tr align="center">
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
		<td colspan="2" align="center">Action</td>
		</tr>
		
		
		
	<?php
	$no=1;
	$queryselecttransaksi="select a.id_nilai, a.kd_peserta,b.nama_peserta,a.nama_petugas,a.tanggal_input,a.psikologi,a.alquran,a.akademik,a.nilai_rata from sistem_psb a inner join peserta b on a.kd_peserta = b.kd_peserta";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
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
					if(isset($_SESSION['LEVEL_ADMIN'])){
		
	
				echo "<td><a href='edit-nilai.php?id_nilai=$row[id_nilai]'><img src='icon_modul_5/edit.png'style='width:30px;height:30px'/></a></td> ";
				echo "<td><a href=\"javascript: delet('".$row['id_nilai']."','".$row['nama_peserta']."')\"><img src='icon_modul_5/delete.png'style='width:30px;height:30px'/></a></td></tr>";
					} else {
						echo "<td><a href='loginadmin.php'>login dulu </a> </td>";
					}
						
				$no++;
			}
	
	?>
	</tr>
	
	</table>
	</div>
	</div>
	</body>
	</html>
