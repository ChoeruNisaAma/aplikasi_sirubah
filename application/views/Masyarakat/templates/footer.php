  <!-- Bootstrap core JavaScript-->
  <script src="<?= filter_var(base_url())?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= filter_var(base_url())?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= filter_var(base_url())?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= filter_var(base_url())?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= filter_var(base_url())?>assets/js/demo/jsadmin.js"></script>
  <script src="<?= filter_var(base_url())?>assets/js/foto.js"></script>

 
  <script>
  	$('.custom-file-input').on('change', function(){
  		let fileName = $(this).val().split('\\').pop();
  		$(this).next('.custom-file-label').addClass("selected").html(fileName);
  	});
    
  </script>

  <script type="text/javascript">
    function deleteButton(string) {
      var tombol_hapus_ok = document.getElementById('tombol_oke_hapus');    
      tombol_hapus_ok.setAttribute('href', string);
  } 
 
</script>

</body>

</html>
