<!DOCTYPE html>
<html>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Laboratorium
            <small>Teknologi Informasi dan Pangkalan Data</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Peminjaman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Input Data Peminjaman</h3>
                </div><!-- /.box-header -->
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

                $photo         = $_FILES['photo']['name'];
                $tmp           = $_FILES['photo']['tmp_name'];

                if(!empty($photo))
               {if(move_uploaded_file("$tmp","surat_peminjaman/$photo"))
               {echo "<img src='surat_peminjaman/$photo' width=100><br>";}
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

               $query = mysqli_query($koneksi, "INSERT INTO peminjaman (id_pinjam, nama_pinjam, unit_pinjam, tgl_mulai, tgl_selesai, jam_mulai, jam_selesai, laboratorium, tujuan_pinjam, hp_pinjam, status, photo) 
               VALUES ('$id_pinjam', '$nama_pinjam','$unit_pinjam','$tgl_mulai','$tgl_selesai','$jam_mulai','$jam_selesai','$laboratorium','$tujuan_pinjam','$hp_pinjam','- waiting -','$photo')");
               if ($query){
	           echo "<script>alert('Data Berhasil Disimpan!'); window.location = 'peminjaman.php'</script>";	
               } else {
	           echo "<script>alert('Data Gagal dimasukan!'); window.location = 'peminjaman.php'</script>";	
               } 
               }
               }
                ?>
                <div class="box-body">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" action="input-peminjaman.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">ID Peminjaman</label>
                              <div class="col-sm-4">
                                  <input name="id_pinjam" type="text" id="id_pinjam" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="P"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
                              <div class="col-sm-4">
                                  <input name="nama_pinjam" type="text" id="nama_pinjam" class="form-control" placeholder="nama penanggung jawab peminjam" autocomplete="off" required='required' />                  
                              </div>                    
						  </div>
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Unit Peminjam</label>
                              <div class="col-sm-4">
                            <input name="unit_pinjam" type="text" id="unit_pinjam" class="form-control"  placeholder="Unit Peminjam" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam Mulai</label>
                              <div class="col-sm-4">
                              <input type=date data-date="" data-date-format="yyyy-mm-dd" name='tgl_mulai' id="tgl_mulai" placeholder='Tanggal Mulai' autocomplete='off' required='required' />
                              
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam Selesai</label>
                              <div class="col-sm-4">
                              <input type=date data-date="" data-date-format="yyyy-mm-dd" name='tgl_selesai' id="tgl_selesai" placeholder='Tanggal Selesai' autocomplete='off' required='required' />
                              
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Mulai</label>
                              <div class="col-sm-4">
                              <input type=time data-time="" data-time-format="mm-hh" name='jam_mulai' id="jam_mulai" placeholder='Jam Mulai' autocomplete='off' required='required' />
                              
                            </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Jam Selesai</label>
                              <div class="col-sm-4">
                              <input type=time data-time="" data-time-format="mm-hh" name='jam_selesai' id="jam_selesai" placeholder='Jam Selesai' autocomplete='off' required='required' />
                              
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Laboratorium</label>
                              <div class="col-sm-4">
                              <select name="laboratorium" id="laboratorium" class="form-control select2" required>
                              <option value=""> --- Pilih Laboratorium --- </option>
                              <?php 
                    $query2="select * from laboratorium order by id_lab";
                    $tampil=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>   	<option value="<?php echo $data1['nama_lab'];?>"><?php echo $data1['id_lab'];?> - <?php echo $data1['nama_lab'];?></option>
						    <?php } ?>
                              
                              </select> 
                            </div>
                          </div>               
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Tujuan Peminjaman</label>
                              <div class="col-sm-4">
                            <input name="tujuan_pinjam" type="text" id="tujuan_pinjam" class="form-control" placeholder="Deskripsi Tujuan Peminjaman" autocomplete="off" required />
                              
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">No HP Peminjam</label>
                              <div class="col-sm-4">
                            <input name="hp_pinjam" type="text" id="hp_pinjam" class="form-control" placeholder="Nomor HP yang bisa dihubungi" autocomplete="off" required />
                              
                            </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Surat Peminjaman</label>
                              <div class="col-sm-8">
                                  <input name="photo" type="file" id="photo" class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf" placeholder="Photo" autocomplete="off" required />
                                  <!-- <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span> -->
                                  <small class="text-muted">Hanya file gambar (jpg, jpeg, png, gif) atau PDF yang diizinkan. Maksimal ukuran file: 1 MB.</small>								 
                              </div>
                          </div>
						  
						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
	                              <a href="input-peminjaman.php" class="btn btn-sm btn-danger">Batal </a>
                              </div>
                          </div>
                      </form>
                  </div>
                </div><!-- /.box-body -->
                <!-- <div class="box-footer clearfix no-border">
                  <a href="#" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Tambah Admin</a>
                </div> -->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>