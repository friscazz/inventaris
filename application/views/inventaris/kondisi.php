<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1>Kondisi</h1>
                         <?= $this->session->flashdata("flash"); ?>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inventaris</a></li>
                              <li class="breadcrumb-item active">Kondisi</li>
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
                              <h3 class="card-title">Kondisi</h3>
                         </div>

                         <!-- /.card-header -->
                         <div class="card-body">
                              <div class="text-right">
                                   <button class="btn btn-primary mb-3 " data-toggle="modal" data-target="#tambahkondisi"> + Tambah Kondisi</button>
                              </div>
                              <table id="data-inventaris" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                             <th>Id</th>
                                             <th>Nama Kondisi</th>
                                             <th>Aksi</th>
                                        </tr>
                                   </thead>
                                   <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kondisi as $d) { ?>
                                             <tr>
                                                  <td><?= $i++; ?></td>
                                                  <td><?= $d['nama_kondisi']; ?></td>
                                                  <td><a href="#editkondisi<?= $d['id']; ?>" data-toggle="modal" class="btn btn-primary"><i class="far fa-edit"></i> Edit</a> <a href="#hapus<?= $d['id']; ?>" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a></td>
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
<div class="modal fade" id="tambahkondisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kondisi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form action="<?= base_url('inventaris/tambahKondisi'); ?>" method="post">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="kondisi" class="col-form-label">Nama Kondisi :</label>
                              <input type="text" class="form-control" name="kondisi" id="kondisi" required>
                         </div>
                         <?= form_error('kondisi', '<small class="text-danger">', '</small>') ?>

                    </div>
                    <div class="modal-footer">
                         <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<?php foreach ($kondisi as $d) { ?>
     <div class="modal fade" id="editkondisi<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Edit Kondisi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="<?= base_url() . 'inventaris/ubahKondisi/' . $d['id']; ?>" method="post">
                         <div class="modal-body">

                              <div class="form-group">
                                   <label for="kondisiedit" class="col-form-label">Nama Kondisi :</label>
                                   <input type="text" class="form-control" name="kondisi" value="<?= $d['nama_kondisi'] ?>" id="kondisiedit" required>
                              </div>
                              <?= form_error('kondisi', '<small class="text-danger">', '</small>') ?>

                         </div>
                         <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
<?php } ?>
<?php foreach ($kondisi as $d) { ?>
     <div class="modal fade" id="hapus<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Hapus Kondisi</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <form action="<?= base_url() . 'inventaris/hapusKondisi/' . $d['id']; ?>" method="post">
                         <div class="modal-body">
                              Yakin Ingin Menghapus Data <b><?= $d['nama_kondisi']; ?></b> ?

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
     $("button[type='submit']").click(function() {
          if ($('#kondisi').val() || $('#kondisiedit').val() == '') {
               $("button[type='submit']").attr('disabled', true)
          }
     })
</script>