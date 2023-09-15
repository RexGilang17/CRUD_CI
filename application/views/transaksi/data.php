<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
	<h2>Data Transaksi</h2>
	<a class="btn btn-primary btn-lg " href="<?php echo $base; ?>Transaksi/add">Tambah Transaksi</a>
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Kode Transaksi</th>
					<th scope="col">Jenis Transaksi</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($datatransaksi as $vdata) :
				?>
					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $vdata->id_trans; ?>
						</td>
						<td>
							<?php if ($vdata->jns_trans == 'in') {
								echo "<span style='color:blue;'>
                                Transaksi Masuk</span>";
							} else {
								echo "<span style='color:red;'>
                                Transaksi Keluar</span>";
							} ?>
						</td>
						<td>
							<?php echo $vdata->tgl_trans; ?>
						</td>
						<td>
							<a href="<?php echo $base; ?>Transaksi/edit/<?php echo $vdata->id_trans ?>">
								<i class="nav-icon fas fa-pencil"></i>
								Edit Data
							</a> ||
							<a href="<?php echo $base; ?>Transaksi/delete/<?php echo $vdata->id_trans ?>">
								<i class="nav-icon fas fa-erase"></i>
								Delete Data
							</a>||
							<a target="_blank" href="<?php echo $base; ?>Transaksi/print/<?php echo $vdata->id_trans ?>">
								<i class="nav-icon fas fa-print"></i>
								Print
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

</main>