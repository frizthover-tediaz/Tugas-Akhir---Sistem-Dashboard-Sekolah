function loadSiswa() {
	var url = "data/tbsiswa/data.php";
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			document.getElementById("insert").innerHTML = data;
		}
	};
	xhttp.open("GET", url, true);
	xhttp.send();
}

function saveSiswa() {
	var id = document.getElementById('id').value;
	var nis = document.getElementById('nis').value;
	var nama = document.getElementById('nama').value;
	var kelas = document.getElementById('kelas').value;
	var spp = document.getElementById('spp').value;
	var cmd = document.getElementById('simpan').value;

	//alert(nis + " " + nama + " " + kelas + " " + jurusan + " " + spp);

	var url = "data/tbsiswa/func.php?id="+id+"&nis="+nis+"&nama="+nama+"&spp="+spp+"&kelas="+kelas+"&cmd="+cmd;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			alert(data);
			loadSiswa();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();

  	document.getElementById('nis').value = "";
	document.getElementById('nama').value = "";
	document.getElementById('kelas').value = "";
	document.getElementById('spp').value = "";
	document.getElementById('simpan').value = "save";
}

function deleteSiswa(id){
	var url = "data/tbsiswa/delete.php?nis="+id;
	var xhttp;


	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadSiswa();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();
	loadSiswa();
}

function editSiswa(nis, nama, kelas, spp) {
	document.getElementById('id').value = nis;
	document.getElementById('nis').value = nis;
	document.getElementById('nama').value = nama;
	document.getElementById('kelas').value = kelas;
	document.getElementById('spp').value = spp;
	document.getElementById('simpan').value = "update";
}	


function clearSiswa() {
	loadTbsiswa();
}
