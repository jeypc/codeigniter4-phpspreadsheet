<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        
        <a href="<?= site_url('employee/export') ?>" class="btn btn-success">Export Data</a>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employees as $employee): ?>
                    <tr>
                        <td><?= $employee['nama_lengkap'] ?></td>
                        <td><?= $employee['jabatan'] ?></td>
                        <td><?= $employee['tempat_lahir'] ?></td>
                        <td><?= $employee['tgl_lahir'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>