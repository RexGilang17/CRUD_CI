<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Databerobat</h2>
    <a class="btn btn-primary btn-lg" href="<?php echo $base; ?>Berobat/add">Add New</a>
    <Hr></Hr>
    <div class="table-responsive">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">No Transaksi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Usia</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">By. Administrasi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($databerobat as $vdata) :
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $vdata->no_transaksi; ?>
                        </td>
                        <td>
                            <?php echo $vdata->tanggal_berobat; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_pasien; ?>
                        </td>
                        <td>
                            <?php echo $vdata->usia; ?>
                        </td>
                        <td>
                            <?php echo $vdata->jk; ?>
                        </td>
                        <td>
                            <?php echo $vdata->keluhan; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_poli; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_dokter; ?>
                        </td>
                        <td>
                            <?php echo $vdata->biaya_adm; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo $base; ?>Berobat/edit/<?php echo $vdata->no_transaksi ?>" role="button">Edit Data
                        
                        </a>
                            <a class="btn btn-danger" href="<?php echo $base; ?>Berobat/delete/<?php echo $vdata->no_transaksi ?>" role="button">Delete Data</a>
                            <!-- <a href="<?php echo $base; ?>Berobat/edit/<?php echo $vdata->no_transaksi ?>">
                                <i class="nav-icon fas fa-pencil"></i>
                                Edit Data
                            </a> ||
                            <a href="<?php echo $base; ?>Berobat/delete/<?php echo $vdata->no_transaksi ?>">
                                <i class="nav-icon fas fa-erase"></i>
                                Delete Data
                            </a> -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>