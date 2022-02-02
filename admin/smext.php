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

    <title>User Profile</title>
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
                                <h1 class="mb-0 h2 fw-bold">User Profile</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="course-category.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            User Profile
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="nav btn-group" role="tablist">
                                <button class="btn btn-outline-white active" data-bs-toggle="tab" data-bs-target="#tabPaneGrid" role="tab" aria-controls="tabPaneGrid" aria-selected="true">
                                    <span class="fe fe-grid"></span>
                                </button>
                                <button class="btn btn-outline-white" data-bs-toggle="tab" data-bs-target="#tabPaneList" role="tab" aria-controls="tabPaneList" aria-selected="false">
                                    <span class="fe fe-list"></span>
                                </button>
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
                                <div class="mb-4">
                                    <input type="search" class="form-control" placeholder="Search Students" />
                                </div>
                                <div class="row">

                                    
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4">
                                            <!-- Card body -->
                                            
                                            <div class="card-body">
                                            
                                                <div class="text-center">
                                                    <div class="position-relative">
                                                        <img src="../assets/images/avatar/avatar-12.jpg" class="rounded-circle avatar-xl mb-3" alt="" />
                                                        <a href="#" class="position-absolute mt-10 ms-n5">
                                                            <span class="status bg-success"></span>
                                                        </a>
                                                    </div>
                                                    <h4 class="mb-0">  </h4>
                                                    <p class="mb-0">
                                                        <i class="fe fe-map-pin me-1 fs-6"></i>United States
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                    <span>Payments</span>
                                                    <span class="text-dark">$5,274</span>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2">
                                                    <span>Joined at</span>
                                                    <span> 17 Aug, 2020 </span>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Courses</span>
                                                    <span class="text-dark"> 12 </span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Pagination -->
                                        <nav>
                                            <ul class="pagination justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a class="page-link mx-1 rounded" href="#" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link mx-1 rounded" href="#">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- Tab Pane -->
                            <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                <!-- Card -->
                                <div class="card">
                                    <!-- Card Header -->
                                    <div class="card-header">
                                        <input type="search" class="form-control" placeholder="Search Students" />
                                    </div>
                                    <!-- Table -->
                                    <div class="table-responsive">
                                        <table class="table mb-0 text-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="border-0">Name</th>
                                                    <th scope="col" class="border-0">Enrolled</th>
                                                    <th scope="col" class="border-0">Joined At</th>
                                                    <th scope="col" class="border-0">
                                                        TotaL PAYMENT
                                                    </th>
                                                    <th scope="col" class="border-0">Locations</th>
                                                    <th scope="col" class="border-0"></th>
                                                    <th scope="col" class="border-0"></th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle border-top-0">
                                                        <div class="d-flex align-items-center">
                                                            <div class="position-relative">
                                                                <img src="../../assets/images/avatar/avatar-11.jpg" alt="" class="rounded-circle avatar-md me-2" />
                                                                <a href="#" class="position-absolute mt-5 ms-n4">
                                                                    <span class="status bg-success"></span>
                                                                </a>
                                                            </div>
                                                            <h5 class="mb-0">Guy Hawkins</h5>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        6 Courses
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        7 July, 2020
                                                    </td>
                                                    <td class="align-middle border-top-0">$5,274</td>
                                                    <td class="align-middle border-top-0">
                                                        Los Angeles, CA
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        <a href="#" class="fe fe-mail text-muted" data-bs-toggle="tooltip" data-placement="top" title="Message">
                                                        </a>
                                                    </td>
                                                    <td class="align-middle border-top-0">
                                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="fe fe-trash"></i></a>
                                                    </td>
                                                    <td class="text-muted px-4 py-3 align-middle border-top-0">
                                                        <span class="dropdown dropstart">
                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown">
                                                                <span class="dropdown-header">Settings</span>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle">
                                                        <div class="d-flex align-items-center">
                                                            <div class="position-relative">
                                                                <img src="../../assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle avatar-md me-2" />
                                                                <a href="#" class="position-absolute mt-5 ms-n4">
                                                                    <span class="status bg-secondary"></span>
                                                                </a>
                                                            </div>
                                                            <h5 class="mb-0">Dianna Smiley</h5>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle">3 Courses</td>
                                                    <td class="align-middle">15 Aug, 2020</td>
                                                    <td class="align-middle">$2,660</td>
                                                    <td class="align-middle">United Kingdom</td>
                                                    <td class="align-middle">
                                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-placement="top" title="Message"><i class="fe fe-mail"></i></a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#" class="text-muted" data-bs-toggle="tooltip" data-placement="top" title="Delete"><i class="fe fe-trash"></i></a>
                                                    </td>
                                                    <td class="text-muted px-4 py-3 align-middle">
                                                        <span class="dropdown dropstart">
                                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                                <span class="dropdown-header">Settings</span>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                                            </span>
                                                        </span>
                                                    </td>
                                                </tr>
                                        
                                            </tbody>
                                        </table>
                                        <nav>
                                            <ul class="pagination justify-content-center pb-3 pt-4">
                                                <li class="page-item disabled">
                                                    <a class="page-link mx-1 rounded" href="#" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link mx-1 rounded" href="#">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link mx-1 rounded" href="#"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
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

                        <div class="col-lg-12 mb-3 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div>
                            <button type="submit" name="addSubCategory" class="btn btn-primary">Save Info</button>
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


</body>

</html>