<?php

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "first_project");
}

function query(string $query): array
{
  $koneksi = koneksi();

  $result = mysqli_query($koneksi, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}



// CRUD Tabel Barang
function tambahBarang($data)
{
  $koneksi = koneksi();

  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "INSERT INTO barang VALUES (null, '$namaBarang', $jumlahBarang, '$jenisBarang', $hargaBarang)";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id)
{
  $koneksi = koneksi();

  $query = "DELETE FROM barang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  return $koneksi;
}

function updateBarang($data)
{
  $koneksi = koneksi();

  $id = $data["id_barang"];
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "UPDATE INTO barang SET nama_barang = '$namaBarang', jumlah_barang = $jumlahBarang, jenis_barang = '$jenisBarang', harga_barang = $hargaBarang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
