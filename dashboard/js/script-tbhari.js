function loadHari() {
	var url = "data/tbhari/data.php";
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

function saveHari() {
	var id = document.getElementById('id').value;
	var nama = document.getElementById('nama').value;
	var cmd = document.getElementById('simpan').value;


	var url = "data/tbhari/func.php?nama="+nama+"&id="+id+"&cmd="+cmd;
	var xhttp;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			data = this.responseText;
			alert(data);
			loadHari();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();

  	document.getElementById('nama').value = "";
	document.getElementById('simpan').value = "save";
}

function deleteHari(id){
	var url = "data/tbhari/delete.php?id="+id;
	var xhttp;


	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			loadTbhari();
		}
	};

	xhttp.open("GET", url, true);
	xhttp.send();
}

function editHari(id, nama) {
	document.getElementById('id').value = id;
	document.getElementById('nama').value = nama;
	document.getElementById('simpan').value = "update";
}	


function clearHari() {
	loadTbhari();
}
