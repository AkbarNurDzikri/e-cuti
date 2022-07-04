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
                
                <a href="" class="btn btn-dark"><i class="fas fa-cog"></i> Pengaturan</a>
                <p class="small-text"><h6><?= $_SESSION['user']['nama_user'] . ' | ' . $_SESSION['user']['nama_jabatan'] ?></h6></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>