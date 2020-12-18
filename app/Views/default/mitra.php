<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
	<meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
	<title>Rekognisi Dosen</title>
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
	<div id="modal-tambah-mitra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<form action="/mitra/savelembaga" method="post">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title">Tambah Lembaga Mitra</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="field-1" class="control-label">Nama Lembaga Mitra</label>
									<input type="text" class="form-control" id="tambah_namamitra" name="tambah_namamitra" placeholder="Nama Lembaga Mitra" autofocus>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group no-margin">
									<label for="field-7" class="control-label">Keterangan</label>
									<textarea class="form-control" id="tambah_ketmitra" name="tambah_ketmitra" placeholder="Tulis Keterangan"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">TUTUP</button>
						<button type="submit" name="simpan_modal" class="btn btn-info waves-effect waves-light">SIMPAN</button>
					</div>
				</div>
			</div>
		</form>
	</div>


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
					<form class="form-horizontal" role="form" action="mitra/save" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<h4 class="m-t-0 header-title">Kerjasama Mitra</h4>
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
											<label class="col-2 col-form-label">Nama Lembaga Mitra</label>
											<div class="col-7">
												<select class="form-control select2" name="lembagamitra">
													<option value="" disabled selected>Pilih Lembaga Mitra</option>
													<?php foreach ($lembagamitra as $mitra) : ?>
														<option value="<?= $mitra['id_lembagamitra']; ?>"><?= $mitra['nama_lembaga']; ?></option>
													<?php endforeach; ?>

													</optgroup>
												</select>
											</div>
											<button type="button" class="btn btn-custom waves-effect waves-light" data-toggle="modal" data-target="#modal-tambah-mitra">Tambah Lembaga Mitra</button>
										</div>
										<div class="form-group row">
											<label class="col-2 col-form-label">Nama Kegiatan</label>
											<div class="col-10">
												<input type="text" class="form-control" name="namakegiatan" placeholder="Nama Kegiatan">
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Tingkat</label>
											<div class="col-10">
												<select class="form-control select2" name="tingkat">
													<option value="" disabled selected>Pilih Tingkat</option>
													<option value="Kota">Kota</option>
													<option value="Provinsi">Provinsi</option>
													<option value="Nasional">Nasional</option>
													<option value="Internasional">Internasional</option>

												</select>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-2 col-form-label">Tahun Kerjasama</label>
											<div class="col-4">
												<select class="form-control select2" name="tahunmulai">
													<option value="" disabled selected>Pilih Tahun Kerjasama</option>
													<?php foreach ($tahun as $thn) : ?>
														<option value="<?= $thn['id_tahun']; ?>"><?= $thn['id_tahun']; ?></option>
													<?php endforeach; ?>
													<option value="2020">2020</option>
												</select>
											</div>

											<label class="col-2 col-form-label">Tahun Berakhir </label>
											<div class="col-4">
												<select class="form-control select2" name="tahunberakhir">
													<option value="" disabled selected>Pilih Tahun Kerjasama Berakhir</option>
													<?php foreach ($tahun as $thn) : ?>
														<option value="<?= $thn['id_tahun']; ?>"><?= $thn['id_tahun']; ?></option>
													<?php endforeach; ?>
													<option value="2020">2020</option>
												</select>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Manfaat Kerjasama</label>
											<div class="col-10">
												<textarea class="form-control" name="manfaat" rows="5"></textarea>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-2 col-form-label">Bukti Kerjasama</label>
											<div class="col-8">
												<input type="file" name="buktikerjasama" class="filestyle" data-buttonname="btn-primary" multiple>
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




	<!-- jQuery  -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/metisMenu.min.js"></script>
	<script src="../assets/js/waves.js"></script>
	<script src="../assets/js/jquery.slimscroll.js"></script>

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