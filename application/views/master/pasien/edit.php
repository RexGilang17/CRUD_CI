<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h2>KLINIK</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Pasien</h4>
            <form action="<?php echo $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Pasien ID</label>
                        <input readonly value="<?= $pasien_id; ?>" type="text" class="form-control" id="pasien_id" name="pasien_id" placeholder="Pasien ID" required>
                        <div class="invalid-feedback">
                            Valid Pasien ID is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Pasien</label>
                        <input type="text" value="<?= $nama_pasien; ?>" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Nama Pasien" required>
                        <div class="invalid-feedback">
                            Valid Nama Pasien is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">tanggal_lahir</label>
                        <input type="date" value="<?= $tanggal_lahir; ?>" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal lahir" required>
                        <div class="invalid-feedback">
                            Valid Tanggal lahir is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" <?php if ($jenis_kelamin == 'L') {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?>>
                                <label class="form-check-label">Laki-laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?php if ($jenis_kelamin == 'P') {
                                                                                                                echo "checked";
                                                                                                            }
                                                                                                            ?>>
                                <label class="form-check-label">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Alamat</label>
                        <input type="text" value="<?= $alamat; ?>" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                        <div class="invalid-feedback">
                            Valid Alamat is required.
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