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
?>