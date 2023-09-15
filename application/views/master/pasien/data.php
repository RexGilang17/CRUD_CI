<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Pasien</h2>
    <a class="btn btn-primary btn-lg " href="<?php echo $base; ?>Datapasien/add">Tambah Pasien</a>
    <div class="table-responsive">
        <hr>
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Pasien ID</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($datapasien as $vdata) :
                ?> <tr>
                        <td> <?php echo $no++; ?> </td>
                        <td> <?php echo $vdata->pasien_id; ?> </td>
                        <td> <?php echo $vdata->nama_pasien; ?> </td>
                        <td> <?php echo $vdata->tanggal_lahir; ?> </td>
                        <td> <?php echo $vdata->jenis_kelamin; ?> </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo $base; ?>Datapasien/edit/<?php echo $vdata->pasien_id ?>" role="button">Edit Data</a>
                            <a class="btn btn-danger" href="<?php echo $base; ?>Datapasien/delete/<?php echo $vdata->pasien_id ?>" role="button">Delete Data</a>
                            <!-- <a href="<?php echo $base; ?>Datapasien/edit/<?php echo $vdata->pasien_id ?>">
                                <i class="nav-icon fas fa-pencil"></i>
                                Edit Data
                            </a> ||
                            <a href="<?php echo $base; ?>Datapasien/delete/<?php echo $vdata->pasien_id ?>">
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