<?php
session_start();
require '../../koneksi.php';
?>
	
<form action="" method="post" class="form-data" id="form-data">  
	<input type="hidden" id="id" name="">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>NIS Siswa</label>
				<input type="number" name="nis" id="nis" class="form-control">
			</div>
		</div>

        <div class="col-sm-3">
        	<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" id="nama" class="form-control">
			</div>
        </div>

        <div class="col-sm-3">
        	<div class="form-group">
				<label>Kelas</label><br>
				<select name="kelas" id="kelas" class="form-control">
                    <option>Pilih kelas</option>
                    <option>10 TKJ 1</option>
                    <option>10 TKJ 2</option>
                    <option>10 TKJ 3</option> 
                    <option>11 TKJ 1</option>
                    <option>11 TKJ 2</option>
                    <option>11 TKJ 3</option>
                    <option>12 TKJ 1</option>
                    <option>12 TKJ 2</option>
                    <option>12 TKJ 3</option>
                    <option>10 AK 1</option>  
                    <option>10 AK 2</option> 
                    <option>11 AK 1</option>  
                    <option>11 AK 2</option>
                    <option>12 AK 1</option>  
                    <option>12 AK 2</option>
                    <option>10 PM</option>
                    <option>11 PM</option>
                    <option>11 PM</option>        
                </select>
			</div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>SPP lunas hingga</label><br>
                <input type="text" name="spp" id="spp" class="form-control">
            </div>
        </div>
	</div>
	
	<div class="form-group">
		<button type="button" name="simpan" id="simpan" class="btn btn-primary" value="save" onclick="saveSiswa()">
			<i class="fa fa-save"></i> Save
		</button>
	
		<button type="button" name="clear" id="clear" class="btn btn-warning" onclick="clearSiswa()">
			<i class="fa fa-trash"></i> Clear
		</button>
	</div>

    <div id="insert">
    	<div class="card shadow mb-4">
            <div class="row" style="margin:0 !important">
                <div class="card-header py-3" style="margin-top: 1%;border-bottom: 0;background-color: #fff">
                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa Sekolah</h6>
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
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>SPP lunas hingga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody style="text-align: center">
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
    </div>
</form>

