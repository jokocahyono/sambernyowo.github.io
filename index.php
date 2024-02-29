<!doctype html>
<html lang="en">
<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;

keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
	return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
   
if (key == 13) {
	var i;
	for (i = 0; i < field.form.elements.length; i++)
		if (field == field.form.elements[i])
			break;
	i = (i + 1) % field.form.elements.length;
	field.form.elements[i].focus();
	return false;
	};
// else return false
return false;
}
</script>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
	<link href='img/uin.jpg'  rel='shortcut icon'>
	<title>Laboratorium PTIPD</title>
		
  </head>

  <body>
    <h1>Sambernyowo</h1>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->	
	<!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow fixed-top">
      <div class="container">
	    <img src="img/uin.png  " width="40px" class="mr-2" href="#home">
        <a class="navbar-brand" href="#home">      Sambernyowo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#jadwal">Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#fasilitas">Fasilitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#testimoni">Testimoni</a>
            </li>
			<li class="nav-item">
              <a class="nav-link active" href="mas.php">Data Pengajuan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#pengajuan">Peminjaman</a>
            </li>			
			<li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>  
  </nav>
    <!-- Akhir Navbar -->

<!-- Home -->
    <section id="home">
        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-mb-3"> 
            <p><br><br></p> 			
              <img src="img/uin.png" alt="Sambernyowo" width="auto"/>
              <h1 class="display-4 fw-bold"></br>Sambernyowo</h1>
              <p class="lead">The Digitals </p>         
            </div>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#BAFFC0" fill-opacity="1" d="M0,256L48,250.7C96,245,192,235,288,224C384,213,480,203,576,208C672,213,768,235,864,213.3C960,192,1056,128,1152,106.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
<!-- Akhir home -->

<!-- jadwal -->
    <section id="jadwal" >	
	<div class="container">
        <div class="row text-center mb-3">
          <div class="col">
		  <p><br><br></p> 
            <h2>Jadwal</h2>
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
                      </tr>
                  </thead>
				  
				 <?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from peminjaman where status = 'Disetujui'");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['nama_pinjam']; ?></td>
				<td><?php echo $d['unit_pinjam']; ?></td>
				<td><center><?php echo $d['tgl_mulai']; ?>  s/d  <?php echo $d['tgl_selesai']; ?></center></td>
				<td><center><?php echo $d['jam_mulai']; ?>  s/d  <?php echo $d['jam_selesai']; ?></center></td>
				<td><center><?php echo $d['laboratorium']; ?></center></td>
				<td><?php echo $d['tujuan_pinjam']; ?></td>
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
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#7CEC87" fill-opacity="1" d="M0,128L48,149.3C96,171,192,213,288,213.3C384,213,480,171,576,144C672,117,768,107,864,101.3C960,96,1056,96,1152,106.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
<!-- Akhir jadwal -->

<!-- Desain -->
    <section id="fasilitas">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col mb-3">
		  <p><br><br></p> 
            <h2>Fasilitas</h2>
          </div>
          <div class="row justify-content-center text-black">
            <div class="col-md-4 mb-3">
                <div class="card">
                  <img src="img/fas1.jpg" alt="Fasilitas 1">
                  <div class="img-title">
                    <h4>Ruangan Megah</h4>
                    <p>Ruangan dirancang untuk kenyamanan</p>
                  </div>
                </div> 
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                  <img src="img/fas2.jpg" alt="Fasilitas 2">
                  <div class="img-title">
                    <h4>Videotron</h4>
                    <p>Dilengkapi dengan perangkat visual Video Led Display</p>
                  </div>
                </div> 
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                  <img src="img/fas6.jpg" alt="Fasilitas 3">
                  <div class="img-title">
                     <h4>Speaker JBL</h4>
                    <p>Untuk kualitas audio yang tidak mengecewakan</p>
                  </div>
                </div> 
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                  <img src="img/fas4.jpg" alt="Fasilitas 4">
                  <div class="img-title">
                    <h4>Digital Loudness Management System</h4>
                    <p>Control system kelas premium</p>
                  </div>
                </div> 
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                  <img src="img/fas5.jpg" alt="Fasilitas 5">
                  <div class="img-title">
                    <h4>Air Conditioner</h4>
                    <p>Ruangan sejuk dan nyaman untuk beraktivitas. </p>
                  </div>
                </div> 
            </div>        
          </div>          
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#baffc0" fill-opacity="1" d="M0,160L48,181.3C96,203,192,245,288,234.7C384,224,480,160,576,149.3C672,139,768,181,864,197.3C960,213,1056,203,1152,192C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> 
    </section>
<!-- Akhir Desain -->

<!-- Testimoni -->
    <section id="testimoni">
        <div class="container">
            <div class="row text-center mb-3">
              <div class="col">
			  <p><br><br></p> 
                <h2>Testimoni</h2>
              </div>
            </div>
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row justify-content-center text-center">
                      <div class="col-6">
                        <img src="img/tes2.jpg" alt="avatar1" width="500">
                        <p><br>"Mengukuhkan Kolaborasi Eduroam: UIN Walisongo Semarang dan UIN Raden Mas Said Surakarta Menyatukan Visi Pendidikan Islam Berbasis Teknologi Informasi"</br>
						   </br>November 2023, kunjungan bencmarking yang penuh antusias dari Universitas Islam Negeri (UIN) Walisongo Semarang ke Universitas Islam Negeri (UIN) Raden Mas Said Surakarta. Kunjungan tersebut membahas agenda utama, yaitu menguatkan kolaborasi dalam mengembangkan layanan eduroam, sebuah infrastruktur tak tergantikan bagi konektivitas dan akses pengetahuan di kalangan komunitas akademik.
                                Kedua universitas ini bersemangat dalam memajukan layanan eduroam. Mereka tidak hanya berbagi gagasan, tetapi juga menjelajahi teknologi terdepan yang akan mengubah cara kita mengakses pengetahuan dan pendidikan di kalangan akademisi perguruan tinggi Islam. Dr. Lulu Choirun Nisa, Kepala TIPD sekaligus pemimpin tim IT dari UIN Walisongo, menegaskan, “Kolaborasi antar-universitas Islam ini sangat penting untuk memberi akses pendidikan yang lebih luas dan meningkatkan mobilitas akademik bagi mahasiswa, dosen, dan peneliti.”
                                Ditambahkan oleh Dr. Abdul Matin Bin Salman, “Kunjungan dari UIN Walisongo membuka pintu bagi pertukaran pengalaman yang akan memperkuat infrastruktur teknologi informasi di kedua universitas dan meningkatkan kualitas layanan bagi seluruh komunitas akademik.”</p>
                      </div>
                    </div>
                  </div>  
                  <div class="carousel-item">
                    <div class="row justify-content-center text-center">
                      <div class="col-6">
                        <img src="img/tes1.jpg" alt="avatar1" width="500">
                        <p><br>"Kunjungan Tim TIPD UUIN Walisongo"</br>
						   </br>Dalam momen wawancara yang penuh semangat, Agus Riyanto, atau Agus Virus dari Tim TIPD Surakarta, berbagi pandangan tentang betapa pentingnya eduroam bagi semua institusi pendidikan. “Kami saling mendukung dan berbagi ide kreatif yang akan mendorong inovasi di kedua UIN ini,” ungkapnya dengan semangat.
                                Kunjungan yang mengesankan ini tak hanya membahas tentang teknologi, tetapi juga semangat untuk berbagi, mendukung, dan mendorong evolusi teknologi informasi di dunia pendidikan. Diskusi teknis, tour fasilitas IT kampus, workshop, dan sesi tanya jawab turut memperdalam pemahaman tentang manfaat eduroam secara praktis.
                                Kunjungan benchmarking ini bukan hanya mengukuhkan kemitraan antara Tim TIPD UIN Walisongo dan Tim TIPD UIN Raden Mas Said, tetapi juga merupakan langkah nyata dalam memajukan teknologi informasi pendidikan yang inklusif dan berkelanjutan di Indonesia.
                                Sesi kenjungan berakhir setelah tour fasilitas. Semangat kolaborasi ini terabadikan dalam sebuah foto bersama sebagai simbol tekad kebersamaan dalam menggerakkan inovasi pendidikan berbasis IT di kedua perguruan tinggi Islam tersebut.</p>
                      </div>
                    </div>  
                  </div>    
                  <div class="carousel-item">
                    <div class="row justify-content-center text-center">
                      <div class="col-6">
                        <img src="img/tes3.jpg" alt="avatar1" width="500">
                       <p><br>"Ruangan Sambernyowo"</br>
					      </br>Kunjungan yang mengesankan ini tak hanya membahas tentang teknologi, tetapi juga semangat untuk berbagi, mendukung, dan mendorong evolusi teknologi informasi di dunia pendidikan. Diskusi teknis, tour fasilitas IT kampus, workshop, dan sesi tanya jawab turut memperdalam pemahaman tentang manfaat eduroam secara praktis.
                                Kunjungan benchmarking ini bukan hanya mengukuhkan kemitraan antara Tim TIPD UIN Walisongo dan Tim TIPD UIN Raden Mas Said, tetapi juga merupakan langkah nyata dalam memajukan teknologi informasi pendidikan yang inklusif dan berkelanjutan di Indonesia.
                                Sesi kenjungan berakhir setelah tour fasilitas. Semangat kolaborasi ini terabadikan dalam sebuah foto bersama sebagai simbol tekad kebersamaan dalam menggerakkan inovasi pendidikan berbasis IT di kedua perguruan tinggi Islam tersebut.</p>
                      </div>
                    </div>                
                  </div>                 
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#BAFFC0" fill-opacity="1" d="M0,256L48,250.7C96,245,192,235,288,224C384,213,480,203,576,208C672,213,768,235,864,213.3C960,192,1056,128,1152,106.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </section>
<!-- Akhir Testimoni -->

<!-- pengajuan -->
    <section id="pengajuan">
      <div class="container">
        <div class="row text-center mb-8">
          <div class="col">
		  <p><br><br></p> 
            <h1>Peminjaman</h1>
			<h3>------------------------</h3>
          </div>
        </div>		
        <div class="row justify-content-left">
          <div class="col">
		  <p><br><br></p> 
            <p>1. PTIPD menetapkan persyaratan dan tata cara peminjaman ruang laboratorium Digital PTIPD.</p>
			<p>2. Peminjaman pada jam operasional kantor, yaitu jam 06.00-18.00 wib dan dibagi menjadi dua kategori : Half Day (06.00-12.00 wib) dan Full Day (06.00-18.00 wib).</p>
			<p>3. Unit atau pihak peminjam ruang laboratorium Digital PTIPD menetapkan satu orang sebagai PIC atau penanggung jawab.</p>
			<p>4. Sebelum peminjaman, PIC dari pihak peminjam mengajukan peminjaman dengan mengunggah surat resmi peminjaman ruang laboratorium Digital PTIPD.</p>
			<p>5. PTIPD berhak menerima permohonan peminjaman atau menolak permohonan peminjaman.</p>
			<p>6. PIC atau peminjam ruang laboratorium Digital PTIPD bertanggung jawab penuh selama peminjaman apabila terjadi kerusakan dan atau apabila terjadi kehilangan peralatan laboratorium.</p>
			<p>7. Pihak PTIPD dengan PIC peminjam melakukan pengecekan bersama terhadap kelengkapan, jumlah dan keadaan perangkat sarana prasarana ruang laboratorium Digital kemudian dilakukan serah terima saat mulai peminjaman dan saat pengembalian.</p>
		  <p><br><br></p> 	
          </div>
		  <div class="modal-footer">
		     <button type="submit" class="btn btn-primary mb-3"><a href="https://api.whatsapp.com/send?phone=6282243683204" class="text-white text-decoration-none">Kirim</a></button>
		     <!-- Button trigger modal -->
             <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
             Pengajuan Peminjaman Ruang
             </button>
		  </div> 	  
		  
        </div>      
      </div>   
    </section>
<!-- Akhir pengajuan -->

<style>
    .form-group.row:not(:first-child) {
        margin-top: 10px; /* Sesuaikan dengan jumlah jarak yang Anda inginkan */
    }
</style>

<!-- Simpan data -->
                <?php
                if(isset($_POST['simpan'])){
                $id_pinjam     = $_POST['id_pinjam'];
                $nama_pinjam   = $_POST['nama_pinjam'];
                $unit_pinjam   = $_POST['unit_pinjam'];
                $tgl_mulai     = $_POST['tgl_mulai'];
                $tgl_selesai   = $_POST['tgl_selesai'];
                $jam_mulai     = $_POST['jam_mulai'];
                $jam_selesai   = $_POST['jam_selesai'];
                $laboratorium  = $_POST['laboratorium'];
                $tujuan_pinjam = $_POST['tujuan_pinjam'];
                $hp_pinjam     = $_POST['hp_pinjam'];
				// $tgl_pengajuan = $_POST[''];
				// $hp_pinjam     = $_POST['hp_pinjam'];

                $photo         = $_FILES['photo']['name'];
                $tmp           = $_FILES['photo']['tmp_name'];

                if(!empty($photo))
               {if(move_uploaded_file("$tmp","admin/surat_peminjaman/$photo"))
               {echo "<img src='admin/surat_peminjaman/$photo' width=100><br>";}
                else
               {echo "gagal upload";}
                }

               $maxFileSize = 1 * 1024 * 1024; // 1 MB

               if ($_FILES['photo']['size'] > $maxFileSize) {
               echo "Ukuran file melebihi batas maksimal (1 MB).";
               // Atau atur pesan kesalahan dan kembalikan pengguna ke formulir
               } else 
               {
               // Lanjutkan dengan pemrosesan formulir jika ukuran file memenuhi syarat

               $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_pinjam, nama_pinjam, unit_pinjam, tgl_mulai, tgl_selesai, jam_mulai, jam_selesai, laboratorium, tujuan_pinjam, hp_pinjam, status, photo, tgl_pengajuan, jam_pengajuan, keterangan) 
               VALUES ('$id_pinjam', '$nama_pinjam','$unit_pinjam','$tgl_mulai','$tgl_selesai','$jam_mulai','$jam_selesai','$laboratorium','$tujuan_pinjam','$hp_pinjam','- waiting -','$photo', now(), now(),'-')");
               if ($query){
	           echo "<script>alert('Data Berhasil Disimpan!'); window.location = 'mas.php'</script>";	
               } else {
	           echo "<script>alert('Data Gagal Disimpan!'); </script>";	
               } 
               }
               }
                ?>
<!-- Akhir simpan data -->

<!-- Awal Modal Login-->
<div class="modal fade" id="modallogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
		</div>	
	</div>
</div>	
<!-- Akhir Modal Login-->			
       
<!-- Awal Modal tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Data Peminjam</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="index.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
				    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-right control-label">Nomor Peminjaman</label>
                        <div class="col-sm-2">
                          <input type="text" class="form-control" id="id_pinjam" name="id_pinjam" value="<?php $a="P"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                        </div>
					</div>
                    <div class="form-group row">
                        <label for="nama_pinjam" class="col-sm-4 col-form-label text-right">Nama Peminjam</label>
                        <div class="col-sm-7">
                          <input type="text" class="form-control" id="nama_pinjam" name="nama_pinjam" placeholder="Nama Peminjam" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="unit_pinjam" class="col-sm-4 col-form-label text-right">Unit</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" id="unit_pinjam" name="unit_pinjam" placeholder="Unit Peminjam" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_mulai" class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                        <div class="col-sm-3">
                          <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" autocomplete="off" required>						  
                        </div>
						<div class="col-sm-1 text-center">
                          <p class="m-2">-</p>
                        </div>
                        <div class="col-sm-3">
                          <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" autocomplete="off" required>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="jam_mulai" class="col-sm-4 col-form-label">Jam Pinjam</label>
                        <div class="col-sm-2">
                          <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" autocomplete="off" required>
                        </div>
						<div class="col-sm-1 text-center">
                          <p class="m-2">-</p>
                        </div>
                        <div class="col-sm-2">
                          <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" autocomplete="off" required>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="laboratorium" class="col-sm-4 col-form-label">Laboratorium</label>
                        <div class="col-sm-5">
                            <div class="col-sm-18">
                              <select id="laboratorium" name="laboratorium" class="form-control select2" required> 
                              <option value=""> --- Pilih Laboratorium --- </option>
                                <?php 
                                $query2="select * from laboratorium order by id_lab";
                                $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                                while($data1=mysqli_fetch_array($tampil))
                                {
                                ?>   	
								<option value="<?php echo $data1['nama_lab'];?>"><?php echo $data1['id_lab'];?> - <?php echo $data1['nama_lab'];?></option>
						        <?php 
								} 
								?>
                              </select> 
                            </div>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="tujuan_pinjam" class="col-sm-4 col-form-label">Kegiatan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="tujuan_pinjam" name="tujuan_pinjam" placeholder="Uraian singkat kegiatan" autocomplete="off" required>
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="hp_pinjam" class="col-sm-4 col-form-label">Nomor HP</label>
                        <div class="col-sm-7">
                            <input type="text" size="3" maxlength="15" onKeyPress="return goodchars(event,'0123456789',this)" class="form-control" id="hp_pinjam" name="hp_pinjam" placeholder="Nomor HP yang bisa dihubungi untuk koordinasi" autocomplete="off" required>							
                        </div>
                    </div>
					<div class="form-group row">
                        <label for="photo" class="col-sm-4 col-form-label">Surat Peminjaman</label>
                        <div class="col-sm-7">
                             <input type="file" id="photo" name="photo" class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf" autocomplete="off" required />
                             <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                             <small class="text-muted">Hanya file gambar (jpg, jpeg, png, gif) atau PDF yang diizinkan. Maksimal ukuran file: 1 MB.</small>								 
                        </div>
                    </div>
					<div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>	                      
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal tambah-->
	
<!-- Footer -->
    <footer class="bg-success text-white p-3">
      <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                JChe
            </div>
            <div class="col text-end">
                powered by <a href="htps://www.gamelab.id/" class="text-white">ptipd</a>
            </div>
        </div>
      </div>
    </footer>
<!-- Akhir Footer -->

  </body>
</html>

