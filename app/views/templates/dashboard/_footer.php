</div>
</div>

<!-- JS Bootstrap -->
<script src="<?= BASEURL; ?>/vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
<!-- Sweetalert2 -->
<!-- <script src="<?= BASEURL; ?>/vendor/sweetalert2/sweetalert2.min.js"></script> -->
<!-- Data Tables -->
<script type="text/javascript" charset="utf8" src="<?= BASEURL; ?>/vendor/DataTables-1.11.5/datatables.js"></script>
<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            fixedHeader: {
                header: true
            }
        });
    });

    AOS.init();
</script>
</body>

</html>