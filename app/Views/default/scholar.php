<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="Description" CONTENT="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
	<meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
	<title>Scholar</title>
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


</head>

<body>


<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">FORM ID GOOGLE SCHOLAR</h4>

                                

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
			<div class="row">
				<div class="col-12">
				<form class="form-horizontal" action="rekognisidosen/save" method="post" role="form" enctype="multipart/form-data">
					<div class="card-box">
						<h4 class="m-t-0 header-title">Google Scholar</h4>
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
                                                        <label class="col-2 col-form-label">Id Google Scholar</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Id Scholar">                   
												<div class="invalid-feedback">
													<?= $validation->getError('idsholar'); ?>
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


	<!-- Init Js file -->
	<script type="text/javascript" src="../assets/pages/jquery.form-advanced.init.js"></script>



</body>

</html>