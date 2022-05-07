</div>
<!--<endora></endora>-->
      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright">
            © 2020 -
            <script>
              document.write(new Date().getFullYear())
            </script> made with <i class="tim-icons icon-heart-2"></i> by
            <a href="https://nntworks.fun" target="_blank">NNTWorks</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../../custom/panel_templates/default/assets/js/core/jquery.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/core/popper.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/core/bootstrap.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/sweetalert2.min.js"></script>
  <!--  Plugin for Sorting Tables -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jquery.tablesorter.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/plugins/fullcalendar/daygrid.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/plugins/fullcalendar/timegrid.min.js"></script>
  <script src="../../custom/panel_templates/default/assets/js/plugins/fullcalendar/interaction.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
  <!-- Chart JS -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../../custom/panel_templates/default/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../custom/panel_templates/default/assets/js/black-dashboard.min3f71.js?v=1.1.1"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../../custom/panel_templates/default/assets/demo/demo.js"></script>
  <!-- Sharrre libray -->
  <script src="../../custom/panel_templates/default/assets/demo/jquery.sharrre.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46172202-12"></script>

  <script>
    $(document).ready(function() {
      // Initialise the wizard
      demo.initNowUiWizard();
      setTimeout(function() {
        $('.card.card-wizard').addClass('active');
      }, 600);
    });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>

  <!-- CKEDITOR -->
  <script src="../../custom/templates/default/ckeditor.js"></script>
  <script>
	DecoupledEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			const toolbarContainer = document.querySelector( 'main .toolbar-container' );

			toolbarContainer.prepend( editor.ui.view.toolbar.element );

			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>

</body>


<!-- Mirrored from demos.creative-tim.com/marketplace/black-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Dec 2020 15:48:06 GMT -->
</html>
