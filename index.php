<?php
require_once("config.php");

$stmt = $conn->prepare("SELECT * FROM postingan");
$stmt->execute();
$datas = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        .thead {
            background-color: #17a2b7;
        }
    </style>

    <title>Read Data</title>
</head>

<body>
    <div class="container mt-4">
        <h2 class="float-left">
            List Postingan
        </h2>
        <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addDataModal">
            Tambah Data
        </button>
        <div class="table-responsive|table-responsive-sm|table-responsive-md|table-responsive-lg|table-responsive-xl">
            <table class="table table-bordered">
                <colgroup>
                    <col style="width: 15vw;">
                    <col>
                    <col style="width: 15vw;">
                </colgroup>
                <thead class="thead text-white text-center">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    <?php foreach ($datas as $data) { ?>
                        <tr>
                            <td scope="row"><?php echo $data["judul"] ?></td>
                            <td><?php echo $data["deskripsi"] ?></td>
                            <td class="">
                                <form class="row px-3" name="delete" id="delete" method="POST" action="delete.php">
                                    <button type="button" class="col btn btn-primary mr-1" data-toggle="modal" data-target="#changeDataModal<?php echo $data["id"] ?>">
                                        Edit
                                    </button>
                                    <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" value="<?php echo $data["id"] ?>" required>
                                    <button type="submit" class="col btn btn-danger ml-1" name="delete">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="insert" id="insert" method="POST" action="insert.php">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" placeholder="Data baru 1" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tes data baru" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="insert">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($datas as $data) { ?>
            <div class="modal fade" id="changeDataModal<?php echo $data["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="change" id="change" method="POST" action="change.php">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id" aria-describedby="id" placeholder="Data baru 1" value="<?php echo $data["id"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" aria-describedby="judul" placeholder="Data baru 1" value="<?php echo $data["judul"] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tes data baru" value="<?php echo $data["deskripsi"] ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="change">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <footer class="fixed-bottom text-black-50">
            <div class="footer-copyright text-center py-3">Source:
                <a href="https://github.com/Dzyfhuba/prakweb04.git/"> Dzyfhuba's Github Repository</a>
            </div>
        </footer>
    </div>
</body>

</html>