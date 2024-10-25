<?php

// Koneksi ke database
function koneksi()
{
  return mysqli_connect("localhost", "root", "", "xmarket");
}

// Mengambil Data Dari Database
function query(string $query): array
{
  $koneksi = koneksi();

  $result = mysqli_query($koneksi, $query);

  // Memindahkan Data satu persatu kedalam array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Mengambil Satu Data di dalam Database
function ambilSatuData(string $query): array
{
  $koneksi =  koneksi();

  $result = mysqli_query($koneksi, $query);

  return mysqli_fetch_assoc($result);
}

// CRUD Tabel Barang
function tambahBarang(array $data): int
{
  $koneksi = koneksi();

  // Mengambil Inputan User
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalankan Query
  $query = "INSERT INTO barang VALUES (null, '$namaBarang', $jumlahBarang, '$jenisBarang', $hargaBarang)";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}

function hapusBarang($id): int
{
  $koneksi = koneksi();

  // Menjalankan Query
  $query = "DELETE FROM barang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}

function ubahBarang(array $data): int
{
  $koneksi = koneksi();

  // Ambil Data dari form
  $id = $data["id"];
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalankan Query
  $query = "UPDATE barang SET nama_barang = '$namaBarang', jumlah_barang = $jumlahBarang, jenis_barang = '$jenisBarang', harga_barang = $hargaBarang WHERE id_barang = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}

// CRUD Tabel Barang Masuk

function tambah_brg_masuk(array $data): int
{
  $koneksi = koneksi();

  // Mengambil Data dari form
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalankan Query
  $query = "INSERT INTO barang_masuk VALUES (null, '$tanggal', '$namaBarang', '$jenisBarang', $jumlahBarang, $hargaBarang, $totalHarga)";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}

function hapus_brg_masuk($id): int
{
  $koneksi = koneksi();

  // Menjalankan Query
  $query = "DELETE FROM barang_masuk WHERE id_brg_masuk = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Dtabase
  return mysqli_affected_rows($koneksi);
}

function ubah_brg_masuk(array $data): int
{
  $koneksi = koneksi();

  // Mengambil Data Dari form
  $id = $data["id"];
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalankan Query
  $query = "UPDATE barang_masuk SET tanggal = '$tanggal', nama_barang = '$namaBarang', jenis_barang = '$jenisBarang', jumlah_barang = $jumlahBarang, total_harga = $totalHarga, harga_barang = $hargaBarang WHERE id_brg_masuk = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}


// CRUD Tabel Barang Keluar 

function tambah_brg_keluar(array $data): int
{
  $koneksi = koneksi();

  // Mengambil data dari form
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalankan query
  $query = "INSERT INTO barang_keluar VALUES (null, '$tanggal', '$namaBarang', '$jenisBarang', $jumlahBarang, $hargaBarang, $totalHarga)";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di database
  return mysqli_affected_rows($koneksi);
}

function hapus_brg_keluar($id): int
{
  $koneksi = koneksi();

  // Menjalankan Query
  $query = "DELETE FROM barang_keluar WHERE id_brg_keluar = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubhan di Database
  return mysqli_affected_rows($koneksi);
}

function ubah_brg_keluar(array $data): int
{
  $koneksi = koneksi();

  // Mengambil data dari form
  $id = $data["id"];
  $tanggal = htmlspecialchars($data["tanggal"]);
  $namaBarang = htmlspecialchars($data["nama_barang"]);
  $jenisBarang = htmlspecialchars($data["jenis_barang"]);
  $jumlahBarang = htmlspecialchars($data["jumlah_barang"]);
  $totalHarga = htmlspecialchars($data["total_harga"]);
  $hargaBarang = htmlspecialchars($data["harga_barang"]);

  // Menjalanlankan Query
  $query = "UPDATE barang_keluar SET tanggal = '$tanggal', nama_barang = '$namaBarang', jenis_barang = '$jenisBarang', jumlah_barang = $jumlahBarang, total_harga = $totalHarga, harga_barang = $hargaBarang WHERE id_brg_keluar = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}


// CRUD Tabel Keuangan

function tambah_keuangan(array $data): int
{
  $koneksi = koneksi();

  // Mengambil Data dari database
  $tanggal = $data["tanggal"];
  $pemasukan = $data["total_pemasukan"];
  $pengeluaran = $data["total_pengeluaran"];
  $keuntungan = $data["total_keuntungan"];

  // Menjalankan Query
  $query = "INSERT INTO keuangan VALUES (null, '$tanggal', $pemasukan, $pengeluaran, $keuntungan)";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
  return mysqli_affected_rows($koneksi);
}

function hapus_keuangan($id): int
{
  $koneksi = koneksi();

  // Menjalankan Query
  $query = "DELETE FROM keuangan WHERE id_keuangan = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan Di Database
  return mysqli_affected_rows($koneksi);
}

function ubah_keuangan(array $data): int
{
  $koneksi = koneksi();

  // Mengambil Data Dari Database
  $id = $data["id"];
  $tanggal = $data["tanggal"];
  $pemasukan = $data["total_pemasukan"];
  $pengeluaran = $data["total_pengeluaran"];
  $keuntungan = $data["total_keuntungan"];

  // Menjalankan Query
  $query = "UPDATE keuangan SET tanggal = '$tanggal', total_pemasukan = $pemasukan, total_pengeluaran = $pengeluaran, total_keuntungan = $keuntungan WHERE id_keuangan = $id";
  mysqli_query($koneksi, $query);

  // Cek Perubahan di Database
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



function updatePassword($nip, $new_password)
{

  $koneksi = koneksi();

  // Cari user berdasarkan NIP
  $sql = "SELECT * FROM user WHERE nip = '$nip'";
  $result = mysqli_query($koneksi, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Jika NIP ditemukan, update password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $update_sql = "UPDATE user SET password = '$hashed_password' WHERE nip = '$nip'";
    if (mysqli_query($koneksi, $update_sql)) {
      echo "<script>
        alert('Ubah Password Berhasil');
        document.location.href = 'login.php';
        </script>"; // Arahkan ke halaman login
      exit();
    }
  } else {
    // Jika NIP tidak ditemukan, kembalikan ke halaman forgotpassword dengan pesan error
    echo "<script>
        alert('NIP tidak ditemukan!');
        document.location.href = 'forget_password.php';
        </script>";
    exit();
  }
}
