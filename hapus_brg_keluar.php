<?php
session_start();
require_once "functions.php";

if (hapus_brg_keluar($_GET["id"]) > 0) {
  $_SESSION["berhasil"] = "Hapus";
  header("Location: barang_keluar.php");
  exit;
} else {
  $_SESSION["error"] = "Hapus";
  header("Location: barang_keluar.php");
  exit;
}
