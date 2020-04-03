<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <?= $this->session->flashdata("error"); ?>
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Edit Data</h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Edit data Barang</li>
                         </ol>

                    </div>
               </div>
          </div><!-- /.container-fluid -->
     </section>
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-6">
                         <div class="card card-primary">
                              <div class="card-header">
                                   <h3 class="card-title">Barang</h3>
                              </div>
                              <?= form_open_multipart(); ?>
                              <input type="hidden" name="id" value="<?= $inventaris['id']; ?>">
                              <div class=" card-body">
                                   <div class="form-group">
                                        <label for="barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="barang" name="barang" value="<?= $inventaris['nama_barang']; ?>" placeholder="Nama Barang">
                                        <?= form_error('Barang', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="nama">Nama Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $inventaris['penanggung_jawab']; ?>" placeholder="Nama Penanggung Jawab">
                                        <?= form_error('Nama', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                  
                              
                                   <div class="form-group">
                                        <label for="datetimepicker">Tanggal Pembelian</label>
                                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                             <input type="text" class="form-control datetimepicker-input" name="pembelian" value="<?= $inventaris['tgl_beli']; ?>" data-target="#datetimepicker" />
                                             <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                             </div>
                                        </div>
                                        <?= form_error('Pembelian', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <!-- /.form group -->
                                   <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <select class="form-control select2" id="kategori" name="kategori" style="width: 100%;">
                                             <?php foreach ($kategori as $kat) { ?>
                                                  <option value="<?= $kat['id']; ?>" <?php if ($kat['id'] == $inventaris['id_kategori']) {
                                                                                          echo 'selected';
                                                                                     } ?>><?= $kat['nama_kategori']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <select class="form-control select2" id="jenis" name="jenis" style="width: 100%;">
                                             <?php foreach ($jenis as $jen) { ?>
                                                  <option value="<?= $jen['id']; ?>" <?php if ($jen['id'] == $inventaris['id_jenis']) {
                                                                                          echo 'selected';
                                                                                     } ?>><?= $jen['nama_jenis']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('Jenis', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="Kondisi">Kondisi</label>
                                        <select class="form-control select2" id="Kondisi" name="kondisi" style="width: 100%;">
                                             <?php foreach ($kondisi as $kon) { ?>
                                                  <option value="<?= $kon['id']; ?>" <?php if ($kon['id'] == $inventaris['id_kondisi']) {
                                                                                          echo 'selected';
                                                                                     } ?>><?= $kon['nama_kondisi']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('Kondisi', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="produk">Harga</label>
                                        <input type="text" class="form-control" id="Harga" value="<?= $inventaris['harga']; ?>" name="harga" data-a-sign="Rp. " data-a-sep="." placeholder="Harga">
                                   </div>

                                   <div class="form-group">
                                        <label for="exampleInputFile">Foto Barang</label>
                                        <div class="input-group">
                                             <div class="custom-file">
                                                  <input type="file" class="custom-file-input" value="<?= $inventaris['img']; ?>" name="image" id="exampleInputFile">
                                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                             </div>
                                             <div class="input-group-append">
                                                  <span class="input-group-text" id="">Upload</span>
                                             </div>
                                        </div>
                                        <?= form_error('Image', '<small class="text-danger">', '</small>') ?>
                                   </div>
                              </div>
                              <div class="card-footer text-right">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                         </div>

                    </div>
                    <!-- /.card-body -->

                    <?= form_close(); ?>
                    <div class="col-6">
                         <div class="card card-primary">
                              <div class="card-header">
                                   <h3 class="card-title">Photos</h3>
                              </div>
                              <div class="card-body">
                                   <div class="row">
                                        <div class="col-md-6 offset-3">
                                             <label for="">
                                                  <h6>Foto</h6>
                                             </label>
                                             <img src="<?= base_url() . 'uploads/' . $inventaris['img'] ?>" class='img-fluid'>
                                        </div>
                                   </div>
                                   <div class="row mt-2">
                                        <div class="col-md-6 offset-3">
                                             <label for="">
                                                  <h6>QR Code</h6>
                                             </label>
                                             <img src="<?= base_url() . 'uploads/' . $inventaris['img_code'] ?>" class='img-fluid'>
                                        </div>
                                   </div>


                              </div>
                         </div>
                    </div>

                    <!-- /.card -->
               </div>


     </section>

</div>
<!-- /.content-wrapper -->
<!-- Select2 -->
<script src="<?php echo base_url('asset/plugins/select2/js/select2.full.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!--moment.js-->
<script src="<?php echo base_url('asset/plugins/moment/moment.min.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!--auto numeric.js-->
<script src="<?php echo base_url('asset/plugins/autonumeric/autoNumeric.js') ?>"></script>
<script>
     $(document).ready(function() {
          $('#Harga').autoNumeric('init', {
               aDec: null,
               mDec: '0'
          });
          //Initialize Select2 Elements
          $('.select2').select2()

          //Initialize Select2 Elements
          $('.select2').select2({
               theme: 'bootstrap4'
          })
          bsCustomFileInput.init();
     });
     $(document).keyup(function() {

          $('#Harga').autoNumeric('init', {
               aDec: null,
               mDec: '0'
          });
     });
     $(function() {
          $('.datetimepicker').each(function() {
               const val = $(this).val();
               $(this).datetimepicker();
               $(this).val(val);
          });
     });
</script>