<?php
session_start();
require '../../koneksi.php';
?>

<h1 class="h3 mb-5 text-gray-800">Tabel Pelajaran</h1>
	
<form action="" method="post" class="form-data" id="form-data">  
	<input type="hidden" id="id" name="">
	<div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				<label>Nama Guru</label>
				<select class="form-control" id="kode">
                    <?php $query = mysqli_query($conn, "SELECT * FROM tbguru"); ?>
                    <?php while ($row1 = mysqli_fetch_array($query)):; ?>
                        <option value="<?php echo $row1[0] ?>"><?php echo $row1[1] ?></option>
                    <?php endwhile; ?>
                </select>
			</div>
		</div>

        <div class="col-sm-3">
            <div class="form-group">
                <label>Pelajaran</label><br>
                <input type="text" name="mapel" id="mapel" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
        	<div class="form-group">
				<label>Kategori</label>
				<select class="form-control" id="kategori">
                    <option value="Produktif">Produktif</option>
                    <option value="Non Produktif">Non Produktif</option>
                </select>
			</div>
        </div>

        <div class="col-sm-3">
        	<div class="form-group">
				<label>KKM</label><br>
				<input type="text" name="kkm" id="kkm" class="form-control">
			</div>
        </div>
	</div>
	
	<div class="form-group">
		<button type="button" name="simpan" id="simpan" class="btn btn-primary" value="save" onclick="saveMapel()">
			<i class="fa fa-save"></i> Save
		</button>
	
		<button type="button" name="clear" id="clear" class="btn btn-warning" onclick="clearMapel()">
			<i class="fa fa-trash"></i> Clear
		</button>
	</div>

    <div id="insert">
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
    </div>
</form>

