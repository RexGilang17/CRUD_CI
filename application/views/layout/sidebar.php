 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
 	<div class="position-sticky pt-3">
 		<ul class="nav flex-column">

 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'form') { ?> active <?php } ?>" href="#">
 					<!-- <span data-feather="home"></span> -->
 					<h10> <b>FORM MENU</b></h10>
 				</a>
 			</li>
 			<hr>
 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'pasien') { ?> active <?php } ?>" aria-current="page" href="<?php echo $base; ?>Datapasien">
 					<span data-feather="file"></span>
 					Data Pasien

 				</a>
 			</li>

 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'dokter') { ?> active <?php } ?>" href="<?php echo $base; ?>Datadokter">
 					<span data-feather="file"></span>
 					Data Dokter
 				</a>
 			</li>
 			<li class="nav-item">
 				<a class="nav-link  <?php if ($menu == 'poli') { ?> active <?php } ?>" href="<?php echo $base; ?>Datapoli">
 					<span data-feather="file"></span>
 					Data Poli
 				</a>
 			</li>
 			<li class="nav-item">
 				<a class="nav-link  <?php if ($menu == 'berobat') { ?> active <?php } ?>" href="<?php echo $base; ?>Berobat">
 					<span data-feather="file"></span>
 					Berobat
 				</a>
 			</li>
 			<br>
			<br>	
 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'form') { ?> active <?php } ?>" href="#">
 					<!-- <span data-feather="home"></span> -->
 					<h10> <b>FORM LAPORAN</b></h10>
 				</a>
 			</li>
 			<hr>
 		</ul>
 		<ul class="nav flex-column">
 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'ldokter') { ?> active <?php } ?>" href="<?php echo $base; ?>Listdokter">
 					<span data-feather="file"></span>
 					List Dokter
 				</a>
 			</li>
 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'lpasien') { ?> active <?php } ?>" href="<?php echo $base; ?>Listpasien">
 					<span data-feather="file"></span>
 					List Pasien
 				</a>
 			</li>
 			<li class="nav-item">
 				<a class="nav-link <?php if ($menu == 'lberobat') { ?> active <?php } ?>" href="<?php echo $base; ?>Listberobat">
 					<span data-feather="file"></span>
 					List Data Berobat
 				</a>
 			</li>
 		</ul>
 	</div>
 </nav>