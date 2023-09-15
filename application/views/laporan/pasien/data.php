<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>List Data Pasien</h2>
    <div class="table-responsive">
        <table class="table table-primary table-striped ">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Pasien ID</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</main>