    <?php
    if (isset($_SESSION['Logged']) && (int)$_SESSION['Logged']['level'] >= 3) {
        require '../views/back/sidebarbottom' . $_SESSION['Logged']['level'] . '.php';
    }
    ?>
    </div>
    <script src="assets/js/jquery.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/solid.js"></script>
    <script src="assets/js/function.js"></script>

    <script src="assets/js/dataTables/jquery-3.7.1.js"></script>
    <script src="assets/js/dataTables/dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/dataTables/dataTables.buttons.js"></script>
    <script src="assets/js/dataTables/buttons.dataTables.js"></script>
    <script src="assets/js/dataTables/jszip.min.js"></script>
    <script src="assets/js/dataTables/pdfmake.min.js"></script>
    <script src="assets/js/dataTables/vfs_fonts.js"></script>
    <script src="assets/js/dataTables/buttons.html5.min.js"></script>
    <script src="assets/js/dataTables/buttons.print.min.js"></script>
    <script src="assets/js/dataTables/buttons.colVis.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            })
        });
    </script>