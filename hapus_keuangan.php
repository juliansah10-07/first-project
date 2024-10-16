<?php
session_start();
require_once "functions.php";

if (hapus_keuangan($_GET["id"]) > 0) {
  $_SESSION["berhasil"] = "Hapus";
  header("Location: keuangan.php");
  exit;
} else {
  $_SESSION["error"] = "Hapus";
  header("Location: keuangan.php");
  exit;
}
