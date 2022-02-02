<?php
session_start();
ob_start();
ob_clean();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>

    <title>Add Users</title>
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
            <?php if(isset($report)) { echo Alert(); } ?>

            <!-- Page Header -->
            <!-- Container fluid -->
            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="border-bottom pb-4 mb-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-md-0">
                                <h1 class="mb-0 h2 fw-bold">Add Users</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="course-category.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Add Clients
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add Client</a>
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
                                <h3 class="card-title">Recently Added</h3>
                            </div>
                            <div class="table-responsive border-0 overflow-y-hidden">
                                <table class="table mb-0 text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="border-0 font-size-inherit">
                                                S/N
                                            </th>
                                            <th class="border-0">Names</th>
                                            <th class="border-0">ID</th>
                                            <th class="border-0">Age</th>
                                            <th class="border-0">Email</th>
                                            <th class="border-0">Phone Number</th>
                                            <th class="border-0">Address</th>
                                            <th class="border-0">Added</th>
                                            <th class="border-0"></th>
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
                                                    <a href="#" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover">
                                                            <?= ucwords($row['title'].' '.$row['lastname']. ' '.$row['firstname']) ?>
                                                        </h5>
                                                    </a>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="#" class="text-inherit">
                                                        <h5 class="mb-0 text-primary-hover">
                                                            <?= $row['id'] ?>
                                                        </h5>
                                                    </a>
                                                </td>
                                                <td class="align-middle"><?= $row['age'] ?> yrs</td>
                                                <td class="align-middle"><?= $row['email'] ?></td>
                                                <td class="align-middle"><?= $row['phone'] ?></td>
                                                <td class="align-middle"><?= $row['address'] ?></td>
                                                <td class="align-middle"><?= $row['created_at'] ?></td>
                                                <td class="text-muted align-middle">
                                                    <span class="dropdown dropstart">
                                                        <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown3" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                                                            <span class="dropdown-header">Action</span>
                                                            <a class="dropdown-item" href="userprofile.php?sha=<?= sha1($row['id']) ?>&&token=<?= $row['id'] ?>"><i class="fe fe-inbox dropdown-item-icon"></i> Go to Profile</a>
                                                        </span>
                                                    </span>
                                                </td>
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

    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Add User
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row">
                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter last name" required>
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address">
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Age<span class="text-danger">*</span></label>
                            <input type="number" name="age" class="form-control" placeholder="Enter age" required>
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Gender<span class="text-danger">*</span></label>
                            <select class="form-control" name="gender">
                                <option disabled value="" selected>...Select Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-3 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="registerClient" class="btn btn-primary">Save Info</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
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

    <script type="text/javascript">
        $(function () {
            $('#addUserModal').modal('show');

            setTimeout(function() {
                $("#refresh").fadeOut(3000);
            }, 3000);
        })
    </script>
</body>

</html>