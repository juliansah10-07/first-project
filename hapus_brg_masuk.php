<?php

require_once "functions.php";

if (hapus_brg_masuk($_GET["id"]) > 0) {
  header("Location: barang_masuk.php");
  exit;
} else {
  header("Location: barang_masuk.php");
  exit;
}
