

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>

  <!-- DataTables  & Plugins -->
  <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->
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


  $(document).ready(function(){
    var c_value = $("#productCountry").val();
    var selected_state = $("#selected_state").val();
    var requestFor = 'fetchingCountryState';
    loadData(c_value,requestFor,selected_state);

    $(".menu_edit").click(function(){
      var menu_id = $(this).attr('m_id');
      var menuName = $(this).attr('menu_name');
      var menuLink =$(this).attr('menu_link');
      $("#menuID").val(menu_id);
      $("#updatemenuname").val(menuName);
      $("#updatemenulink").val(menuLink);
      $("#exampleModal").modal('show');
    });

    $("#productCountry").change(function() {
        var country = $(this).val();
        var selected_state = $("#selected_state").val();
        var ajaxfor = 'fetchingCountryState';
        loadData(country,ajaxfor,selected_state); 
    });
  });

  function loadData(country,ajaxfor,valueSelect) {
        
        var parameter1Value = country;
        var parameter2Value = ajaxfor;

        // Your AJAX request with parameters
        $.ajax({
            url: 'ajax_request.php',
            type: 'GET',
            data: {
              country: parameter1Value,
              requestFor: parameter2Value
            },
            success: function(response) {
              $("#productStates").html('');
              var arr = JSON.parse(response)
               $.each(arr, function(index, element) {
                var id = element['id'];
                var name = element['name'];
                if(valueSelect != '0' && valueSelect==id){
                  $("#productStates").append("<option value='"+id+"' selected>"+name+"</option>");
                }else{
                  $("#productStates").append("<option value='"+id+"'>"+name+"</option>");
                }
                    
                });
            },
            error: function() {
                // Handle errors if needed
            }
        });
    }

</script>
</body>
</html>
