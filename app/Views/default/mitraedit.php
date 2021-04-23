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
    <base href="http://localhost:8080/">

	<!-- Sweet Alert -->
	<link href="../../plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">



	<!-- Plugins css-->
	<link href="plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css"" rel="stylesheet" />
	<link rel="stylesheet" href="plugins/switchery/switchery.min.css"">


</head>

<body>

	<!-- modal tambah lembaga mitra-->
	<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">FORM UPDATE KERJASAMA MITRA</h4>

                                

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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


	
			<div class="row">
				<div class="col-12">
					<form class="form-horizontal" enctype="multipart/form-data" role="form" action="mitra/edit/<?= $kerjasama['id_kegiatankerjasama']; ?>" method="post">
                        <input type="hidden" name="id_kegiatankerjasama" value="<?= $kerjasama['id_kegiatankerjasama']; ?>">
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
                                                    <?php  if ($mitra['id_lembagamitra']== $kerjasama['id_lembagamitra']) : ?>
														<option value="<?= $mitra['id_lembagamitra']; ?>" selected><?= $mitra['nama_lembaga']; ?></option>
                                                        <?php else : ?>
                                                    <option value="<?= $mitra['id_lembagamitra']; ?>"><?= $mitra['nama_lembaga']; ?></option>
                                                    <?php endif; ?>
													<?php endforeach; ?>

													</optgroup>
												</select>

												<div class="invalid-feedback">
													<?= $validation->getError('lembagamitra'); ?>
												</div>
											</div>
											<button type="button" class="btn btn-custom waves-effect waves-light" data-toggle="modal" data-target="#modal-tambah-mitra">Tambah Lembaga Mitra</button>
										</div>
										<div class="form-group row">
											<label class="col-2 col-form-label">Nama Kegiatan</label>
											<div class="col-10">
												<input type="text" class="form-control <?= ($validation->hasError('namakegiatan')) ?  'is-invalid' : ''; ?>" name="namakegiatan" placeholder="Nama Kegiatan" value="<?= $kerjasama['nama_kegiatan'] ?>">
												<div class="invalid-feedback">
													<?= $validation->getError('namakegiatan'); ?>
												</div>
											</div>
										</div>

										<div class=" form-group row">
											<label class="col-2 col-form-label">Tingkat</label>
											<div class="col-10">
												<select class="form-control select2 <?= ($validation->hasError('tingkat')) ?  'is-invalid' : ''; ?>" name="tingkat">
													<option value="" disabled selected>Pilih Tingkat</option>
                                                    <?php $tingkat = array("Kota", "Provinsi", "Nasional", "Internasional"); ?>
                                                    <?php foreach ($tingkat as $item) : ?>
                                                    <?php if ($item==$kerjasama['tingkat']) :?>
                                                    <option value="<?= $item; ?>" selected><?= $item; ?></option>
                                                    <?php  else : ?>
                                                    <option value="<?= $item; ?>"><?= $item; ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach;?>

												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('tingkat'); ?>
												</div>
											</div>
										</div>


										<div class="form-group row">
											<label class="col-2 col-form-label">Tahun Kerjasama</label>
											<div class="col-4">
												<select class="form-control select2 <?= ($validation->hasError('tahunmulai')) ?  'is-invalid' : ''; ?>" name="tahunmulai">
													<option value="" disabled selected>Pilih Tahun Kerjasama</option>
                                                    <?php $tahunkerjasama = $kerjasama['tahun_kerjasama'];?>
                                                    <?php foreach ($tahun as $thn) : ?>
                                                        <?php if ($thn['id_tahun'] == $tahunkerjasama) : ?>
                                                            <option value="<?= $tahunkerjasama; ?>" selected><?= $tahunkerjasama; ?></option>
                                                            <?php $tahunkerjasama=null;?>
                                                        <?php else :?>
                                                            <option value="<?= $thn['id_tahun']; ?>"><?= $thn['id_tahun']; ?></option>
                                                        <?php endif;?>
                                                    <?php endforeach; ?>
                                                    <?php if (!is_null($tahunkerjasama)):?>
                                                        <option value="<?= $tahunkerjasama; ?>" selected><?= $tahunkerjasama; ?></option>
                                                    <?php endif;?>
												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('tahunmulai'); ?>
												</div>
											</div>

											<label class="col-2 col-form-label">Tahun Berakhir </label>
											<div class="col-4">
												<select class="form-control select2 <?= ($validation->hasError('tahunberakhir')) ?  'is-invalid' : ''; ?>" name="tahunberakhir">
													<option value="" disabled selected>Pilih Tahun Kerjasama Berakhir</option>
                                                    <?php $tahunberakhir = $kerjasama['tahun_berakhir'];?>
													<?php foreach ($tahun as $thn) : ?>
                                                    <?php if ($thn['id_tahun'] == $tahunberakhir) : ?>
														<option value="<?= $tahunberakhir; ?>" selected><?= $tahunberakhir; ?></option>
                                                    <?php $tahunberakhir=null;?>
                                                    <?php else :?>
                                                    <option value="<?= $thn['id_tahun']; ?>"><?= $thn['id_tahun']; ?></option>
                                                    <?php endif;?>
													<?php endforeach; ?>
                                                    <?php if (!is_null($tahunberakhir)):?>
                                                    <option value="<?= $tahunberakhir; ?>" selected><?= $tahunberakhir; ?></option>
                                                    <?php endif;?>
												</select>
												<div class="invalid-feedback">
													<?= $validation->getError('tahunberakhir'); ?>
												</div>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-2 col-form-label">Manfaat Kerjasama</label>
											<div class="col-10">
												<textarea class="form-control <?= ($validation->hasError('manfaat')) ?  'is-invalid' : ''; ?>" name="manfaat" rows="5" ><?= $kerjasama['manfaat_kerjasama']; ?></textarea>
												<div class="invalid-feedback">
													<?= $validation->getError('menfaat'); ?>
												</div>
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
									<button type="submit" name="submit" class="btn-lg btn-primary waves-effect w-md waves-light"> SUBMIT</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
    </div>




	<script src="../plugins/switchery/switchery.min.js"></script>
	<script src="../plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js""></script>
	<script src="../plugins/select2/js/select2.min.js"" type="text/javascript"></script>
	<script src="../plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
	<script src="../plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="../plugins/autocomplete/jquery.mockjax.js"></script>
	<script type="text/javascript" src="../plugins/autocomplete/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="../plugins/autocomplete/countries.js"></script>
	<script type="text/javascript" src="../assets/pages/jquery.autocomplete.init.js"></script>


	<!-- Init Js file -->
	<script type="text/javascript" src="../assets/pages/jquery.form-advanced.init.js"></script>
   
</body>

</html>