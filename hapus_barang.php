<?php

require_once "functions.php";

if (hapusBarang($_GET["id"]) > 0) {
  header("Location: tabel_barang.php");
  exit;
} else {
  header("Location: tabel_barang.php");
  exit;
}
