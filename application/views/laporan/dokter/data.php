<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>List Data Dokter</h2>
    <div class="table-responsive">
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dokter ID</th>
                    <th>Nama Dokter</th>
                    <th>Poli Id</th>
                    <th>Nama Poli</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</main>