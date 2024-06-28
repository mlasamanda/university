<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js"></script')}}>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}'"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}'"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- CDN Link for Select2 CSS -->
<link rel="stylesheet" href="{{asset('asset/css/select2.css')}}">
<!-- CDN Link for jQuery (required for Select2) -->
<script src="{{asset('asset/js/jquery-3.6.0.min.js')}}"></script>
<!-- CDN Link for Select2 JS -->
<script src="{{asset('asset/js/select2.js')}}"></script>
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

//check and uncheck
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    function replicaterole() {
        let replicateid = $('#replicate').val();
        let name = $('#name').val();
        let url = `{{route('role.create',isset($role)?$role->id:'')}}/?name=${name}&replicateid=${replicateid}`;
        // console.log(url);
        window.location.replace(url);
    }

    function checkitems(check) {
        $('input:checkbox').prop('checked', check);
    }

    function menuchecked(menu) {
        $(menu).closest('tr').find('input:checkbox').prop('checked', $(menu).is(':checked'));
    }

    function validateforminputs(form) {
        $(form).find('.save-spinner').show();
        $(form).find('.save-btn').prop('disabled', true);
    }

</script>
<script>
    function total_grade() {
        $(document).ready(function () {
            $.ajax({
                url: '/result/getAjax',
                type: 'GET',
                success: function (response) {
                    console.log(response); // Handle the response here, like updating UI with the fetched data
                },
                error: function (xhr) {
                    console.error(xhr.responseText); // Handle any errors
                }
            }
        });
    }

    )
    ;
</script>
{{--total marks--}}
<script>
    $(document).ready(function () {

        var grandTotal = 0;
        var Totalcredit = 0;
        var gpa;
        $('#marksTable tbody tr').each(function () {
            var total = 0;
            var credit = 0;
            $(this).find('.marks').each(function () {
                var mark = parseFloat($(this).text());
                if (!isNaN(mark)) {
                    total += mark;
                }
            });
            $(this).find('.credit').each(function () {
                var tcredit = parseFloat($(this).text());
                if (!isNaN(tcredit)) {
                    credit += tcredit;
                }
            });
            $(this).find('.total').text(total);
            grandTotal += total;
            $(this).find('.total').text(total);
            Totalcredit += credit;
            gpa=grandTotal/Totalcredit

        });

        $('#total').text('Total Mark: ' + grandTotal);
        $('#credit').text('Total Credit: ' + Totalcredit);
        $('#gpa').text('Gpa: ' + gpa.toFixed(1));


    });
</script>
//
<script>
    $(document).ready(function() {
        $('#selected').change(function() {
            var selectedValue = $(this).val();
            $(this).children('option[value="' + selectedValue + '"]').remove();
        });
    });
</script>
