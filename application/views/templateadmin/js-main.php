

<script type="text/javascript">
	function swalInputSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Tambah Data Berhasil',
		});
	}

	function swalGenerateSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Generate Berhasil',
		});
	}

	function swalInputFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tambah Data gagal!, Harap hubungi administrator',
		});
	}

	function swalInputFailedakd(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Tarif Berlaku pada Kode Pembayaran / TA belum terdaftar',
		});
	}

	function swalGenerateFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Generate Gagal',
		});
	}

	function swalDatanull(){
		Swal.fire({
		  icon: 'error',
		  title: 'Tidak Ditemukan',
		  text: 'Data Tidak Ditemukan!',
		});
	}

	function passwordNotMatch(){
		Swal.fire({
		  icon: 'error',
		  title: 'Password / Password Confirm Tidak Sesuai',
		  text: 'Password Tidak Sama',
		});
	}

	function swalPotonganFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Siswa tidak terdaftar di kelas tersebut',
		});
	}

	function swalEditSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Ubah Data Berhasil',
		});
	}

	function swalEditFailed(){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal',
		  text: 'Ubah Data gagal!, Harap hubungi administrator',
		});
	}

	function swalIdDouble(message){
		Swal.fire({
		  icon: 'error',
		  title: 'Data Duplicate',
		  text: message,
		});
	}

	function swalDeleteSuccess(){
		Swal.fire({
		  icon: 'success',
		  title: 'Sukses',
		  text: 'Hapus Data Berhasil',
		});
	}

	function swalImportFailed($message){
		Swal.fire({
		  icon: 'error',
		  title: 'Gagal. harap periksa data',
		  text: $message,
		});
	}


</script>
