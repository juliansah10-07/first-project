<?php

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "xmarket");
}

function query(string $query): array
{
  $koneksi = koneksi();

  $result = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}



// CRUD Tabel Barang
function tambahBarang($data): int
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

function hapusBarang($id): int
{
  $koneksi = koneksi();

  $query = "DELETE FROM barang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function ubahBarang($data): int
{
  $koneksi = koneksi();

  $id = $data["id"];
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "UPDATE barang SET nama_barang = '$namaBarang', jumlah_barang = $jumlahBarang, jenis_barang = '$jenisBarang', harga_barang = $hargaBarang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}



// Function Registrasi yang berjalan di register.php
function register($data)
{
  $koneksi = koneksi();
  $nip = strtolower(stripslashes($data['nip']));
  $username = strtolower(stripslashes($data['username']));
  $email = strtolower(stripslashes($data['email']));
  $password = mysqli_real_escape_string($koneksi, $data['password']);
  $confirmPass = mysqli_real_escape_string($koneksi, $data['confirmPass']);

  // cek username sudah ada atau belum
  $result = mysqli_query($koneksi, "SELECT nama FROM user WHERE nama = '$username' ");

  if (mysqli_fetch_assoc($result)) {
    echo "<script> 
        alert(' Yah.. Username ini udah ga tersedia, pilih username lain aja yaa ^^~');
        </script>";
    return false;
  }

  // Cek konfirmasi Password
  if ($password !== $confirmPass) {
    echo "<script>
            alert('Password dan Konfirmasi Password harus sama!');
            </script>";
    return false;
  }

  // enskripsi password
  // var baru = password_hash(variabel yang perlu dienskripsi, jenis enskripsi);
  $password = password_hash($password, PASSWORD_DEFAULT);

  // tambahkan user ke database
  $query = "INSERT INTO user VALUES (null, $nip, '$username', '$email', '$password')";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}
