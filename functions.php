<?php

function koneksi()
{
  return mysqli_connect("localhost", "root", "", "xmarket");
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

function ambilSatuData(string $query): array
{
  $koneksi =  koneksi();

  $result = mysqli_query($koneksi, $query);

  return mysqli_fetch_assoc($result);
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

// CRUD Tabel Barang Masuk

function tambah_brg_masuk($data)
{
  $koneksi = koneksi();

  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "INSERT INTO barang_masuk VALUES (null, '$tanggal', '$namaBarang', '$jenisBarang', $jumlahBarang, $hargaBarang, $totalHarga)";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function hapus_brg_masuk($id)
{
  $koneksi = koneksi();

  $query = "DELETE FROM barang_masuk WHERE id_brg_masuk = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function ubah_brg_masuk($data)
{
  $koneksi = koneksi();

  $id = $data["id"];
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "UPDATE barang_masuk SET tanggal = '$tanggal', nama_barang = '$namaBarang', jenis_barang = '$jenisBarang', jumlah_barang = $jumlahBarang, total_harga = $totalHarga, harga_barang = $hargaBarang WHERE id_brg_masuk = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


// CRUD Tabel Barang Keluar 

function tambah_brg_keluar($data)
{
  $koneksi = koneksi();

  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "INSERT INTO barang_keluar VALUES (null, '$tanggal', '$namaBarang', '$jenisBarang', $jumlahBarang, $hargaBarang, $totalHarga)";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function hapus_brg_keluar($id)
{
  $koneksi = koneksi();

  $query = "DELETE FROM barang_keluar WHERE id_brg_keluar = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function ubah_brg_keluar($data)
{
  $koneksi = koneksi();

  $id = $data["id"];
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  $query = "UPDATE barang_keluar SET tanggal = '$tanggal', nama_barang = '$namaBarang', jenis_barang = '$jenisBarang', jumlah_barang = $jumlahBarang, total_harga = $totalHarga, harga_barang = $hargaBarang WHERE id_brg_keluar = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}


// CRUD Tabel Keuangan

function tambah_keuangan($data)
{
  $koneksi = koneksi();

  $tanggal = $data["tanggal"];
  $pemasukan = $data["total_pemasukan"];
  $pengeluaran = $data["total_pengeluaran"];
  $keuntungan = $data["total_keuntungan"];

  $query = "INSERT INTO keuangan VALUES (null, '$tanggal', $pemasukan, $pengeluaran, $keuntungan)";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function hapus_keuangan($id)
{
  $koneksi = koneksi();

  $query = "DELETE FROM keuangan WHERE id_keuangan = $id";
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function ubah_keuangan($data)
{
  $koneksi = koneksi();

  $id = $data["id"];
  $tanggal = $data["tanggal"];
  $pemasukan = $data["total_pemasukan"];
  $pengeluaran = $data["total_pengeluaran"];
  $keuntungan = $data["total_keuntungan"];

  $query = "UPDATE keuangan SET tanggal = '$tanggal', total_pemasukan = $pemasukan, total_pengeluaran = $pengeluaran, total_keuntungan = $keuntungan WHERE id_keuangan = $id";
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
