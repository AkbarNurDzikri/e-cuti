</div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 <a href="#">PT. Blasfolie Internasoinal Indonesia</a> </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/dist/js/adminlte.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/jszip/jszip.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= BASEURL; ?>/vendor/AdminLTE-master/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Select2 -->
<script src="<?= BASEURL; ?>/vendor/select2-4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- In your Javascript (external .js resource or <script> tag) -->
<script>
  $(document).ready(function() {
      $('.select2').select2();
  });
</script>

<!-- Auto close alert bootstrap 4 -->
<script>
  window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 5000);
</script>


<div class="modal fade" id="userSettingModal" aria-labelledby="userSettingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userSettingModalLabel">User Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="row text-center">
                <div class="col-sm mb-2">
                  <a href="<?= BASEURL; ?>/auth/logout" class="btn btn-primary mb-2"><i class="fas fa-sign-out-alt"></i> Logout</a> </br>
                  
                  <!-- <a href="" class="btn btn-dark"><i class="fas fa-cog"></i> Pengaturan</a> -->
                  <a class="btn btn-dark" data-toggle="modal" data-target="#gantiPassw" href="#" role="button">
                    <i class="fas fa-cog"></i> Pengaturan
                  </a>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="gantiPassw" tabindex="-1" aria-labelledby="gantiPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gantiPasswordModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container box-login" style="padding-top: 10px;">
                    <div class="row">
                        <div class="col-md mx-auto">
                            <div class="row align-items-center">
                                <div class="col-md mt-3" data-aos="fade-down" data-aos-duration="1000">
                                    <?php Flasher::flash(); ?>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <form action="<?= BASEURL; ?>/auth/changePassword" method="POST">
                                                <input type="hidden" name="karyawan_id" value="<?= $_SESSION['user']['id_user'] ?>">
                                                <input type="hidden" name="id" value="<?= $data['user_login'][0]['id'] ?>">

                                                <div class="row">
                                                    <div class="col-md mb-3">
                                                        <label for="username" class="form-label"><i class="fa-solid fa-feather-pointed"></i> Username</label>
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan username baru" autofocus required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md mb-3">
                                                        <label for="passwordLama" class="form-label"><i class="fa-solid fa-lock-open"></i> Password Lama</label>
                                                        <input type="password" class="form-control" name="passwordLama" id="passwordLama" placeholder="Masukkan Password Lama Anda" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md mb-3">
                                                        <label for="password" class="form-label"><i class="fa-solid fa-unlock"></i> Password Baru</label>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md mb-3">
                                                        <label for="konfirmPassword" class="form-label"><i class="fa-solid fa-lock"></i> Konfirmasi Password</label>
                                                        <input type="password" class="form-control" name="konfirmPassword" id="konfirmPassword" placeholder="Ulangi Password Baru" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md text-end">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="<?= BASEURL; ?>/assets/vector/access-control.png" alt="vector-login" style="width: 100%;" class="gambar-login">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>