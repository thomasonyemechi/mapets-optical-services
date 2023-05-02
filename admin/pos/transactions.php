<?php
session_start();
ob_start();
ob_clean();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>



    <title>Transaction History </title>

    <style type="text/css">
        .search-result {
            width: 100%;
            height: 380px;
            background-color: whitesmoke;
        }
    </style>
</head>

<?php
    $page_number = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 150;
    $initial_page = ($page_number - 1) * $limit;
    $ct = $db->query("SELECT id FROM  sales ");
    $total_rows = mysqli_num_rows($ct);
    $total_pages = ceil($total_rows / $limit);
?>

<body>
    <div id="db-wrapper">
        <?php include('sidebar.php') ?>
        <div id="page-content">
            <?php include('../header.php') ?>
            <?php if (isset($report)) {
                echo Alert();
            } ?>
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Transaction</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="course-category.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Transactions
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $sql = $db->query("SELECT * FROM sales ORDER BY id desc LIMIT $initial_page, $limit ");
                ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="fw-bold"> <i class="fe fe-list"> </i>Recent Transaction</h4>
                                <table class="table table-sm mt-2 table-striped ">
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    while ($item = mysqli_fetch_array($sql)) {
                                        $sum = summary($item['sumary_id']);
                                    ?>
                                        <tr>
                                            <td class="align-middle"><?= getItem($item['item_id'])['name'] ?> </td>
                                            <td class="align-middle"><?= $item['quantity'] ?></td>
                                            <td class="align-middle"><?= money($item['price']) ?></td>
                                            <td class="align-middle"><?= money($item['price'] * $item['quantity']) ?></td>
                                            <td class="align-middle"> <?= date('j/m/Y h:i', strtotime($sum['created_at'])) ?> </td>
                                            <td class="align-middle">
                                                <button class="btn btn-xs px-1 py-0 btn-primary"><i class="fe fe-printer"></i> </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>

                                <?php if ($total_pages > 1) { ?>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <nav>
                                            <ul class="pagination justify-content-center mb-0">
                                                <?php for ($i = 1; $i <= $total_pages; $i++) {  ?>
                                                    <li class="page-item <?= ($page_number == $i) ? 'active' : '' ?>">
                                                        <a class="page-link mx-1 rounded" href="?page=<?= $i ?>"><?= $i ?></a>
                                                    </li>
                                                <?php  } ?>
                                            </ul>
                                        </nav>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Libs JS -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/libs/odometer/odometer.min.js"></script>
    <script src="../../assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../../assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="../../assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
    <script src="../../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../../assets/libs/dragula/dist/dragula.min.js"></script>
    <script src="../../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script src="../../assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="../../assets/libs/jQuery.print/jQuery.print.js"></script>
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/libs/prismjs/components/prism-scss.min.js"></script>
    <script src="../../assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
    <script src="../../assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
    <script src="../../assets/libs/typed.js/lib/typed.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
    <script src="../../assets/libs/jsvectormap/dist/maps/world.js"></script>
    <script src="../../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <script src="../../cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


    <script src="../../assets/js/theme.min.js"></script>

    <script type="text/javascript">
        $(function() {

            setTimeout(function() {
                $("#refresh").fadeOut(3000);
            }, 3000);
        })
    </script>
</body>

</html>