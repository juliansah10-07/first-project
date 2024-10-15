<?php

require_once "functions.php";

if (hapus_brg_keluar($_GET["id"]) > 0) {
  header("Location: barang_keluar.php");
  exit;
} else {
  header("Location: barang_keluar.php");
  exit;
}
