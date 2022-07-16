<!-- JS Bootstrap -->
<script src="<?= BASEURL; ?>/vendor/bootstrap-5.0.2/js/bootstrap.min.js"></script>
<!-- AOS Animation -->
<!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

<script>
    AOS.init();
</script>

<!-- Auto close alert bootstrap -->
<script>
  window.setTimeout(function() {
    $('.alert').fadeTo(500, 0).slideUp(500, function() {
      $(this).remove();
    });
  }, 5000);
</script>
</body>

</html>