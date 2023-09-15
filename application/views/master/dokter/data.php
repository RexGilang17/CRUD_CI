<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Dokter</h2>
    <a class="btn btn-primary btn-lg " href="<?php echo $base; ?>Datadokter/add">Tambah Dokter</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-primary table-striped ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dokter ID</th>
                    <th>Nama Dokter</th>
                    <th>Poli Id</th>
                    <th>Nama Poli</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($datadokter as $vdata) :
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $vdata->dokter_id; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_dokter; ?>
                        </td>
                        <td>
                            <?php echo $vdata->poli_id; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_poli; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo $base; ?>Datadokter/edit/<?php echo $vdata->dokter_id ?>" role="button">Edit Data</a>
                            <a class="btn btn-danger" href="<?php echo $base; ?>Datadokter/delete/<?php echo $vdata->dokter_id ?>" role="button">Delete Data</a>
                            <!-- <a href="<?php echo $base; ?>Datadokter/edit/<?php echo $vdata->dokter_id ?>">
                                <i class="nav-icon fas fa-pencil"></i>
                                Edit Data
                            </a> ||
                            <a href="<?php echo $base; ?>Datadokter/delete/<?php echo $vdata->dokter_id ?>">
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