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
			if(mysqli_num_rows($resultbarang) == 0){
				echo '<center><h2><font color="red">Data tidak ditemukan</font></h2></center>';
			}else {	
			
			
			?>
		<h3>Jadwal Ujian</h3>
		
		<div id="html-2-pdfwrapper">
		<table class="table table-hover">
				<td align="center">No.</td>
		<td align="center">Kode peserta</td>
		<td align="center">nama peserta</td>
		<td align="center">panggilan</td>
		<td align="center">NIK</td>
		<td align="center">jenis kelamin</td>
		
					<?php
					
					$no=1;
			
			while($row=mysqli_fetch_array($resultbarang,MYSQLI_ASSOC)){
					echo"<tr align='center'>";
				echo"<td>".$no."</td>";
				echo"<td>". $row["kd_peserta"] . "</td>";
				echo"<td>". $row["nama_peserta"] . "</td>";
				echo"<td>". $row["pangilan"] . "</td>";
				echo"<td>". $row["NIK"] . "</td>";
				echo"<td>". $row["jenis_kelamin"] . "</td>";
				
				$no++;
				
					}
			}
			
			
		?>
					
					</tr>
			</table>
			 

		
			</form>	
			<table class="table table-hover" align="center">
			
		<td align="center">Senin</td>
		<td align="center">Selasa</td>
		<td align="center">Rabu</td>
		<tr align='center'>
		<td align="center">Al Qur'an</td>
		<td align="center">Psikologi</td>
		<td align="center">Bahasa Inggris</td>
	</tr>
</table>
<button onclick="generate()" class="btn">Cetak PDF</button>

		</body>

<script src='dist/jspdf.min.js'></script>

<script>
var base64Img = null;
imgToBase64('octocat.jpg', function(base64) {
    base64Img = base64; 
});

margins = {
  top: 70,
  bottom: 40,
  left: 30,
  width: 550
};

generate = function()
{
	var pdf = new jsPDF('p', 'pt', 'a3');
	pdf.setFontSize(10);
	pdf.fromHTML(document.getElementById('html-2-pdfwrapper'), 
		margins.left, // x coord
		margins.top,
		{
			// y coord
			width: margins.width// max width of content on PDF
		},function(dispose) {
			headerFooterFormatting(pdf, pdf.internal.getNumberOfPages());
			pdf.save('Test.pdf');
		}, 
		margins);
	
		/*
	var iframe = document.createElement('iframe');
	iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:650px; padding:20px;');
	document.body.appendChild(iframe);
	
	iframe.src = pdf.output('datauristring');*/
	
	
};
function headerFooterFormatting(doc, totalPages)
{
    for(var i = totalPages; i >= 1; i--)
    {
        doc.setPage(i);                            
        //header
        header(doc);
        
        footer(doc, i, totalPages);
        doc.page++;
    }
};

function header(doc)
{
    doc.setFontSize(18);
    doc.setTextColor(40);
    doc.setFontStyle('normal');
	
    if (base64Img) {
       doc.addImage(base64Img, 'JPEG', margins.left, 10, 40,40);        
    }
	    
    doc.text("Jadwal Ujian", margins.left + 50, 40 );
	doc.setLineCap(2);
	doc.line(10, 70, margins.width + 43,70); // horizontal line
};

// You could either use a function similar to this or pre convert an image with for example http://dopiaza.org/tools/datauri
// http://stackoverflow.com/questions/6150289/how-to-convert-image-into-base64-string-using-javascript
function imgToBase64(url, callback, imgVariable) {
 
    if (!window.FileReader) {
        callback(null);
        return;
    }
    var xhr = new XMLHttpRequest();
    xhr.responseType = 'blob';
    xhr.onload = function() {
        var reader = new FileReader();
        reader.onloadend = function() {
			imgVariable = reader.result.replace('text/xml', 'image/jpeg');
            callback(imgVariable);
        };
        reader.readAsDataURL(xhr.response);
    };
    xhr.open('GET', url);
    xhr.send();
};

function footer(doc, pageNumber, totalPages){

    var str = "Page " + pageNumber + " of " + totalPages
   
    doc.setFontSize(10);
    doc.text(str, margins.left, doc.internal.pageSize.height - 20);
    
};

 </script>
	</html>