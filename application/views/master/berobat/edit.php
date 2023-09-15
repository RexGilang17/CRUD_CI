<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h2>KLINIK</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Berobat</h4>
            <form action="<?php echo $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Kode Transaksi</label>
                        <input type="text" readonly="readonly" name="notrans" value="<?php echo $id; ?>" id="notrans" class="form-control">
                        <div class="invalid-feedback">
                            Valid Kode Supplier is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Pasien</label>
                        <select class="select2 form-control" name="pasien" data-placeholder="Pilih pasien" style="width: 100%;">
                            <option>---Pilih Pasien---</option>
                            <?php print_r($default['pasien']);
                            foreach ($default['pasien'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="lastName" class="form-label">Tanggal Berobat</label>
                        <select class="form-control" name="tanggal">
                            <option value="<?php echo $tgl; ?>"><?php echo $tgl; ?></option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) { ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <label for="lastName" class="form-label">Bulan</label>
                        <select class="form-control" name="bulan">
                            <?php
                            $bulan = array("January", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            $nobln = 1;
                            ?>
                            <option value="<?php echo $bln; ?>"><?php echo $bulan[$bln - 1]; ?></option>
                            <?php
                            for ($i = 0; $i < 12; $i++) { ?>
                                <option value="<?php echo $nobln; ?>"><?php echo $bulan[$i]; ?></option>
                            <?php
                                $nobln++;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="lastName" class="form-label">Tahun</label>
                        <input type="text" value="<?php echo $tahun; ?>" name="tahun" id="tahun" class="form-control" placeholder="Pilih Tahun">
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Dokter</label>
                        <select class="select2 form-control" name="dokter" data-placeholder="Pilih Dokter" style="width: 100%;">
                            <option>---Pilih Dokter---</option>
                            <?php print_r($default['dokter']);
                            foreach ($default['dokter'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Keluhan</label>
                        <input type="text" value="<?php echo $keluhan; ?>" name="keluhan" id="keluhan" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Biaya Administrasi</label>
                        <input type="number" value="<?php echo $biaya_adm; ?>" name="biaya_adm" id="biaya_adm" class="form-control">
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-warning btn-lg" href="<?php echo $base; ?>Berobat">Cancel</a>
            </form>
        </div>
    </div>
</main>