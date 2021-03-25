function loadMapel() {
	var url = "data/tbmapel/data.php";
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

function saveMapel() {
	var id = document.getElementById('id').value;
	var kode = document.getElementById('kode').value;
	var mapel = document.getElementById('mapel').value;
	var kategori = document.getElementById('kategori').value;
	var kkm = document.getElementById('kkm').value;
	var cmd = document.getElementById('simpan').value;


	var url = "data/tbmapel/func.php?id="+id+"&kode="+kode+"&mapel="+mapel+"&kategori="+kategori+"&kkm="+kkm+"&cmd="+cmd;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			loadMapel();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();

  	document.getElementById('kode').value = "";
	document.getElementById('mapel').value = "";
	document.getElementById('kategori').value = "";
	document.getElementById('kkm').value = "";
	document.getElementById('simpan').value = "save";
}

function deleteMapel(id){
	var url = "data/tbmapel/delete.php?id="+id;
	var xhttp;


	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadTbmapel();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();
}

function editMapel(id, kode, mapel, kategori, kkm) {
	document.getElementById('id').value = id;
	document.getElementById('kode').value = kode;
	document.getElementById('mapel').value = mapel;
	document.getElementById('kategori').value = kategori;
	document.getElementById('kkm').value = kkm;
	document.getElementById('simpan').value = "update";
}	


function clearMapel() {
	loadTbmapel();
}
