<?php 
include_once 'navbar.php';
session_start();
?>

<div class="container w-75 bg-white rounded-3 shadow-lg" style="margin-top: 90px; height: 60vh;">
    <div class="row bg-danger rounded-2" style="height: 15vh;">
        <div class="col-6 d-flex align-items-center ms-start">
            <svg height="4em" width="4em" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 48c-88 0-176 10.9-176 87.6v208c0 42.3 34.5 76.6 77 76.6L124 453v11h49.1l44-43.8H300l44 43.8h44v-10.9l-33-32.8c42.5 0 77-34.4 77-76.6v-208C432 58.9 353.2 48 256 48zm-99 328.4c-18.3 0-33-14.7-33-32.8s14.7-32.8 33-32.8 33 14.7 33 32.8-14.7 32.8-33 32.8zm77-153.2H124v-87.6h110v87.6zm44 0v-87.6h110v87.6H278zm77 153.2c-18.3 0-33-14.7-33-32.8s14.7-32.8 33-32.8 33 14.7 33 32.8-14.7 32.8-33 32.8z"></path></svg>
            <h1 style="margin-left: 15px;"><?php echo isset($_SESSION['tujuanAwal']) ? $_SESSION['tujuanAwal'] : ''; ?> - <?php echo isset($_SESSION['tujuanAkhir']) ? $_SESSION['tujuanAkhir'] : ''; ?></h1>
        </div>

        <div class="col-4 d-flex align-items-center justify-content-center">
            <svg height="6em" width="6em" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path transform="rotate(90, 512, 512)" d="M904 476H120c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-56c0-4.4-3.6-8-8-8z"></path>
            </svg>
        </div>

        <div class="col-2 d-flex align-items-center justify-content-end">
            <h1>
                <?php 
                    $hargaLabel = '';
                    if(isset($_SESSION['harga'])) {
                        $harga = $_SESSION['harga'];
                        $hargaLabel = $harga == 100000 ? "Regular" : ($harga == 200000 ? "Gold" : "Diamond");
                    }
                    echo $hargaLabel;
                ?>
            </h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-3">
            <h3>Nama Lengkap:</h3>
            <h3><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?></h3>
        </div>
        
        <div class="col-3">
            <h3>Penumpang:</h3>
            <h3><?php echo isset($_SESSION['jumlah']) ? $_SESSION['jumlah'] : ''; ?></h3>
        </div>

        <div class="col-6 d-flex justify-content-end">
        <img alt='Barcode Generator TEC-IT' class="img-thumbnail" width="80px" height="80px"
            src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : ''; ?>,<?php echo isset($_SESSION['tujuanAwal']) ? $_SESSION['tujuanAwal'] : ''; ?> - <?php echo isset($_SESSION['tujuanAkhir']) ? $_SESSION['tujuanAkhir'] : ''; ?>,<?php echo isset($_SESSION['jumlah']) ? $_SESSION['jumlah'] : ''; ?>'/>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <h3>Biaya:</h3>
            <h3><?php echo isset($_SESSION['total']) ? $_SESSION['total'] : ''; ?></h3>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col d-flex justify-content-center">
            <a href="display.php" class="btn btn-primary w-25 mb-4">Histori Pembelian</a>
        </div>
    </div>
</div>

<?php 
include_once 'footer.php';
?>