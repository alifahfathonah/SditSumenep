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
	<title>Data Peserta</title>
	
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
		function delet(kd_peserta,nama_peserta){
		tanya = confirm("Yakin delete dengan nama: "+nama_peserta);
		if(tanya == 1){
        window.location.href="delete-siswa.php?kd_peserta="+kd_peserta;
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
            <li class="active"><a href="data-siswa.php">Home</a></li>
            <li ><a href="nilai-siswa.php">Nilai Siswa</a></li>
            <li><a href="form-registrasi.php">Registrasi Siswa</a></li>
            <li class="dropdown">
             
			  <?php 
	
	if(!isset($_SESSION['LEVEL'])){
		echo "<li><a href='loginadmin.php'>login</a></li>";
	}
	?>
              
            </li>
			
          </ul>
		   <?php
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
	<form action="search.php" method="GET" align ="right">
    <input type="text" name="nama_peserta" />
    <input type="submit" value="Search" />
	</form>
	
	<div class="table-wrapper-scroll-y">
	<table class="table table-bordered table-striped >
		<tr align="center">
		<td align="center">No.</td>
		<td align="center">Kode peserta</td>
		<td align="center">nama peserta</td>
		<td align="center">panggilan</td>
		<td align="center">NIK</td>
		<td align="center">jenis kelamin</td>
		<td align="center">tk asal</td>
		<td align="center">alamat tkasal</td>
		<td align="center">tempat lahir</td>
		<td align="center">tgl lhr</td>
		<td align="center">agama</td>
		

		
		
		<td colspan="1" align="center">Action</td>
		</tr>
		
		
		
	<?php
	$no=1;
	$queryselecttransaksi="SELECT * FROM `peserta`";
	$resultquery=mysqli_query($koneksi,$queryselecttransaksi);
	while($row=mysqli_fetch_array($resultquery,MYSQLI_ASSOC)){
				echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row["kd_peserta"] . "</td>";
				echo"<td>". $row["nama_peserta"] . "</td>";
				echo"<td>". $row["pangilan"] . "</td>";
				echo"<td>". $row["NIK"] . "</td>";
				echo"<td>". $row["jenis_kelamin"] . "</td>";
				echo"<td>". $row["tk_asal"] . "</td>";
				echo"<td>". $row["alamat_tkasal"] . "</td>";
				echo"<td>". $row["tempat_lahir"] . "</td>";
				echo"<td>". $row["tgl_lhr"] . "</td>";
				echo"<td>". $row["agama"] . "</td>";
				

				
				echo "<td><a href='detail-siswa.php?kd_peserta=$row[kd_peserta]'><img src='icon_modul_5/detail.png'style='width:30px;height:30px'/></a></td> ";
				
				$no++;
			}
	
	?>
	</tr>
	
	</table>
	</div>
	</div>
	</body>
	</html>
