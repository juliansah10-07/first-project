<?php
session_start();
require_once "functions.php";

if (hapusBarang($_GET["id"]) > 0) {
  $_SESSION["berhasil"] = "Hapus";
  header("Location: tabel_barang.php");
  exit;
} else {
  $_SESSION["error"] = "Hapus";
  header("Location: tabel_barang.php");
  exit;
}
