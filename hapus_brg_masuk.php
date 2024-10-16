<?php
session_start();
require_once "functions.php";

if (hapus_brg_masuk($_GET["id"]) > 0) {
  $_SESSION["berhasil"] = "Hapus";
  header("Location: barang_masuk.php");
  exit;
} else {
  $_SESSION["error"] = "Hapus";
  header("Location: barang_masuk.php");
  exit;
}
