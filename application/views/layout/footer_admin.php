    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
	<script src="<?php echo base_url(); ?>_res/assets/admin/vendors/datatables/datatables.js"></script>
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/datatables/buttons.print.min.js"></script>


    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/nprogress/nprogress.js"></script>
    
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>_res/assets/admin/js/custom.js"></script>
	
    
    <script src="<?php echo base_url(); ?>/_res/assets/admin/vendors/toastr/toastr.min.js"></script> 


    <script>
    <?php //Notificaciones ?>
	
	<?php if(isset($mensaje_emergente) && $mensaje_emergente['texto'] != ""): ?>
	
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "newestOnTop": false,
		  "progressBar": true,
		  "positionClass": "toast-top-right",
		  "preventDuplicates": false,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		
		<?php if(isset($mensaje_emergente)): ?>
		<?php 
		/* Los tipos de notificaciones pueden ser:
		 - success
		 - info
		 - warning
		 - error
		*/ ?>
			toastr['<?php echo $mensaje_emergente['tipo']; ?>']('<?php echo $mensaje_emergente['texto']; ?>');
		<?php endif; ?>

	<?php endif; ?>
    </script>



</body>
</html>