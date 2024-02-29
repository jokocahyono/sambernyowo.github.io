<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
	<link href='img/uin.jpg'  rel='shortcut icon'>
	<title>Laboratorium PTIPD</title>
		
  </head>

  <body class="hold-transition">
  <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow fixed-top">
      <div class="container">
	    <img src="img/uin.png  " width="40px" class="mr-2" href="#jumbotron">
        <a class="navbar-brand" href="index.php">      Sambernyowo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
           
          </ul>
        </div>
      </div>  
  </nav>
    <!-- Akhir Navbar -->
   			
<!-- jadwal -->
    <section id="jadwal" >	
	<div class="container">
        <div class="row text-center mb-3">
          <div class="col-mb-3">
		  <p><br/><br/></p> 
            <h2></h2>
			<h2></h2>
			<h2>Data Pengajuan Peminjaman Ruang Laboratorium</h2>
          </div>
        </div>	
	 <table id="example" class="table table-responsive table-hover table-bordered">	              
				   <thead class="thead-dark">
                      <tr>					     
                        <th><center>Nama Peminjam </center></th>
                        <th><center>Unit </center></th>
						<th><center>Tgl Pinjam </center></th>
						<th><center>Jam Pinjam</center></th>						
						<th><center>Laboratorium </center></th>
						<th><center>Kegiatan </center></th>						
						<th><center>Status </center></th>	
						<th><center>Tanggal Pengajuan </center></th>
                      </tr>
                  </thead>
				  
				 <?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from peminjaman where status = '- waiting -' order by tgl_pengajuan asc, jam_pengajuan asc");
		while($d = mysqli_fetch_array($data)){  
			?>
			<tr>				
				<td><?php echo $d['nama_pinjam']; ?></td>
				<td><?php echo $d['unit_pinjam']; ?></td>
				<td><center><?php echo date("d M Y", strtotime($d['tgl_mulai'])); ?><br/>s/d<br/><?php echo date("d M Y", strtotime($d['tgl_selesai'])); ?></center></td>
				<td><center><?php echo date("H:i", strtotime($d['jam_mulai'])); ?><br/>s/d<br/><?php echo date("H:i", strtotime($d['jam_selesai'])); ?></center></td>
				<td><center><?php echo $d['laboratorium']; ?></center></td>
				<td><?php echo $d['tujuan_pinjam']; ?></td>
				<td><?php echo $d['status']; ?></td>
				<td><center><?php echo date("d M Y", strtotime($d['tgl_pengajuan'])); ?><br/><?php echo date("H:i", strtotime($d['jam_pengajuan'])); ?></center></td>
			</tr>	
			<?php 
		}
		?>
	 </table>			  
	</div>
	</div>
	</div>	
	
      
        <div class="row justify-content-center text-center">
          <div class="col-8">
            <p>----------------------------------</p>
			<a href="index.php" class="btn btn-success mb-3">Kembali</a>
          </div>
        </div>		
      </div>
    </section>
<!-- Akhir jadwal -->         
    	


  </body>
</html>

