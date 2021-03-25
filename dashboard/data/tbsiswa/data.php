<?php
session_start();
require '../../koneksi.php';
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa Sekolah</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nis</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>SPP lunas hingga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM tbsiswa");
                    ?>

                    <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                        <?php 
                            $nis = $result['nis'];
                            $nama = $result['nama'];
                            $kelas = $result['kelas'];
                            $spp = $result['spp'];
                        ?>
                        <tr>
                            <td><?= $nis ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $kelas ?></td>
                            <td><?= $spp ?></td>
                            <td>
                                <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editSiswa(<?= "'$nis','$nama','$kelas','$spp'"; ?>)"> <i class="fa fa-edit"></i> Edit </button>

                                <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deleteSiswa('<?= $nis ?>')"> <i class="fa fa-trash"></i> Hapus </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

           