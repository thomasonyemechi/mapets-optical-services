<?php
session_start();ob_start();ob_clean();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>

    <title>Dashboard</title>
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
                                <h1 class="mb-0 h2 fw-bold">Dashboard</h1>
                            </div>
                          <!--   <div class="d-flex">
                                <div class="input-group me-3  ">
                                    <input class="form-control flatpickr" type="text" placeholder="Select Date" aria-describedby="basic-addon2">

                                    <span class="input-group-text text-muted" id="basic-addon2"><i class="fe fe-calendar"></i></span>

                                </div>
                                <a href="#" class="btn btn-primary">Setting</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Clients</span>
                                    </div>
                                    <div>
                                        <span class="fe fe-shopping-bag fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    <?php 
                                        $sql = $db->query("SELECT * FROM clients ");
                                        echo mysqli_num_rows($sql);
                                    ?>
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>20</span>
                                <span class="ms-1 fw-medium">Add last 30 days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Cards</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-book-open fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    <?php 
                                        $sql = $db->query("SELECT * FROM cards ");
                                        echo mysqli_num_rows($sql);
                                    ?>
                                </h2>
                                <span class="text-danger fw-semi-bold"><?php 
                                        $sql = $db->query("SELECT * FROM cards WHERE remark = 1 ");
                                        echo mysqli_num_rows($sql);
                                    ?></span>
                                <span class="ms-1 fw-medium">Special Orders</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Glass Orders</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-users fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    <?php 
                                        $sql = $db->query("SELECT * FROM cards WHERE status > 0 ");
                                        echo mysqli_num_rows($sql);
                                    ?>
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i><?php 
                                        $sql = $db->query("SELECT * FROM cards WHERE status > 0 AND remark > 0 ");
                                        echo mysqli_num_rows($sql);
                                    ?></span>
                                <span class="ms-1 fw-medium"><a class="text-muted" href="completeglassorder.php">Completed Orders</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                                    <div>
                                        <span class="fs-6 text-uppercase fw-semi-bold">Appointments</span>
                                    </div>
                                    <div>
                                        <span class=" fe fe-user-check fs-3 text-primary"></span>
                                    </div>
                                </div>
                                <h2 class="fw-bold mb-1">
                                    150
                                </h2>
                                <span class="text-success fw-semi-bold"><i class="fe fe-trending-up me-1"></i>12</span>
                                <span class="ms-1 fw-medium">Todays appointments </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    $sql = $db->query("SELECT * FROM clients ORDER BY id DESC LIMIT 20 ");
                ?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <!-- Card header -->
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Recently Added Client</h3>
                            </div>
                            <div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 font-size-inherit">
                                                S/N
                                            </th>
                                            <th class="border-0">Names</th>
                                            <th class="border-0">Age</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Phone Number</th>
                                            <th class="border-0">Address</th>
                                            <th class="border-0">Added</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i  = 1;
                                            while ($row = mysqli_fetch_array($sql)) { 
                                        ?>
                                            <tr>
                                                <td class="align-middle"><?= $i++ ?></td>
                                                <td class="align-middle">
                                                    <a href="userprofile.php?sha=<?= sha1($row['id']) ?>&&token=<?= $row['id'] ?>" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover">
                                                            <?= ucwords($row['title'].' '.$row['lastname']. ' '.$row['firstname']) ?>
                                                        </h5>
                                                    </a>
                                                </td>
                                                <td class="align-middle"><?= $row['age'] ?> yrs</td>
                                                <td class="align-middle"><?= $row['email'] ?></td>
                                                <td class="align-middle"><?= $row['phone'] ?></td>
                                                <td class="align-middle"><?= $row['address'] ?></td>
                                                <td class="align-middle"><?= $row['created_at'] ?></td>
                                            </tr>
                                        <?php    } ?>
                                    </tbody>
                                </table>
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
    <script src="../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
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