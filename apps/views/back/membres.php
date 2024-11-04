<?php
ControlAccess([1]);

$Membres = [];

$Title = $Description = "Liste des Membres";
require '../views/header.php';
?>


<?php require 'sidebar' . $_SESSION['Logged']['level'] . '.php'; ?>

<div class="container-fluid">
    <?php require 'navbartop.php'; ?>
    <?= flash(); ?>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 cols-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Liste des Membres</div>
                    <div class="card-subtitle">Total : <?= count($Membres); ?></div>
                </div>
                <div class="card-body p-0">
                    <table id="tabMembre" class="table table-bordered table-striped table-hover table-sm m-0">
                        <thead>
                            <tr class="bg-warning">
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Âge</th>
                                <th>Autre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>Nom</td>
                                <td>Prénom</td>
                                <td>Âge</td>
                                <td>Autre</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    ras
                </div>
            </div>
        </div>
    </div>
</div>

<?php require '../views/scripts.php'; ?>

<script>
    $(document).ready(function() {
        $('#tabMembre').dataTable({
            dom: 'Bflrtpi',
            buttons: ['copy',
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'excel',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ":visible"
                    }
                }, {
                    extend: 'print',
                    exportOptions: {
                        columns: ":visible"
                    }
                },
                'colvis'
            ],
            language: {
                url: './assets/js/dataTables/fr-FR.json'
            },
            columns: [{
                    width: '110px'
                },
                {
                    width: '30px'
                },
                {
                    width: '40px'
                },
                {
                    width: '150px'
                },
                null
            ],
            columnDefs: [{
                visible: false
            }],
            "pageLength": 20,
            pagingType: 'full_numbers',
            "paging": true,
            order: [
                [0, 'asc']
            ],
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
    });
</script>
<?php require '../views/footer.php'; ?>