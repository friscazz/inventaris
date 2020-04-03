<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <?= $this->session->flashdata("error"); ?>
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Tambah Data</h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active">Tambah data Barang</li>
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
                              <div class=" card-body">
                                   <div class="form-group">
                                        <label for="barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="barang" name="barang" placeholder="Nama Barang">
                                        <?= form_error('Barang', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="nama">Nama Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penanggung Jawab">
                                        <?= form_error('Nama', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   
                                   
                                   <div class="form-group">
                                        <label for="datetimepicker">Tanggal Pembelian</label>
                                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">
                                             <input type="text" class="form-control datetimepicker-input" name="pembelian" data-target="#datetimepicker" />
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
                                                  <option value="<?= $kat['id']; ?>"><?= $kat['nama_kategori']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <select class="form-control select2" id="jenis" name="jenis" style="width: 100%;">
                                             <?php foreach ($jenis as $jen) { ?>
                                                  <option value="<?= $jen['id']; ?>"><?= $jen['nama_jenis']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('Jenis', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="Kondisi">Kondisi</label>
                                        <select class="form-control select2" id="Kondisi" name="kondisi" style="width: 100%;">
                                             <?php foreach ($kondisi as $kon) { ?>
                                                  <option value="<?= $kon['id']; ?>"><?= $kon['nama_kondisi']; ?></option>

                                             <?php } ?>
                                        </select>
                                        <?= form_error('Kondisi', '<small class="text-danger">', '</small>') ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="produk">Harga</label>
                                        <input type="text" class="form-control" id="Harga" name="harga" data-a-sign="Rp. " data-a-sep="." placeholder="Harga">
                                   </div>

                                   <div class="form-group">
                                        <label for="exampleInputFile">Foto Barang</label>
                                        <div class="input-group">
                                             <div class="custom-file">
                                                  <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                             </div>
                                             <div class="input-group-append">
                                                  <span class="input-group-text" id="">Upload</span>
                                             </div>
                                        </div>
                                        <?= form_error('Image', '<small class="text-danger">', '</small>') ?>
                                   </div>
                              </div>
                              <div class="card-footer">
                                   <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                         </div>

                    </div>
                    <!-- /.card-body -->

                    <?= form_close(); ?>
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
         
          //Initialize Select2 Elements
          $('.select2').select2()

          //Initialize Select2 Elements
          $('.select2').select2({
               theme: 'bootstrap4'
          })
          bsCustomFileInput.init();
          $(function() {
               $('#datetimepicker').datetimepicker({
                    locale: 'id',
                    format: 'DD/MM/YYYY'
               });
          });
     });
     $(document).keyup(function() {

          $('#Harga').autoNumeric('init', {
               aDec: null,
               mDec: '0'
          });
     });
</script>