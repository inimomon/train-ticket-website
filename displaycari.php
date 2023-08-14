<?php 
require 'logic.php';
$pencarian = $_POST['pencarian'];
$students = query("SELECT * FROM richmond where nama like '%$pencarian%'");

?>

<?php 
require_once 'navbar.php';
?>

<div class="content">
    <div>
        <h1 class="text-center mt-3">Histori Pembelian</h1>
    </div>

    <div style="text-align:center;" class="mt-4">
        <a href="display.php" class="btn btn-primary">Histori Utama</a>
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

<?php 
require_once 'footer.php';
?>