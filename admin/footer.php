<!-- jQuery -->
<!-- <script src="assets/plugins/jquery/jquery.min.js"></script> -->

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery Validation CDN -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>


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
<script src="assets/dist/js/demo.js"></script>
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
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
});
$(document).ready(function() {
  var c_value = $("#productCountry").val();
  
  var selected_state = $("#selected_state").val();
    var requestFor = 'fetchingCountryState';
  loadData(c_value,requestFor,selected_state);

  
    $(".menu_edit").click(function() {
        var menu_id = $(this).attr('m_id');
        var menuName = $(this).attr('menu_name');
        var menuLink = $(this).attr('menu_link');
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
    $("#createProducts").submit(function (event) {
                // Reset error messages
        $(".error").html("");
        if ($("#name").val().trim() === "") {
            $("#nameError").html("This is required");
            event.preventDefault();
        }
        if ($("#slug").val().trim() === "") {
            $("#slugError").html("This is required");
            event.preventDefault();
        }
        if ($("#description").val().trim() === "") {
            console.log("yes d");
            $("#descriptionError").html("This is required");
            event.preventDefault();
        }
        if ($("#adminnote").val().trim() === "") {
            console.log("yes d")
            $("#admin_noteError").html("This is required");
            event.preventDefault();
        }

        if ($("#sales_price").val().trim() === "") {
            $("#salePriceError").html("This is required");
            event.preventDefault();
        }
        if ($("#inventory").val().trim() === "") {
            $("#inventoryError").html("This is required");
            event.preventDefault();
        }
        if ($("#vin_number").val().trim() === "") {
            $("#vinNumberError").html("This is required");
            event.preventDefault();
        }

        if ($("#status").val().trim() === "") {
            $("#statusError").html("This is required");
            event.preventDefault();
        }
        if ($("#is_sold").val().trim() === "") {
            $("#is_solderror").html("This is required");
            event.preventDefault();
        }
        if ($("#on_sale").val().trim() === "") {
            $("#on_saleError").html("This is required");
            event.preventDefault();
        }
        if ($("#bullet_proof").val().trim() === "") {
            $("#bullet_proofError").html("This is required");
            event.preventDefault();
        }

        if ($("#image").val().trim() === "") {
            $("#image-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#primary_category").val().trim() === "") {
            $("#primary_category-Error").html("This is required");
            event.preventDefault();
        }

        if ($("#machine_condition").val().trim() === "") {
            $("#machine_condition-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#auction_scope").val().trim() === "") {
            $("#auction_scope-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#certified").val().trim() === "") {
            $("#certified-Error").html("This is required");
            event.preventDefault();
        }

        if ($("#make").val().trim() === "") {
            $("#make-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#model").val().trim() === "") {
            $("#model-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#manufacture_year").val().trim() === "") {
            $("#manufacture_year-Error").html("This is required");
            event.preventDefault();
        }

        if ($("#machine_current_location").val().trim() === "") {
            $("#machine_current_location-Error").html("This is required");
            event.preventDefault();
        }        
            //  dvvv
        if ($("#horsepower").val().trim() === "") {
            $("#horsepower-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#weight").val().trim() === "") {
            $("#weight-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#length").val().trim() === "") {
            $("#length-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#width").val().trim() === "") {
            $("#width-Error").html("This is required");
            event.preventDefault();
        }

                    //  dvvv
        if ($("#mileage").val().trim() === "") {
            $("#mileage-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#drive").val().trim() === "") {
            $("#drive-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#number_of_speed").val().trim() === "") {
            $("#number_of_speed-Error").html("This is required");
            event.preventDefault();
        }

                    //  dvvv
         if ($("#suspension").val().trim() === "") {
            $("#suspension-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#fuel_type").val().trim() === "") {
            $("#fuel_type-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#engine").val().trim() === "") {
            $("#engine-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#sleeper_type").val().trim() === "") {
            $("#sleeper_type-Error").html("This is required");
            event.preventDefault();
        }
                    //  dvvv
        if ($("#lift_capacity").val().trim() === "") {
            $("#lift_capacity-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#lift_height").val().trim() === "") {
            $("#lift_height-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#type_of_neck").val().trim() === "") {
            $("#type_of_neck-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#floor_type").val().trim() === "") {
            $("#floor_type-Error").html("This is required");
            event.preventDefault();
        }

                            //  dvvv
        if ($("#retail_contact_name").val().trim() === "") {
            $("#retail_contact_name-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#Phone").val().trim() === "") {
            $("#Phone-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#location").val().trim() === "") {
            $("#location-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#cab").val().trim() === "") {
            $("#cab-Error").html("This is required");
            event.preventDefault();
        }


                            //  dvvv
        if ($("#transmission").val().trim() === "") {
            $("#transmission-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#transmission_type").val().trim() === "") {
            $("#transmission_type-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#axie").val().trim() === "") {
            $("#axie-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#cab").val().trim() === "") {
            $("#cab-Error").html("This is required");
            event.preventDefault();
        }

                          //  dvvv
        if ($("#drive_type").val().trim() === "") {
            $("#drive_type-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#listing_type").val().trim() === "") {
            $("#listing_type-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#rops_type").val().trim() === "") {
            $("#rops_type-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#serial").val().trim() === "") {
            $("#serial-Error").html("This is required");
            event.preventDefault();
        }
            
        
    });

    $("#createCategory").submit(function (event) {
        if ($("#name").val().trim() === "") {
            $("#name-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#slug").val().trim() === "") {
            $("#slug-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#cat_h1").val().trim() === "") {
            $("#cat_h1-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#cat_h2").val().trim() === "") {
            $("#cat_h2-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#description").val().trim() === "") {
            $("#description-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#shortdescription").val().trim() === "") {
            $("#shortdescription-Error").html("This is required");
            event.preventDefault();
        }

        if ($("#related_search").val().trim() === "") {
            $("#related_search-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#image").val().trim() === "") {
            $("#image-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#image_banner").val().trim() === "") {
            $("#serial-Error").html("This is required");
            event.preventDefault();
        }
    });

    $("#createmake").submit(function (event) {
        if ($("#makes").val().trim() === "") {
            $("#makes-Error").html("This is required");
            event.preventDefault();
        }
        if ($("#status").val().trim() === "") {
            $("#status-Error").html("This is required");
            event.preventDefault();
        }
    });

    $("#creteModel").submit(function (event) {
        if ($("#models").val().trim() === "") {
            $("#models-Error").html("This is required");
            event.preventDefault();
        }
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
</body>

</html>