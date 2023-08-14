<?php 
require 'logic.php';

$d = null;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $d = query("SELECT * FROM richmond WHERE id = " . $id)[0];
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = update($_POST);
    header("location:display.php");
}
?>

<?php 
include_once 'navbar.php';
?>

<div class="container w-75 bg-white rounded-3 shadow-lg" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/date.png" alt="Description" class="img-fluid mt-4 mb-5">
            </div>
            <div class="col-md-6">
                <h3 class="mt-2 mb-4 text-center">Book Your Trip!</h3>

                <form method="POST">
                    <input type="hidden" name="id" value="<?= $d['id']; ?>">

                    <div class="row align-items-center">
                        <h5 class="col-12">Nama Lengkap</h5>
                        <input type="text" name="nama" class="w-75 col-12 form-control" style="margin-left: 12px;" value="<?= $d['nama']; ?>" required>
                    </div>

                    <div class="row mt-3">
                        <div class="col-5">
                            <h5>Asal</h5>
                            <select name="tujuanAwal" id="tujuanAwal" class="form-control w-100 border-secondary border-opacity-50 rounded-1" required>
                                <?php
                                    $options = array(
                                        "jakarta" => "Jakarta", 
                                        "bandung" => "Bandung", 
                                        "bogor" => "Bogor", 
                                        "puncak" => "Puncak", 
                                        "palembang" => "Palembang"
                                    );
                                    
                                    foreach ($options as $value => $text) {
                                        $selected = $value == $d['tujuan_awal'] ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$text</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="col-2 mt-4 text-center">
                            <svg type="button" id="switchButton" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        </div>

                        <div class="col-5">
                            <h5>Tujuan</h5>
                            <select name="tujuanAkhir" id="tujuanAkhir" class="form-control w-100 border-secondary border-opacity-50 rounded-1" required>
                                <?php
                                    $options = array(
                                        "jakarta" => "Jakarta", 
                                        "bandung" => "Bandung", 
                                        "bogor" => "Bogor", 
                                        "puncak" => "Puncak", 
                                        "palembang" => "Palembang"
                                    );
                                    
                                    foreach ($options as $value => $text) {
                                        $selected = $value == $d['tujuan_akhir'] ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$text</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <h5>Bangku</h5>
                            <select name="harga" class="form-control" required>
                                <?php
                                    $options = array(
                                        100000 => "Regular",
                                        200000 => "Gold",
                                        300000 => "Diamond"
                                    );
                                    
                                    foreach ($options as $value => $text) {
                                        $selected = $value == $d['harga'] ? 'selected' : '';
                                        echo "<option value=\"$value\" $selected>$text</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <h5>Jumlah</h5>
                            <input type="number" name="jumlah" placeholder="Jumlah" class="form-control" value="<?= $d['jumlah']; ?>" required>
                        </div>

                        <div class="col-6 d-block">
                            <button type="submit" class="btn btn-primary mb-2 form-control mt-3">Submit</button>
                            <a href="display.php" class="btn btn-primary w-100 mb-4">Histori Pembelian</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
  document.getElementById('switchButton').addEventListener('click', function() {
  var select1 = document.getElementById('tujuanAwal');
  var select2 = document.getElementById('tujuanAkhir');

  // Store the current options
  var options1 = Array.from(select1.options);
  var options2 = Array.from(select2.options);

  // Clear the options
  select1.innerHTML = '';
  select2.innerHTML = '';

  // Append the options to the other select
  options1.forEach(function(option) {
    select2.appendChild(option);
  });
  options2.forEach(function(option) {
    select1.appendChild(option);
  });
});


</script>

<?php 
include_once 'footer.php';
?>