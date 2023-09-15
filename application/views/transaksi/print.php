<style type="text/css">
    body {
        background: #eee;
        margin-top: 10px;
    }

    .text-danger strong {
        color: #9f181c;
    }

    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }

    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }

    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }

    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }

    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }

    .receipt-main thead th {
        color: #fff;
    }

    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }

    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }

    .receipt-right p i {
        text-align: center;
        width: 18px;
    }

    .receipt-main td {
        padding: 9px 20px !important;
    }

    .receipt-main th {
        padding: 13px 20px !important;
    }

    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }

    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }

    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }

    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }

    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }

    #container {
        background-color: #dcdcdc;
    }
</style>
<div class="col-md-12">
    <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo $base; ?>assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5>PT Maju Mundur</h5>
                            <p>Tgl : <?= $header->tgl_trans; ?></p>
                            <p>No.Ref : <?= $header->ref_id; ?></p>

                            <?php if ($header->jns_trans == 'out') { ?>
                                <p>Customer : <?= $header->nm_cust; ?></p>
                            <?php } else { ?>
                                <p>Supplier : <?= $header->nm_supp; ?></p>
                            <?php } ?>
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h3>INVOICE # <?= $id; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="color: black;">No.</th>
                            <th style="color: black;">Kode Barang</th>
                            <th style="color: black;">Nama Barang</th>
                            <th style="color: black;">Qty</th>
                            <th style="color: black;">Harga</th>
                            <th style="color: black;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bayar as $vdata) :
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
                                    <?php echo $vdata->hargaunit; ?>
                                </td>
                                <td>
                                    <?php echo $vdata->totalharga; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tr>
                        <th colspan="3" style="color: black;">Total</th>
                        <th style="color: black;"><?= $total->qtytotal; ?></th>
                        <th style="color: black;"> </th>
                        <th style="color: black;"><?= $total->sumtotal; ?></th>
                    </tr>
                </table>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b>Date :</b> 15 Aug 2016</p>
                            <h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Stamp</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>