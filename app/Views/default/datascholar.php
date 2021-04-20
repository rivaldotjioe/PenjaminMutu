<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Data Google Scholar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />



    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


</head>


<body>
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">DATA GOOGLE SCHOLAR</h4>

                                

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>Rekognisi Dosen</b></h4>

                <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Judul Publikasi</th>
                            <th>Author</th>
                            <th>Jurnal</th>
                            <th>Tahun</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($datascholar as $d) : ?>
                            <tr>
                                <td><?= $d['title']; ?></td>
                                <td><?= $d['authors']; ?></td>
                                <td><?= $d['publisherDetails']; ?></td>
                                <td><?= $d['year']; ?></td>
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




    <!-- Required datatable js -->
    <script src="../plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- Buttons examples -->
    <script src="../plugins/datatables/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/jszip.min.js" type="text/javascript"type="text/javascript"></script>
    <script src="../plugins/datatables/pdfmake.min.js"type="text/javascript"></script>
    <script src="../plugins/datatables/vfs_fonts.js"type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.html5.min.js"type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.print.min.js"type="text/javascript"></script>
    <script src="../plugins/datatables/buttons.colVis.min.js"type="text/javascript"></script>
    <!-- Responsive examples -->
    <script src="../plugins/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="../plugins/datatables/responsive.bootstrap4.min.js" type="text/javascript"></script>



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