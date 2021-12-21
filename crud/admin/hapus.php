<?php 
require '../functions/functions.php';

$id = $_GET["id_buku"];

if(hapus($id) > 0) {
    echo "data berhasil di hapus";
} else {
    echo "data gagal di hapus";
}

header("location:index.php");

?>