<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Data Mitra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="../assets/js/modernizr.min.js"></script>

</head>


<body>

    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Data Kerjasama Mitra</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nama Lembaga Mitra</th>
                            <th>Nama Kegiatan</th>
                            <th>Tingkat</th>
                            <th>Tahun Kerjasama</th>
                            <th>Lama Kerjasama </th>
                            <th>Manfaat</th>
                            <th>Bukti Kerjasama</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($kerjasamamitra as $k) : ?>
                            <tr>
                                <td><?= $k['nama_lembaga']; ?></td>
                                <td><?= $k['nama_kegiatan']; ?></td>
                                <td><?= $k['tingkat']; ?></td>
                                <td><?= $k['tahun_kerjasama']; ?></td>
                                <td><?= $k['durasi_kerjasama']; ?></td>
                                <td><?= $k['manfaat_kerjasama']; ?></td>
                                <td><a href="\buktikerjasama\<?= $k['bukti_kerjasama']; ?>"><?= $k['bukti_kerjasama']; ?></a></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end row -->



    <footer class="footer text-right">
        2020 Rivaldo and Helmy
    </footer>

    </div>
    </div>


    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/waves.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>

    <!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jszip.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/pdfmake.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/vfs_fonts.js" type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.html5.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.print.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.colVis.min.js" type="text/javascript"></script>
    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js" type="text/javascript"></script>

    <!-- App js -->
    <script src="../assets/js/jquery.core.js"></script>
    <script src="../assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>

</html>