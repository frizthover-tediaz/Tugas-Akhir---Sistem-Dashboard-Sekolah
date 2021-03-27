<?php
session_start();
require '../../koneksi.php';
?>
    
<form action="" method="post" class="form-data" id="form-data">  
    <input type="hidden" id="id" name="" value="">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label>Nama</label><br>
                <select name="nama" id="nama" class="form-control">
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                </select>         
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="button" name="simpan" id="simpan" class="btn btn-primary" value="save" onclick="saveHari()">
            <i class="fa fa-save"></i> Save
        </button>
    
        <button type="button" name="clear" id="clear" class="btn btn-warning" onclick="clearHari()">
            <i class="fa fa-trash"></i> Clear
        </button>
    </div>

    <div id="insert">
        <div class="card shadow mb-4">
            <div class="row" style="margin:0 !important">
                <div class="card-header py-3" style="margin-top: 1%;border-bottom: 0;background-color: #fff">
                    <h6 class="m-0 font-weight-bold text-primary">Data Hari Sekolah</h6>
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
                        <thead style="text-align: center">
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody style="text-align: center">
                            <?php 
                                $query = mysqli_query($conn, "SELECT * FROM tbhari");
                                $x=1;
                            ?>

                            <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                                <?php 
                                    $nama = $result['nama'];
                                    $id = $result['id'];
                                ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td><?= $nama ?></td>
                                    <td>
                                        <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editHari(<?= "'$id','$nama'" ?>)"> <i class="fa fa-edit"></i> Edit </button>

                                        <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deleteHari('<?= $id ?>')"> <i class="fa fa-trash"></i> Hapus </button>
                                    </td>
                                </tr>
                            <?php $x++; endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>      
