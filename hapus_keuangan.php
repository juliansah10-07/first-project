<?php

require_once "functions.php";

if (hapus_keuangan($_GET["id"]) > 0) {
  header("Location: keuangan.php");
  exit;
} else {
  header("Location: keuangan.php");
  exit;
}
