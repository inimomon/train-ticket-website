<?php 
require 'logic.php';
$students = query("SELECT * FROM richmond");

$jumlahDataPerHalaman = 5;
$jumlahData = count($students);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET['halaman']) ) ? (int) $_GET['halaman'] : 1;

// Ensure that $halamanAktif is within bounds
$halamanAktif = max(1, min($jumlahHalaman, $halamanAktif));

$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;


$students = query("SELECT * FROM richmond LIMIT $awalData, $jumlahDataPerHalaman");
?>

<?php 
require_once 'navbar.php';
?>


<div class="content">
    <div>
        <h1 class="text-center mt-3">Histori Pembelian</h1>
    </div>

    <div style="text-align:center; margin-top: 50px;">
        <form action="displaycari.php" method="POST">
            <input type="text" name="pencarian" class="w-50 rounded-2" placeholder="Cari Nama..">
            <button type="submit" style="background: none; border: none; cursor: pointer;">
                <svg style="margin-top: -5px; margin-left: 10px;" width="2em" height="2em" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z"></path>
                    <path d="M11.412,8.586C11.791,8.966,12,9.468,12,10h2c0-1.065-0.416-2.069-1.174-2.828c-1.514-1.512-4.139-1.512-5.652,0 l1.412,1.416C9.346,7.83,10.656,7.832,11.412,8.586z"></path>
                </svg>
            </button>
        </form>
    </div>

    <div style="text-align:center;" class="mt-3 mb-3">
        <a href="index.php" class="btn btn-primary">Beli Ticket</a>
    </div>

    <table class="table table-dark table-striped w-75 mx-auto text-center mt-2" style="max-width: auto;">
        <tr>
            <td>Kode Pelanggan</td>
            <td>Nama Pelanggan</td>
            <td>Tujuan</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Total</td>
            <td>Aksi</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($students as $d) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['tujuan_awal'] . " - " . $d['tujuan_akhir']; ?></td>
                <td><?php 
                if($d['harga'] == 100000) {
                    echo "Regular";
                } 
                if($d['harga'] == 200000) {
                    echo "Gold";
                } 
                if($d['harga'] == 300000) {
                    echo "Diamond";
                } 
                ?></td>
                <td><?= $d['jumlah']; ?></td>
                <td><?= $d['total']; ?></td>
                <td>
                    <a class="btn btn-primary" href="edit.php?id=<?= $d['id']; ?>">Edit</a>
                    <a class="btn btn-primary" href="hapus.php?id=<?= $d['id']; ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
</div>

        <div class="d-flex justify-content-center">
            <a href="?halaman=1" class="border p-2 bg-secondary rounded-2 text-white" style="text-decoration: none; margin-right: 10px;">Awal</a>

            <?php if( $halamanAktif > 1 ) : ?>
                <a href="?halaman=<? $halamanAktif - 1; ?>" class="border p-2 bg-secondary rounded-2 text-white" style="text-decoration: none; margin-right: 10px;">&laquo;</a>
            <?php endif; ?>

            <?php for( $i = 1; $i < $jumlahHalaman; $i++ ) : ?>
                <?php if( $i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i; ?>"><? $i; ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i; ?>"><? $i; ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>" class="border p-2 bg-secondary rounded-2 text-white" style="text-decoration: none; margin-right: 10px;">&raquo;</a>
            <?php endif; ?>

            <a href="?halaman=<?= $jumlahHalaman; ?>" class="border p-2 bg-secondary rounded-2 text-white" style="text-decoration: none; margin-right: 10px;">Akhir</a>
        </div>

<?php 
include_once 'footer.php';
?>