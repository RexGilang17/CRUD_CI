<style type="text/css">
    .d-none {
        display: none;
    }
</style>
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">

    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Form Transaksi</h2>
    </div>

    <div class="row g-5">
        <div class="col-md-12 col-lg-12">
            <h4 class="mb-3">Form Transaksi</h4>
            <form action="<?php echo $url_post ?>" method="post">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Kode Transaksi</label>
                        <input type="text" readonly="readonly" class="form-control" value="<?= $kode; ?>" id="id_trans" name="id_trans" placeholder="Kode Transaksi" required>
                        <div class="invalid-feedback">
                            Valid Kode Customer is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="Nama Supplier" class="form-label">Jenis Transaksi</label>
                        <select id="jns_transaksi" name="jns_transaksi" class="form-control">
                            <option value="0">--Pilih--</option>
                            <?php if ($jns_trans == 'in') {
                                $jns = 'Transaksi Masuk';
                            } else {
                                $jns = 'Transaksi Keluar';
                            }

                            ?>

                            <option selected="selected" value="<?= $jns_trans; ?>"><?= $jns; ?></option>
                            <option value="in">Transaksi Masuk</option>
                            <option value="out">Transaksi Keluar</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">Tgl Transaksi</label>
                        <input type="date" class="form-control" id="tgl_trans" value="<?= $tgl_trans; ?>" name="tgl_trans" placeholder="Tanggal Transaksi" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="telp" class="form-label">No. Referensi</label>
                        <input type="text" class="form-control" id="ref_id" name="ref_id" value="<?= $ref_id; ?>" placeholder="No. Ref" required>
                        <div class="invalid-feedback">
                            Valid No.Telp is required.
                        </div>
                    </div>
                    <div class="col-sm-6 <?php if ($jns_trans != 0) { ?> d-none <?php } ?> supplier_show">
                        <label for="Nama Supplier" class="form-label">Supplier </label>
                        <select id="supp_id" name="supp_id" class="form-control">
                            <option value="0">--Pilih--</option>
                            <?php print_r($default['supplier']);
                            foreach ($default['supplier'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6 <?php if ($jns_trans != 1) { ?> d-none <?php } ?> cust_show">
                        <label for="Nama Supplier" class="form-label">Customer </label>
                        <select id="cust_id" name="cust_id" class="form-control">
                            <option value="0">--Pilih--</option>
                            <?php print_r($default['customer']);
                            foreach ($default['customer'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                </div>

                <hr class="my-4">

                <button class="w-20 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
                <a class="w-20 btn btn-primary btn-lg" href="<?php echo $base; ?>Transaksi">Cancel</a>
            </form>
        </div>
    </div>
    <hr style="border: 2px solid red;">
    <div class="row g-5">
        <div class="col-md-12 col-lg-6">
            <h4 class="mb-3">Data Detail</h4>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($datadetail as $vdata) :
                        ?>
                            <tr>
                                <td>
                                    <?php echo $no++; ?>
                                </td>
                                <td>
                                    <?php echo $vdata->kdbarang; ?>
                                </td>
                                <td>

                                    <?php echo $vdata->nmbarang; ?>
                                </td>
                                <td>
                                    <?php echo $vdata->qty; ?>
                                </td>
                                <td>
                                    <?php echo $vdata->harga; ?>
                                </td>
                                <td>
                                    <?php echo $vdata->total; ?>
                                </td>
                                <td>
                                    <button onClick='ParamFunc.editdata(<?php echo $vdata->id ?>)' class='btn btn-outline-warning btn-sm' data-toggle='tooltip' data-placement='bottom' title='Edit Data' type='button'><i class='fa fa-edit'></i> Edit</button>

                                    <a class='btn btn-outline-danger btn-sm' href="<?php echo $base; ?>Transaksi/delete_d/<?php echo $vdata->header_id ?>/<?php echo $vdata->id ?>">
                                        <i class="nav-icon fas fa-erase"></i>
                                        Delete Data
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <h4 class="mb-3">Form Detail</h4>
            <form action="<?php echo $url_post_detil ?>" method="post">
                <div class="row g-3">

                    <div class="col-sm-6  ">
                        <label for="Nama Barang" class="form-label">Nama Barang </label>

                        <input type="hidden" class="form-control" id="header_id" value="<?= $kode; ?>" name="header_id">

                        <input type="hidden" class="form-control" id="detail_id" name="detail_id" placeholder="detail_id" required>

                        <select id="kdbarang" name="kdbarang" class="form-control">
                            <?php print_r($default['kdbarang']);
                            foreach ($default['kdbarang'] as $row) { ?>
                                <option value="<?php echo (isset($row['value'])) ? $row['value'] : ''; ?>" <?php echo (isset($row['selected'])) ? $row['selected'] : ''; ?>>
                                    <?php echo (isset($row['display'])) ? $row['display'] : ''; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Qty</label>
                        <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty" required>
                        <div class="invalid-feedback">
                            Valid Qty is required.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="Kode Barang" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                        <div class="invalid-feedback">
                            Valid Harga is required.
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <button class="w-20 btn btn-primary btn-lg" name="submit_detail" type="submit">Save Detil</button>
                <a class="w-20 btn btn-primary btn-lg" href="<?php echo $base; ?>Transaksi">Cancel</a>
            </form>
        </div>
    </div>
</main>
<script src="<?php echo $base; ?>assets/js/jquery/jquery.min.js"></script>
<script>
    $('#jns_transaksi').on('change', function() {
        var selectedPackage = $('#jns_transaksi').val();
        if (selectedPackage == 'in') {
            $(".supplier_show").removeClass("d-none");
            $(".cust_show").addClass("d-none");
        } else if (selectedPackage == 'out') {
            $(".supplier_show").addClass("d-none");
            $(".cust_show").removeClass("d-none");
        }
    });


    var ParamFunc = {
        editdata: function(id) {
            $.ajax({
                type: "POST",
                url: '<?php echo $url_getdetail; ?>',
                dataType: "json",
                data: {
                    id: id,
                },
                cache: false,
                success: function(data, text) {
                    console.log(data)
                    if (data.hasil == 'true') {
                        var qty = data.qty;
                        var harga = data.harga;
                        var kdbarang = data.kdbarang;
                        var detail_id = data.detail_id;
                        $('#qty').val(qty);
                        $('#harga').val(harga);
                        $("#kdbarang").val(kdbarang).change();
                        $('#detail_id').val(detail_id);
                    } else {
                        alert('Gagal dapat detail');
                    }
                }
            });
        }
    }
</script>