<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <!-- <img class="d-block mx-auto mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h2>KLINIK</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Poli</h4>
            <form action="<?php echo $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Poli ID</label>
                        <input type="text" class="form-control" value="<?= $poli_id; ?>" id="poli_id" name="poli_id" placeholder="Kode Poli" required>
                        <div class="invalid-feedback">
                            Valid Kode Poli is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="lastName" class="form-label">Nama Poli</label>
                        <input type="text" class="form-control" value="<?= $nama_poli; ?>" id="nama_poli" name="nama_poli" placeholder="Nama Poli" required>
                        <div class="invalid-feedback">
                            Valid Nama Poli is required.
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                <button class="w-20 btn btn-warning btn-lg" name="reset" type="reset">Reset</button>
            </form>
        </div>
    </div>
</main>