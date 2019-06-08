<?php
    require 'akses.php';
    require 'session.php';
    // require '../config/connect.php';

    $tempdir = "../temp/";
    if (!file_exists($tempdir))
        mkdir($tempdir);
    
    if (isset($_POST['add'])) {
        # code...
        $namabarang = $_POST['namabarang'];
        $ext = '.png';
        // qrcode params
        $qrtext = $_POST['qrcode'];
        $quality = 'H';
        $ukuran = 5;
        $padding = 0;
        $namafile = $namabarang.$ext;

        $jumlahbarang = $_POST['jumlahbarang'];

        $insert = mysqli_query($con, "INSERT INTO barang VALUE(NULL,'$namabarang','$jumlahbarang','1','$qrtext')");
        if ($insert) {
            # code...
            echo'<script>
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Add New Items",
                        type: "success"
                    }, function() {
                        window.location = "barang.php";
                    });
                }, 500);
                </script>';
                QRCode::png($qrtext,$tempdir.$namafile,$quality,$ukuran,$padding);
        } else {
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Failed",
                    text: "Gagal menambahkan!",
                    type: "error"
                }, function() {
                    window.location = "barang.php";
                });
            }, 500);
            </script>';
        }
    }

    if (isset($_POST['edit'])) {
        # code...
        $id = $_POST['id'];
        $namabarang = $_POST['namabarang'];
        $jumlahbarang = $_POST['jumlahbarang'];

        $update = mysqli_query($con, "UPDATE barang SET nama='$namabarang', jumlah='$jumlahbarang' WHERE id='$id' ");
        if ($update) {
            # code...
            echo'<script>
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Edit items",
                        type: "success"
                    }, function() {
                        window.location = "barang.php";
                    });
                }, 500);
                </script>';
        } else {
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Failed",
                    text: "Gagal edit!",
                    type: "error"
                }, function() {
                    window.location = "barang.php";
                });
            }, 500);
            </script>';
        }
    }

    if (isset($_POST['hapus'])) {
        # code...
        $id = $_POST['id'];
        $qr = $_POST['fileqr'];
        $target = '../temp/'.$qr.'';

        unlink($target);

        $hapus = mysqli_query($con, "DELETE FROM barang WHERE id='$id' ");
        if ($hapus) {
            # code...
            echo'<script>
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Hapus items",
                        type: "success"
                    }, function() {
                        window.location = "barang.php";
                    });
                }, 500);
                </script>';
        } else {
            echo'<script>
            setTimeout(function() {
                swal({
                    title: "Failed",
                    text: "Gagal hapus!",
                    type: "error"
                }, function() {
                    window.location = "barang.php";
                });
            }, 500);
            </script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- cut to partial -->
    <?php
        require 'partial/header.php';
    ?>
</head>

<body class="mini-sidebar">
    <!-- ===== Main-Wrapper ===== -->
    <div id="wrapper">
        <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
        </div>
        <!-- ===== Top-Navigation ===== -->
        <?php
            require 'partial/nav.php';
        ?>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php
            require 'partial/sidebar.php';
        ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- ===== Page-Content ===== -->
        <div class="page-wrapper">
        <div class="container-fluid">
        <!-- /row -->
        <div class="row">
        <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Data Table</h3>
                            <p class="text-muted m-b-30">Data table example</p>
                            <!-- table button -->
                            <div class="container">
                            <div class="col-lg-2 col-sm-2 col-xs-2">
                            </div>
                            </div>
                            <br>
                            <!-- end table button -->
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Barang</th>
                                            <th>Nomor Resi</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $show = mysqli_query($con, "SELECT a.*, b.nama FROM summary a LEFT JOIN barang b ON a.id_barang = b.id");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($show)) {
                                            # code...
                                            $id = $data['id'];
                                            $nama = $data['nama'];
                                            $nomor = $data['nomor'];
                                            $harga = $data['harga'];
                                            $status = $data['status'];

                                            if ($status=="1") {
                                                # code...
                                                $status_quo = "Belum lunas";
                                            } else {
                                                # code...
                                                $status_quo = "Lunas";
                                            }
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $nama ?></td>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo "Rp. ".number_format($harga) ?></td>
                                            <td><?php echo $status_quo ?></td>
                                            <td>
                                                <button class="btn-xs btn-primary" data-toggle="modal" data-target="#edit<?php echo $id ?>">Edit</button>
                                                <button class="btn-xs btn-primary" data-toggle="modal" data-target="#hapus<?php echo $id ?>">Hapus</button>
                                                <!-- mdodal edit -->
                                                <div id="edit<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modal Heading</h4> </div>

                                                            <form method="post">
                                                            <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                                            <div class="form-group">
                                                                <label>Nama Barang <span class="help"></span></label>
                                                                    <input type="text" class="form-control" placeholder="Nama barang" name="namabarang" value="<?php echo $nama ?>" required> 
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Jumlah Barang <span class="help"></span></label>
                                                                    <input type="number" class="form-control" placeholder="Jumlah barang" name="jumlahbarang" value="<?php echo $jumlah ?>" required> 
                                                            </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary waves-effect" name="edit">Save Changes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- end modal edit -->
                                                <!-- mdodal hapus -->
                                                <div id="hapus<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h4 class="modal-title" id="myModalLabel">Modal Heading</h4> </div>

                                                            <form method="post">
                                                            <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?php echo $id ?>">
                                                            <input type="hidden" name="fileqr" value="<?php echo $nama.'.png' ?>">
                                                                Yakin mau hapus <?php echo $nama ?> cuy?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidaak!</button>
                                                                <button type="submit" class="btn btn-primary waves-effect" name="hapus">Yakin dong</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- end modal edit -->
                                            </td>
                                        </tr>
                                    <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ===== end page content ===== -->
        <footer class="footer t-a-c">
        <?php
            require 'partial/footer.php';
        ?>
        </footer>   
        <!-- ===== Page-Content-End ===== -->
    </div>
    <!-- ===== Main-Wrapper-End ===== -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <?php
        require 'partial/js.php';
    ?>
</body>

</html>
