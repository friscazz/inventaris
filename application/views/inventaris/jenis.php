<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Jenis</h1>
                         <?= $this->session->flashdata("flash"); ?>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inventaris</a></li>
                              <li class="breadcrumb-item active">Jenis</li>
                         </ol>
                    </div>
               </div>
          </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
          <div class="row">
               <div class="col-12">
                    <div class="card">
                         <div class="card-header">
                              <h3 class="card-title">Jenis</h3>
                         </div>

                         <!-- /.card-header -->
                         <div class="card-body">
                              <div class="text-right">
                                   <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahjenis"> + Tambah Jenis</button>
                              </div>
                              <table id="data-inventaris" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                             <th>Id</th>
                                             <th>Nama Jenis</th>
                                             <th>Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($jenis as $d) { ?>
                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?= $d['nama_jenis']; ?></td>
                                                  <td><a href="#editjenis<?= $d['id']; ?>" data-toggle="modal" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#hapus<?= $d['id']; ?>" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
                                             </tr>
                                        <?php } ?>

                                   </tbody>

                              </table>
                         </div>
                         <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
               </div>
               <!-- /.col -->
          </div>
          <!-- /.row -->
     </section>
     <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('inventaris/tambahJenis'); ?>" method="post">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="jenis" class="col-form-label">Nama Jenis :</label>
                              <input type="text" class="form-control" name="jenis" id="jenis" required>
                         </div>
                         <?= form_error('jenis', '<small class="text-danger">', '</small>') ?>

                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<?php foreach ($jenis as $d) { ?>
     <div class="modal fade" id="editjenis<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Edit Jenis</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="<?= base_url() . 'inventaris/ubahJenis/' . $d['id']; ?>" method="post">
                         <div class="modal-body">

                              <div class="form-group">
                                   <label for="jenisedit" class="col-form-label">Nama Jenis :</label>
                                   <input type="text" class="form-control" name="jenis" value="<?= $d['nama_jenis'] ?>" id="jenisedit" required>
                              </div>
                              <?= form_error('jenis', '<small class="text-danger">', '</small>') ?>

                         </div>
                         <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
<?php } ?>
<?php foreach ($jenis as $d) { ?>
     <div class="modal fade" id="hapus<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Hapus Jenis</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="<?= base_url() . 'inventaris/hapusJenis/' . $d['id']; ?>" method="post">
                         <div class="modal-body">
                              Yakin Ingin Menghapus Data <b><?= $d['nama_jenis']; ?></b> ?

                         </div>
                         <div class="modal-footer">
                              <button type="submit" class="btn btn-danger">Ya</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
<?php } ?>
<!-- DataTables -->
<script src="<?php echo base_url('asset/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script>
     $(function() {
          $('#data-inventaris').DataTable({
               "paging": true,
               "lengthChange": false,
               "searching": true,
               "ordering": true,
               "info": true,
               "autoWidth": false,
          });
     });
</script>