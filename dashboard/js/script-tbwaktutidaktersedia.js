function loadWaktu() {
	var url = "data/tbwaktutidaktersedia/data.php";
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

function saveWaktu() {
	var id = document.getElementById('id').value;
	var kode = document.getElementById('kode').value;
	var nama = document.getElementById('nama').value;
	var hari = document.getElementById('hari').value;
	var jam = document.getElementById('jam').value;
	var cmd = document.getElementById('simpan').value;

	var url = "data/tbwaktutidaktersedia/func.php?id="+id+"&kode="+kode+"&nama="+nama+"&jam="+jam+"&hari="+hari+"&cmd="+cmd;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			alert(data);
			loadWaktu();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();

  	document.getElementById('kode').value = "";
	document.getElementById('nama').value = "";
	document.getElementById('hari').value = "";
	document.getElementById('jam').value = "";
	document.getElementById('simpan').value = "save";
}

function deleteWaktu(id){
	var url = "data/tbwaktutidaktersedia/delete.php?kode="+id;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadWaktu();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();
	loadWaktu();
}

function editWaktu(kode, nama, hari, jam) {
	document.getElementById('id').value = kode;
	document.getElementById('kode').value = kode;
	document.getElementById('nama').value = nama;
	document.getElementById('hari').value = hari;
	document.getElementById('jam').value = jam;
	document.getElementById('simpan').value = "update";
}	


function clearWaktu() {
	loadTbWaktu();
}
