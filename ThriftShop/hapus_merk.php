<?php 

require 'fungsi.php';

$id = $_GET["id"];

if(deletemerk($id) >0 ){
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'kelola_merk.php';
				</script>
		";
	} else {
		echo "
			<script>
					alert('data gagal dihapus!');
					document.location.href = 'kelola_merk.php';
				</script>
		";
	}
