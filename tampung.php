<form class="form-block text-center" style="margin-left: 110px;" action="" method="POST">
                                        <div><input type="text" name="nama" placeholder="Nama Lengkap" class="mb-3 border border-primary rounded-2 p-1"></div>
                                        <div><input type="text" name="tujuan" placeholder="Tujuan"></div>
                                        <div>
                                            <select name="harga">
                                                <option value="100000">100000</option>
                                                <option value="200000">200000</option>
                                                <option value="300000">300000</option>
                                                <option value="400000">400000</option>
                                                <option value="500000">500000</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="number" name="jumlah" placeholder="Jumlah">
                                        </div>
                            
                                    </form>

                                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control mt-3">
                    </div>
                    <div class="form-group">
                        <input type="text" name="tujuan" placeholder="Tujuan" class="form-control mt-3">
                    </div>
                    <div class="form-group">
                        <select name="harga" class="form-control mt-3">
                            <option value="#" disabled selected>Harga</option>
                            <option value="100000">100000</option>
                            <option value="200000">200000</option>
                            <option value="300000">300000</option>
                            <option value="400000">400000</option>
                            <option value="500000">500000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" name="jumlah" placeholder="Jumlah" class="form-control mt-3">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2 form-control mt-3">Submit</button>
                    </div>
                    <div>
                        <a href="display.php" class="btn btn-primary w-100 mb-4">Histori Pembelian</a>
                    </div>



                    

                    <div class="content">
        <div>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $d['id']; ?>">
                <h1>Ubah Data</h1>
                <br>
                <label>Nama:</label><br>
                <input type="text" name="nama" value="<?= $d['nama']; ?>"><br>
                <label>Tujuan:</label><br>
                <input type="text" name="tujuan" value="<?= $d['tujuan']; ?>"><br>
                <label>Harga:</label><br>
                <!-- <input type="number" name="harga" value="<?= $d['harga']; ?>"><br> -->
                <div><select name="harga">
                <?php
                $options = array(100000, 200000, 300000, 400000, 500000);
                
                foreach ($options as $value) {
                    $selected = $value == $d['harga'] ? 'selected' : '';
                    echo "<option value=\"$value\" $selected>$value</option>";
                }
                ?>
                </select></div>

                <label>Jumlah:</label><br>
                <input type="number" name="jumlah" value="<?= $d['jumlah']; ?>"><br>

                <button type="submit">Ubah Data</button>
                <br>
                    <a href="display.php">Balik Ke Histori</a>
            </form>
        </div>
    </div>
