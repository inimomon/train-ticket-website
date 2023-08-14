<?php 
include 'koneksi.php';
session_start();

function query($query) {
    global $koneksi;

    $result = $koneksi->query($query);

    if(!$result) {
        die ("Query Error: " .$conn->errno. " - ".$conn->error);
    }

    $rows = [];

    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

function create($data) {
    global $koneksi;

    $nama = htmlspecialchars($data['nama']);
    $tujuanAwal = htmlspecialchars($data['tujuanAwal']);
    $tujuanAkhir = htmlspecialchars($data['tujuanAkhir']);
    $harga = htmlspecialchars($data['harga']);
    $jumlah = htmlspecialchars($data['jumlah']);
    $total = $harga * $jumlah;

    $stmt = $koneksi->prepare("INSERT into richmond(nama, tujuan_awal, tujuan_akhir, harga, jumlah, total) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiii", $nama, $tujuanAwal, $tujuanAkhir, $harga, $jumlah, $total);
    $stmt->execute();

    $_SESSION['nama'] = $nama;
    $_SESSION['tujuanAwal'] = $tujuanAwal;
    $_SESSION['tujuanAkhir'] = $tujuanAkhir;
    $_SESSION['harga'] = $harga;
    $_SESSION['jumlah'] = $jumlah;
    $_SESSION['total'] = $total;
    header("location:ticket.php");
}

function delete($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM richmond WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function update($data) {
    global $koneksi;

    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $tujuanAwal = htmlspecialchars($data['tujuanAwal']);
    $tujuanAkhir = htmlspecialchars($data['tujuanAkhir']);
    $harga = htmlspecialchars($data['harga']);
    $jumlah = htmlspecialchars($data['jumlah']);

    $total = $harga * $jumlah;

    $stmt = $koneksi->prepare("UPDATE richmond SET nama = ?, tujuan_awal = ?, tujuan_akhir = ?, harga = ?, jumlah = ?, total = ? WHERE id = ?");
    $stmt->bind_param("sssiiii", $nama, $tujuanAwal, $tujuanAkhir, $harga, $jumlah, $total, $id);
    $stmt->execute();
}

function register($data) {
    global $koneksi;

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $stmt = $koneksi->prepare("INSERT INTO pemakai (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header("location:login.php");
}

function login($data) {
    global $koneksi;

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);

    $stmt = $koneksi->prepare("SELECT * FROM pemakai WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows !== 0 ) {
        $d = $result->fetch_assoc();

        if($username === $d['username'] && $password === $d['password']) {
            header("location:index.php");
        } else {
            header("location:login.php?error=wrong");
        }
    } else {
        header("location:login.php?error=nodata");
    }

}
?>