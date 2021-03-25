<?php
session_start();
require '../../koneksi.php';
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelajaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Guru</th>
                        <th>Pelajaran</th>
                        <th>Kategori</th>
                        <th>KKM</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $query = mysqli_query($conn, "SELECT * FROM tbmapel");
                        $x = 0;
                    ?>
                    <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                        <?php
                            $x++;
                            $id = $result['id'];
                            $kode = $result['kode'];
                            $pelajaran = $result['mapel'];
                            $kategori = $result['kategori'];
                            $kkm = $result['kkm'];
                        ?>
                        <tr>
                            <td><?= $x ?></td>
                            <td><?= $kode ?></td>
                            <td><?= $pelajaran ?></td>
                            <td><?= $kategori ?></td>
                            <td><?= $kkm ?></td>
                            <td>
                                <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editMapel(<?= "'$id','$kode','$pelajaran','$kategori','$kkm'"; ?>)"> <i class="fa fa-edit"></i> Edit </button>

                                <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deleteMapel('<?= $id ?>')"> <i class="fa fa-trash"></i> Hapus </button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div> 
