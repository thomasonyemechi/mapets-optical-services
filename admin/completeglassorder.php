<?php
session_start(); ob_start(); ob_clean();

    // if($_GET['sha'] == sha1($_GET['token']))
    // {
    // }else { header('location: index.php'); }

$client = $_GET['token'] ?? 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>

    <title>Glass Complete Orders</title>
</head>

<body>
    <!-- Wrapper -->
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <?php include('sidebar.php') ?>
        <!-- Page Content -->
        <div id="page-content">

            <?php include('header.php') ?>

            <!-- Page Header -->
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Glass Complete Orders</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Glass Complete Orders
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Tab -->
                        <div class="tab-content">
                            <!-- Tab Pane -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
    

                                <?php $cards = $db->query("SELECT * FROM cards WHERE status>0 AND remark > 0 ORDER BY id DESC "); ?>

                                <!-- Card -->
                                

                                    <div class="card mb-4">
                                        <div class="card-header align-items-center">
                                                <h4 class="mb-0">Complete Orders</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <div class="table-responsive border-0 overflow-y-hidden">
                                                <table class="table mb-0 text-nowrap">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="border-0 font-size-inherit">
                                                                S/N
                                                            </th>
                                                            <th class="border-0">Client</th>
                                                            <th class="border-0">Card ID</th>
                                                            <th class="border-0">Option</th>
                                                            <th class="border-0">Date</th>
                                                            <th class="border-0"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(mysqli_num_rows($cards) > 0){ 
                                                            $i = 1; while ($row = mysqli_fetch_array($cards)) { ?>
                                                            <tr>
                                                                <td class="align-middle"><?= $i++ ?></td>
                                                                <td class="align-middle">
                                                                    <a href="#" class="text-inherit">
                                                                        <h5 class="mb-0 text-primary-hover">
                                                                            <?= getClientName($row['client_id']) ?>
                                                                        </h5>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <a href="#" class="text-inherit">
                                                                        <h5 class="mb-0 text-primary-hover">
                                                                            <?= $row['card_id'] ?>
                                                                        </h5>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">

                                                                    <?php $rem = $row['remark']; if($rem == 0) { ?>
                                                                        <form method="POST">
                                                                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                                            <select class="form-control" name="postOrderUpdate" style="height: 1px" onchange="submit()" >
                                                                                <option selected disabled="">Select Remark</option>
                                                                                <option value="1">Special Order</option>
                                                                            </select>
                                                                        </form>
                                                                    <?php }else{ echo cardRemark($row['remark']); }?>
                                                                </td>
                                                                <td class="align-middle"><?= $row['created_at']?></td>
                                                                <td class="align-middle"><?= cardRemark($row['remark'], 234) ?></td>
                                                            </tr>
                                                        <?php } }else{ ?>
                                                            <tr>
                                                                <td colspan="12">
                                                                    <div class="alert alert-danger">
                                                                        There are no pending Orders
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Script -->
    <!-- Libs JS -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/odometer/odometer.min.js"></script>
    <script src="../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="../assets/libs/prismjs/prism.js"></script>
    <script src="../assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>




    <!-- clipboard -->
    <script src="../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>
</body>

</html>