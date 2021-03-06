<?php
session_start();
require '../../koneksi.php';
?>

<h1 class="h3 mb-5 text-gray-800">Tabel Siswa</h1>
	
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
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>            
                </select>
			</div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Jurusan</label><br>
                <select name="jurusan" id="jurusan" class="form-control">
                    <option>TKJ</option>
                    <option>AKL</option>
                    <option>BDP</option>            
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
                                <th>Jurusan</th>
                                <th>SPP lunas hingga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>SPP lunas hingga</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php 
                                $query = mysqli_query($conn, "SELECT * FROM tbsiswa");
                            ?>

                            <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                                <?php 
                                    $nis = $result['nis'];
                                    $nama = $result['nama'];
                                    $kelas = $result['kelas'];
                                    $jurusan = $result['jurusan'];
                                    $spp = $result['spp'];
                                ?>
                                <tr>
                                    <td><?= $nis ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $kelas ?></td>
                                    <td><?= $jurusan ?></td>
                                    <td><?= $spp ?></td>
                                    <td>
                                        <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editSiswa(<?= "'$nis','$nama','$kelas','$jurusan','$spp'"; ?>)"> <i class="fa fa-edit"></i> Edit </button>

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

