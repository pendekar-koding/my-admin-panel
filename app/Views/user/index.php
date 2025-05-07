<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?= $this->include('layouts/header') ?>
    <?= $this->include('layouts/sidebar') ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark">User Data</h1>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <!-- DataTables -->
                <table id="usersTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <?= $this->include('layouts/footer') ?>
    </div>
</div>

<!-- AdminLTE JS -->
<!--<script src="--><?php //= base_url('assets/plugins/admin-lte/js/adminlte.min.js') ?><!--"></script>-->
<!-- AdminLTE jQuery -->
<script src="<?= base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
<!-- AdminLTE DataTables -->
<script src="<?= base_url('adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>


<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            ajax: {
                url: '<?= site_url("web/users/data") ?>',
                dataSrc: 'data'
            },
            columns: [
                { data: 'full_name' },
                { data: 'username' },
                { data: 'email' },
            ],
            paging: true,
            lengthChange: false,
            ordering: true,
            info: true,
            dom: '<"d-flex justify-content-between align-items-center mb-3"f<"btn-tambah">>tip',
            initComplete: function () {
                $(".btn-tambah").html(`
                <a href="<?= site_url('users/create') ?>" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            `);
            }
        });
    });

</script>
</body>
</html>
