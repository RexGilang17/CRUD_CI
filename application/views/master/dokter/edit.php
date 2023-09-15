<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h2>KLINIK</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Dokter</h4>
            <form action="<?php echo $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Dokter ID</label>
                        <input type="text" value="<?= $dokter_id; ?>" class="form-control" id="dokter_id" name="dokter_id" placeholder="Kode Dokter" required>
                        <div class="invalid-feedback">
                            Valid Kode Dokter is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" id="nama_dokter" value="<?= $nama_dokter; ?>" name="nama_dokter" placeholder="Nama Dokter" required>
                        <div class="invalid-feedback">
                            Valid Nama Dokter is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Poli</label>
                        <select class="select2 form-control" name="poli_id" data-placeholder="Pilih Poli" style="width: 100%;">
                            <option>---Pilih Poli---</option>
                            <?php print_r($default['poli_id']);
                            foreach ($default['poli_id'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            Valid Poli is required.
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                <button class="w-20 btn btn-warning btn-lg" name="reset" type="reset">Cancel</button>
            </form>
        </div>
    </div>
</main>