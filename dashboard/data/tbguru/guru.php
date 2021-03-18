<?php
session_start();
require '../../koneksi.php';
?>
	
<form action="" method="post" class="form-data" id="form-data">  
	<input type="hidden" id="id" name="">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>Kode Guru</label>
				<input type="text" name="kode" id="kode" class="form-control">
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
				<label>Status</label><br>
				<input type="text" name="status" id="status" class="form-control">
			</div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Pelajaran</label><br>
                <input type="text" name="pelajaran" id="pelajaran" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Jam Mengajar</label><br>
                <input type="text" name="jam" id="jam" class="form-control">
            </div>
        </div>
	</div>
	
	<div class="form-group">
		<button type="button" name="simpan" id="simpan" class="btn btn-primary" value="save" onclick="saveGuru()">
			<i class="fa fa-save"></i> Save
		</button>
	
		<button type="button" name="clear" id="clear" class="btn btn-warning" onclick="clearGuru()">
			<i class="fa fa-trash"></i> Clear
		</button>
	</div>

    <div id="insert">
    	<!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="row" style="margin:0 !important">
                <div class="card-header py-3" style="margin-top: 1%;border-bottom: 0;background-color: #fff">
                    <h6 class="m-0 font-weight-bold text-primary">Data Guru Sekolah</h6>
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
                        <thead style="text-align: center;">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Pelajaran</th>
                                <th>Jam Mengajar</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody style="text-align: center;">
                            <?php 
                                $query = mysqli_query($conn, "SELECT * FROM tbguru");
                            ?>

                            <?php while ( $result = mysqli_fetch_assoc($query) ) : ?>
                                <?php 
                                    $kode = $result['kode'];
                                    $nama = $result['nama'];
                                    $status = $result['status'];
                                    $pelajaran = $result['pelajaran'];
                                    $jam = $result['jam'];
                                ?>
                                <tr>
                                    <td><?= $kode ?></td>
                                    <td><?= $nama ?></td>
                                    <td><?= $status ?></td>
                                    <td><?= $pelajaran ?></td>
                                    <td><?= $jam ?></td>
                                    <td>
                                        <button type="button" id="edit" name="ubah" class="btn btn-success btn-sm w-100" onclick="editGuru(<?= "'$kode','$nama','$status','$pelajaran','$jam'"; ?>)"> <i class="fa fa-edit"></i> Edit </button>

                                        <button type="button" id="delete" name="hapus" class="btn btn-danger btn-sm w-100 mt-1" onclick="deleteGuru('<?= $kode ?>')"> <i class="fa fa-trash"></i> Hapus </button>
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
