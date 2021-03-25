<?php
session_start();
require '../../koneksi.php';
?>

<div class="card shadow mb-4">
    <div class="row" style="margin:0 !important">
        <div class="card-header py-3" style="margin-top: 1%;border-bottom: 0;background-color: #fff">
            <h6 class="m-0 font-weight-bold text-primary">Data Waktu Tidak Tersedia</h6>
        </div>
        <div class="card-header py-3" style="margin-inline-start:auto;border-bottom: 0;background-color: #fff">
           <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" style="width: 300px">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Guru</th>
                        <th>Nama</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM tbwaktu");
                    ?>

                    <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                        <?php 
                            $kode = $result['kode'];
                            $nama = $result['nama'];
                            $hari = $result['hari'];
                            $jam = $result['jam'];
                        ?>
                        <tr>
                            <td><?= $kode ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $hari ?></td>
                            <td><?= $jam ?></td>
                            <td>
                                <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editWaktu(<?= "'$kode','$nama','$hari','$jam'"; ?>)"> <i class="fa fa-edit"></i> Edit </button>

                                <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deleteWaktu('<?= $kode ?>')"> <i class="fa fa-trash"></i> Hapus </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

           