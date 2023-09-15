<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Data Poli</h2>
    <a class="btn btn-primary btn-lg " href="<?php echo $base; ?>Datapoli/add">Tambah Poli</a>
    <hr>
    <div class="table-responsive">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Poli ID</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($datapoli as $vdata) :
                ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $vdata->poli_id; ?>
                        </td>
                        <td>
                            <?php echo $vdata->nama_poli; ?>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="<?php echo $base; ?>Datapoli/edit/<?php echo $vdata->poli_id ?>" role="button">Edit Data</a>
                            <a class="btn btn-danger" href="<?php echo $base; ?>Datapoli/delete/<?php echo $vdata->poli_id ?>" role="button">Delete Data</a>
                            <!-- <a href="<?php echo $base; ?>Datapoli/edit/<?php echo $vdata->poli_id ?>">
                                <i class="nav-icon fas fa-pencil"></i>
                                Edit Data
                            </a> ||
                            <a href="<?php echo $base; ?>Datapoli/delete/<?php echo $vdata->poli_id ?>">
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