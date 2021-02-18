<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
	<meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
	<title>Kerjasama Mitra</title>
	<meta name="robots" content="noindex,nofollow">

	<title>Adminox - Responsive Web App Kit</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Sweet Alert -->
	<link href="../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">



	<!-- Plugins css-->
	<link href="../plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="../plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="../plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

	<!-- App css -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

	<script src="../assets/js/modernizr.min.js"></script>
</head>

<body>
<!-- modal tambah lembaga mitra-->

<div class="container">
<br>


<div class="content-page">
		<div class="content">
			<div class="container-fluid">
			</div>
		</div>
	</div>
	<div class="container-alt">
		<div class="col-12">
			<div class="row">
				<div class="col-12">
				<form class="form-horizontal" action="rekognisidosen/save" method="post" role="form" enctype="multipart/form-data">
					<div class="card-box">
						<h4 class="m-t-0 header-title">Rekognisi Dosen</h4>
						<?php if (session()->getFlashData('success')) : ?>
							<div class="alert alert-success" role="alert">
								<?= session()->getFlashData('success'); ?>
							</div>
						<?php elseif (session()->getFlashData('error')) : ?>
							<div class="alert alert-danger" role="alert">
								<?= session()->getFlashData('error'); ?>
							</div>
						<?php endif; ?>
						<div class="row">
							<div class="col-12">
								<div class="p-20">
									<?= csrf_field(); ?>
									
										<div class="form-group row">
											<label class="col-2 col-form-label">Nama Dosen</label>
											<div class="col-10">
												<select class="form-control select2 <?= ($validation->hasError('id_dosen')) ?  'is-invalid' : ''; ?>" name="id_dosen" value="<?= old('id_dosen'); ?>">
													<option value="" disabled selected>Pilih Nama Dosen</option>
													<option value="18082010026">Rivaldo Hadi Winata </option>
													<option value="18082010035">Helmy Kurniawan</option>
												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('id_dosen'); ?>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-2 col-form-label">Bidang Keahlian</label>
											<div class="col-10">
												<input type="text" class="form-control <?= ($validation->hasError('bidangkeahlian')) ?  'is-invalid' : ''; ?>" name="bidangkeahlian" placeholder="Bidang Keahlian" value="<?= old('bidangkeahlian'); ?>">
												<div class="invalid-feedback">
													<?= $validation->getError('bidangkeahlian'); ?>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Nama Rekognisi</label>
											<div class="col-10">
												<input type="text" class="form-control <?= ($validation->hasError('namarekognisi')) ?  'is-invalid' : ''; ?>" name="namarekognisi" placeholder="Nama Rekognisi" value="<?= old('namarekognisi'); ?>">
												<div class="invalid-feedback">
													<?= $validation->getError('namarekognisi'); ?>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Tingkat</label>
											<div class="col-4">
												<select class="form-control select2 <?= ($validation->hasError('tingkat')) ?  'is-invalid' : ''; ?>" name="tingkat" value="<?= old('tingkat'); ?>">
													<option value="" disabled selected>Pilih Tingkat</option>
													<?php foreach ($tingkat as $t) : ?>
														<option value="<?= $t['id_tingkat']; ?>"><?= $t['keterangan']; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('tingkat'); ?>
												</div>
											</div>

											<label class="col-2 col-form-label">Tahun </label>
											<div class="col-4">
												<select class="form-control select2 <?= ($validation->hasError('id_tahun')) ?  'is-invalid' : ''; ?>" name="id_tahun" value="<?= old('id_tahun'); ?>">
													<option value="" disabled selected>Pilih Tahun</option>
													<?php foreach ($tahun as $thn) : ?>
														<option value="<?= $thn['id_tahun']; ?>"><?= $thn['id_tahun']; ?></option>
													<?php endforeach; ?>
												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('id_tahun'); ?>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Keterangan </label>
											<div class="col-10">
												<textarea class="form-control <?= ($validation->hasError('keterangan')) ?  'is-invalid' : ''; ?>" name="keterangan" rows="5" value="<?= old('keterangan'); ?>"></textarea>
												<div class="invalid-feedback">
													<?= $validation->getError('keterangan'); ?>
												</div>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-2 col-form-label">Bukti Rekognisi</label>
											<div class="col-8">
												<input type="file" name="buktirekognisi" class="filestyle <?= ($validation->hasError('buktirekognisi')) ?  'is-invalid' : ''; ?>" data-buttonname="btn-primary" multiple>
												<div class="invalid-feedback">
													<?= $validation->getError('buktirekognisi'); ?>
												</div>
											</div>
										</div>

								</div>
							</div>
							<div align="right" class="input-field col s11">
								<button type="submit" name="submit" class="btn-lg btn-primary waves-effect w-md waves-light" id="sa-warning"> SUBMIT</button>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>




		<!-- jQuery  -->
		<script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	<script src="../plugins/switchery/switchery.min.js"></script>
	<script src="../plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
	<script src="../plugins/select2/js/select2.min.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="../plugins/autocomplete/jquery.mockjax.js"></script>
	<script type="text/javascript" src="../plugins/autocomplete/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="../plugins/autocomplete/countries.js"></script>
	<script type="text/javascript" src="../assets/pages/jquery.autocomplete.init.js"></script>
	<!-- Sweet-Alert  -->
	<script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
	<script src="../assets/pages/jquery.sweet-alert.init.js"></script>

	<!-- Init Js file -->
	<script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>

	<!-- App js -->
	<script src="../assets/js/jquery.core.js"></script>
	<script src="../assets/js/jquery.app.js"></script>

</body>

</html>