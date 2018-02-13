<!-- jQuery 3 -->
<script src="../src/dashboard/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../src/dashboard/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../src/dashboard/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../src/dashboard/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../src/dashboard/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../src/dashboard/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>