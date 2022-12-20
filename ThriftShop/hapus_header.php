<?php 

require 'fungsi.php';

$id = $_GET["id"];

if(deleteheader($id) >0 ){
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = 'kelola_header.php';
				</script>
		";
	} else {
		echo "
			<script>
					alert('data gagal dihapus!');
					document.location.href = 'kelola_header.php';
				</script>
		";
	}
