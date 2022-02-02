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
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>

    <script src="../assets/js/select.min.js"></script>
    <link rel="stylesheet" href="../assets/css/selectb.css">
    <link rel="stylesheet" href="../assets/css/select.css">

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
            <?php $data = getClient($client); ?>

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
                            <?php if($client > 0) { ?>
                                <?php if($me['role'] > 0) { ?>
                                    <div>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCardModal">
                                            Add Card For <?= getClientName($client) ?></a>
                                    </div>
                                <?php } ?> 
                            <?php } ?>
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
                                    <form>
                                        <select name="selectUser" class="form-control  " onchange="submit()">
                                            <option>...Select Client</option>
                                            <?php $clients = $db->query("SELECT * FROM clients "); while($row = mysqli_fetch_array($clients)){ ?>
                                                <option value="<?= $row['id'] ?>"> <?= ucwords($row['title'].' '.$row['firstname'].' '.$row['lastname']) ?> <?= $row['id'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </div>

                                <?php if($client > 0) { ?>
                                    <div class="row">                                    
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                            <!-- Card -->
                                            <div class="card mb-4">
                                                <!-- Card body -->
                                                
                                                <div class="card-header align-items-center card-header-height  d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0">Profile Information</h4>

                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                
                                                    <div class="text-center">
                                                        <div class="position-relative">
                                                            <img src="../assets/images/avatar/avatar-12.jpg" class="rounded-circle avatar-xl mb-3" alt="" />
                                                            <a href="#" class="position-absolute mt-10 ms-n5">
                                                                <span class="status bg-success"></span>
                                                            </a>
                                                        </div>
                                                        <h4 class="mb-0"><?= getClientName($client) ?></h4>
                                                        <p class="mb-0">
                                                            <i class="fe fe-map-pin me-1 fs-6"></i><?= $data['address']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between border-bottom py-2 ">
                                                        <div>
                                                            <span>Email:</span>
                                                            <span><?= $data['email']; ?></span>
                                                        </div>
                                                        <div>
                                                            <span>Phone:</span>
                                                            <span><?= $data['phone']; ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between border-bottom py-2">
                                                        <div>
                                                            <span>Age:</span>
                                                            <span><?= $data['age']; ?> yrs </span>
                                                        </div>
                                                        <div>
                                                            <span>Date Added:</span>
                                                            <span> <?= $data['created_at']; ?> </span>
                                                        </div>
                                                    </div>
                                                 
                                                </div>
                                                   <div class="card-footer">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editUserModal" class="btn btn-primary">Edit Profile</button>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#allCardModal" class="btn btn-secondary">See All Card</button>
                                                    </div>

                                            </div>

                                            <?php $cards = $db->query("SELECT * FROM cards WHERE client_id=$client AND status>0 ORDER BY id DESC "); ?>

                                            <!-- Card -->
                                            <?php if(mysqli_num_rows($cards) > 0){ ?>

                                                <div class="card mb-4">
                                                    <div class="card-header align-items-center">
                                                            <h4 class="mb-0">Glass Orders</h4>
                                                    </div>
                                                    <div class="card-body">
                                                    
                                                        <div class="table-responsive border-0 overflow-y-hidden">
                                                            <table class="table mb-0 text-nowrap">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th class="border-0 font-size-inherit">
                                                                            S/N
                                                                        </th>
                                                                        <th class="border-0">ID</th>
                                                                        <th class="border-0">Option</th>
                                                                        <th class="border-0">Date</th>
                                                                        <th class="border-0"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 1; while ($row = mysqli_fetch_array($cards)) { ?>
                                                                        <tr>
                                                                            <td class="align-middle"><?= $i++ ?></td>
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
                                                                                            <option value="2">BF</option>
                                                                                            <option value="3">Easy</option>
                                                                                            <option value="1">Special Order</option>
                                                                                            
                                                                                        </select>
                                                                                    </form>
                                                                                <?php }else{ echo cardRemark($row['remark']); }?>
                                                                            </td>
                                                                            <td class="align-middle"><?= $row['created_at']?></td>
                                                                            <td class="align-middle"><?= cardRemark($row['remark'], 234) ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                            <!-- Card -->
                                            <div class="card mb-4">
                                                <!-- Card body -->
                                                <div class="card-header align-items-center card-header-height  d-flex justify-content-between align-items-center">
                                                    <h4 class="mb-0">Last Card Details</h4>
                                                    <button type="button" class="btn btn-default btn-xs" onclick="printOut()">Print Card</button>
                                                </div>
                                                <div class="p-0 printable " id="displaySingleBody">
                                                    <div class="card-body"><em>Loading Cards ...</em></div>
                                                </div>
                                                   
                                            </div>
                                        </div>
                                    </div>
                                <?php }  ?>
                            </div>
                        
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Edit <?= getClientName($client) ?> Profile
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row">
                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="firstname"  class="form-control" placeholder="First Name" value="<?= $data['firstname']; ?>"required>
                        </div>
                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter last name" value="<?= $data['lastname']; ?>" required>
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address" value="<?= $data['email']; ?>">
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="<?= $data['phone']; ?>">
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Age<span class="text-danger">*</span></label>
                            <input type="number" name="age" class="form-control" placeholder="Enter age" value="<?= $data['age']; ?>" required>
                        </div>

                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="<?= $data['title']; ?>" required>
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        </div>


                        <div class="col-lg-6 mb-3 mb-2 ">
                            <label class="form-label" >Gender<span class="text-danger">*</span></label>
                            <select class="form-control" name="gender">
                                <option><?= $data['gender']; ?></option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>

                        <div class="col-lg-6 mb-3 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2"><?= $data['address']; ?></textarea>
                        </div>
                        <div>
                            <button type="submit" name="editClientProfile" class="btn btn-primary">Update Info</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addCardModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Add New Card For <?= getClientName($client) ?>
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row">

                    <!--     <div class="col-md-12 form-group">
                            <label>Card ID</label>
                            <input type="number" name="card_id" class="form-control mb-3" placeholder="Enter card Id" required>
                            
                        </div> -->
                        <div class="col-md-12 form-group">
                            <input type="hidden" name="client" value="<?= $client ?>">
                            <label>Complaint</label>
                            <textarea class="form-control mb-3" rows="2" name="complaint" placeholder="Enter Complaints"></textarea>

                            <label>Past History</label>
                            <textarea class="form-control mb-3" rows="2" name="history" placeholder="Enter History"></textarea>
                        </div>


                        <hr>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Distance (OD) (Without Glasses) </label>
                            <select class="form-control mb-3" name="visualAcuityWithoutGlassesDistanceOd">
                                <option value="" >.. Select VAD||OD</option>

                                <option>NLP</option> <option>HM +ve</option>
                                <option>HM -ve</option>
                                <option>cf@3mtrs</option>
                                <option>cf@2mtrs</option>
                                <option>cf@1mtrs</option>
                                <option>cfcf</option> <option>6/60</option>
                                <option>6/36</option> <option>6/24</option>
                                <option>6/18</option> <option>6/12</option>
                                <option>6/9</option> <option>6/6</option>
                                <option>6/5</option> <option>6/4</option>
                            </select> 
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Distance (OS) (Without Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithoutGlassesDistanceOs">
                                <option value="">.. Select VAD|OS</option>
                                <option>NLP</option>
                                <option>HM +ve</option>
                                <option>HM -ve</option>
                                <option>cf@3mtrs</option>
                                <option>cf@2mtrs</option>
                                <option>cf@1mtrs</option>
                                <option>cfcf</option>
                                <option>6/60</option>
                                <option>6/36</option>
                                <option>6/24</option>
                                <option>6/18</option>
                                <option>6/12</option>
                                <option>6/9</option>
                                <option>6/6</option>
                                <option>6/5</option>
                                <option>6/4</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Near (OD) (Without Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithoutGlassesNearOd">
                                <option value="">..Select VAN||OD</option>
                                <option>
                                    < N36</option>
                                <option>N36</option>
                                <option>N24</option>
                                <option>N18</option>
                                <option>N12</option>
                                <option>N10</option>
                                <option>N8</option>
                                <option>N6</option>
                                <option>N5</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Near (OS) (Without Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithoutGlassesNearOs">
                                <option value="">..Select VAN||OS</option>
                                <option>
                                    < N36</option>
                                <option>N36</option>
                                <option>N24</option>
                                <option>N18</option>
                                <option>N12</option>
                                <option>N10</option>
                                <option>N8</option>
                                <option>N6</option>
                                <option>N5</option>
                            </select>
                        </div>

                        <hr>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Distance (OD) (With Glasses) </label>
                            <select class="form-control mb-3" name="visualAcuityWithGlassesDistanceOd">
                                <option value="">.. Select VAD||OD</option>

                                <option>NLP</option> <option>HM +ve</option>
                                <option>HM -ve</option>
                                <option>cf@3mtrs</option>
                                <option>cf@2mtrs</option>
                                <option>cf@1mtrs</option>
                                <option>cfcf</option> <option>6/60</option>
                                <option>6/36</option> <option>6/24</option>
                                <option>6/18</option> <option>6/12</option>
                                <option>6/9</option> <option>6/6</option>
                                <option>6/5</option> <option>6/4</option>
                            </select> 
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Distance (OS) (With Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithGlassesDistanceOs">
                                <option value="">.. Select VAD|OS</option>
                                <option>NLP</option>
                                <option>HM +ve</option>
                                <option>HM -ve</option>
                                <option>cf@3mtrs</option>
                                <option>cf@2mtrs</option>
                                <option>cf@1mtrs</option>
                                <option>cfcf</option>
                                <option>6/60</option>
                                <option>6/36</option>
                                <option>6/24</option>
                                <option>6/18</option>
                                <option>6/12</option>
                                <option>6/9</option>
                                <option>6/6</option>
                                <option>6/5</option>
                                <option>6/4</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Near (OD) (With Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithGlassesNearOd">
                                <option value="">..Select VAN||OD</option>
                                <option>
                                    < N36</option>
                                <option>N36</option>
                                <option>N24</option>
                                <option>N18</option>
                                <option>N12</option>
                                <option>N10</option>
                                <option>N8</option>
                                <option>N6</option>
                                <option>N5</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Visual Activity Near (OS) (With Glasses)</label>
                            <select class="form-control mb-3" name="visualAcuityWithGlassesNearOs">
                                <option value="">..Select VAN||OS</option>
                                <option>
                                    < N36</option>
                                <option>N36</option>
                                <option>N24</option>
                                <option>N18</option>
                                <option>N12</option>
                                <option>N10</option>
                                <option>N8</option>
                                <option>N6</option>
                                <option>N5</option>
                            </select>
                        </div>


                        <hr>


                        <div class="col-md-6 form-group">
                            <label>External Examination||OD</label>
                            <input type="text" class="form-control mb-3" name="externalExaminationOd">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>External Examination||OS</label>
                            <input type="text" class="form-control mb-3" name="externalExaminationOs">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Iop & Time||OD</label>
                            <input type="text" class="form-control mb-3" name="iopTimeOd">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Iop & Time||OS</label>
                            <input type="text" class="form-control mb-3" name="iopTimeOs">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Posterio Segnment||OD</label>
                            <textarea class="form-control mb-3" rows="2" name="posteriorSegmentOd"></textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Posterio Segnment||OS</label>
                            <textarea class="form-control mb-3" rows="2" name="posteriorSegmentOs"></textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subjective Refraction Distance||OD</label>
                            <input type="text" class="form-control" name="subjectiveRefractionDistanceOd">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subjective Refraction Distance||OS</label>
                            <input type="text" class="form-control mb-3" name="subjectiveRefractionDistanceOs">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subjective Refraction Near||OD</label>
                            <input type="text" class="form-control mb-3" name="subjectiveRefractionNearOd">
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Subjective Refraction Near||OS</label>
                            <input type="text" class="form-control mb-3" name="subjectiveRefractionNearOs">
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Diagnosis</label>
                            <textarea class="form-control mb-3" rows="2" name="diagnosis" placeholder="Enter Diagnosis"></textarea>
                        </div>

                        <div class="col-md-12 form-group">
                            <label>Treatment Plan</label>
                            <textarea class="form-control mb-3" rows="2" name="treatmentPlan"
                                placeholder="Enter Treatment Plans"></textarea>
                            <input type="checkbox" class="mb-3" name="status" value=1><label for="glasses"> Check if glasses is required</label>
                        </div>

                        <div>
                            <button type="submit" name="uploadCard" class="btn btn-primary">Save Info</button>
                            <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCardModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="editCardTitle">
                        Edit Card
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body" id="editCardFormBody">


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="allCardModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id=>
                        All Cards
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="allCardBody">
                        
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

    <script type="text/javascript">
        function BrWindow(theURL,winName,features) { //v2.0
          
            window.open(theURL,winName,features);
          
        }



        $(function () {
            ppop = document.getElementById('displaySingleBody');
            //ppop.print();
            // $('#addCardModal').modal('show');

            



            function doYourWork()
            {
                id = "<?= $client ?>"

                $.ajax({
                    method: 'GET',
                    url: `../api.php?pickCards=${id}`
                }).done(function (res) {
                    res = JSON.parse(res);
                    body = document.getElementById('displaySingleBody');
                    body.innerHTML = ``;
                    son = document.createElement('div')
                    son.classList.add('card-body');
                    body.append(son);
                    console.log(res);
                    if(res.length > 0) {
                        

                        lastCard = res[0];
                        inner = doMyPlacing(lastCard.data);



                        allBody = document.getElementById('allCardBody');
                        allBody.innerHTML = ``;

                        res.map((cd) => {
                        
                            allSon = document.createElement('div')
                            allSon.setAttribute('class', 'col-lg-6 card-body border');
                            allBody.append(allSon);

                            innerAll = doMyPlacing(cd.data);
                            allSon.innerHTML = innerAll;
                        });

                        
                    }else {
                        inner = `<em class="text-danger">No card has been uploaded so far</em>`
                    }

                    son.innerHTML = inner

                    
                }).fail(function() {
                    alert('Syncronization failed check your connection');
                })

            }




            function doMyPlacing(data)
            {
                user = '<?= $me['role'] ?>'
                dataString = JSON.stringify(data)
                bottomBtn = (user > 0) ? `<form class="hideWhilePrint" method="POST">
                        <button type="button" class="btn btn-primary toggleEditCardModal" data-data='${dataString}'>Edit Card</button>
                        <button type="submit" class="btn btn-danger" name="deleteCard" value=${data.id} onclick="return confirm('Are you sure you want to delete this card ?')" >Delete Card</button>


                        <button type="button" class="btn btn-secondary" onclick="BrWindow('print.php?card=${data.id}', '', 'width=800,height=600')" >Print Card</button>

                        
                        </form>
                    </div>
                ` : `` ;
                body = `<div class="">

                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>ID:</b>
                            <span> ${data.client_id} </span>
                        </div>
                        <div>
                            <b>Date:</b>
                            <span> ${data.created_at} </span>
                        </div>
                    </div>


                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>Name:</b>
                            <span> <?= getClientName($client) ?> </span>
                        </div>
                        <div>
                            <b>Age:</b>
                            <span> <?= $data['age'] ?> yrs </span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2 ">
                            <b>Address:</b>
                            <span><?= $data['address'] ?></span>
                    </div>


                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>Complaint & History:</b><br>
                            <span>${data.complaint}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>Past History:</b><br>
                            <span> ${data.history} </span>
                        </div>
                    </div>

                    <div class=" border-bottom py-2">
                        <div>
                            <b>Visual Acuity:</b>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <b>Without Glasses Distance</b>: OD = ${data.visualAcuityWithoutGlassesDistanceOd} <b>OS</b> = ${data.visualAcuityWithoutGlassesDistanceOs} 
                                </div>
                                <div style="margin-left: 10px">
                                    <b> Near </b> OD = ${data.visualAcuityWithoutGlassesNearOd} <b>OS</b> = ${data.visualAcuityWithoutGlassesNearOs}
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <div>
                                    <b>With Glasses Distance</b>: OD = ${data.visualAcuityWithGlassesDistanceOd} <b>OS</b> = ${data.visualAcuityWithGlassesDistanceOs} 
                                </div>
                                <div style="margin-left: 10px">
                                    <b> Near  OD</b> = ${data.visualAcuityWithGlassesNearOd} <b>OS</b> = ${data.visualAcuityWithGlassesNearOs}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" border-bottom py-2">
                        <b>External Examination:</b>
                        <div class="d-flex justify-content-between">
                            <div>
                                OD = ${data.externalExaminationOd}
                            </div>
                            <div style="margin-left: 10px">
                                OS = ${data.externalExaminationOs}
                            </div>
                        </div>
                    </div>

                    <div class=" border-bottom py-2">
                        <b>IOP & Time:</b>
                        <div class="d-flex justify-content-between">
                            <div>
                                OD = ${data.iopTimeOd}
                            </div>
                            <div style="margin-left: 10px">
                                OS = ${data.iopTimeOs}
                            </div>
                        </div>
                    </div>

                    <div class=" border-bottom py-2">
                        <b>Posterior Segment:</b>
                        <div class="d-flex justify-content-between">
                            <div>
                                OD = ${data.posteriorSegmentOd}
                            </div>
                            <div style="margin-left: 10px">
                                OS = ${data.posteriorSegmentOs}
                            </div>
                        </div>
                    </div>

                    <div class=" border-bottom py-2">
                        <div>
                            <b>Subjective Refraction With New Rx:</b>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <b>Distance</b>: OD = ${data.subjectiveRefractionDistanceOd} <b>OS</b> = ${data.subjectiveRefractionDistanceOs} 
                                </div>
                                <div style="margin-left: 10px">
                                    <b> Near </b> OD = ${data.subjectiveRefractionNearOd} <b>OS</b> = ${data.subjectiveRefractionNearOs}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>Diagnosis:</b><br>
                            <span> ${data.diagnosis} </span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2 ">
                        <div>
                            <b>Treatment Plan:</b><br>
                            <span> ${data.treatmentPlan} </span>
                        </div>
                    </div>


                    <div class="mt-3 bottom-btn ">
                    ${bottomBtn}
                 
                </div>`

                return body;
            }


            $('body').on('click', '.toggleEditCardModal', function() {
                data = $(this).data('data');

                body = document.getElementById('editCardFormBody');
                body.innerHTML = ``;

                son = document.createElement('div')

                body.append(son)

                son.innerHTML = doMyEditForPlacing(data);
                $('#editCardTitle').html(`Edit Card For <?= getClientName($client) ?> (Card ID : ${data.card_id})`);
                $('#editCardModal').modal('show');

            })




            function doMyEditForPlacing(data)
            {

                body = `<form method="POST" class="row">

               
                    <div class="col-md-12 form-group">

                        <label>Complaint</label>
                        <textarea class="form-control mb-3" rows="2" name="complaint"  placeholder="Enter Complaints">${data.complaint}</textarea>
                        <input type="hidden" name="id" value="${data.id}">

                        <label>Past History</label>
                        <textarea class="form-control mb-3" rows="2" name="history" placeholder="Enter History">${data.history}</textarea>
                    </div>


                    <hr>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Distance (OD) (Without Glasses) </label>
                        <select class="form-control mb-3" name="visualAcuityWithoutGlassesDistanceOd">
                            <option value="${data.visualAcuityWithoutGlassesDistanceOd}">${data.visualAcuityWithoutGlassesDistanceOd}</option>

                            <option>NLP</option> <option>HM +ve</option>
                            <option>HM -ve</option>
                            <option>cf@3mtrs</option>
                            <option>cf@2mtrs</option>
                            <option>cf@1mtrs</option>
                            <option>cfcf</option> <option>6/60</option>
                            <option>6/36</option> <option>6/24</option>
                            <option>6/18</option> <option>6/12</option>
                            <option>6/9</option> <option>6/6</option>
                            <option>6/5</option> <option>6/4</option>
                        </select> 
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Distance (OS) (Without Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithoutGlassesDistanceOs">
                            <option value="${data.visualAcuityWithoutGlassesDistanceOs}">${data.visualAcuityWithoutGlassesDistanceOs}</option>
                            <option>NLP</option>
                            <option>HM +ve</option>
                            <option>HM -ve</option>
                            <option>cf@3mtrs</option>
                            <option>cf@2mtrs</option>
                            <option>cf@1mtrs</option>
                            <option>cfcf</option>
                            <option>6/60</option>
                            <option>6/36</option>
                            <option>6/24</option>
                            <option>6/18</option>
                            <option>6/12</option>
                            <option>6/9</option>
                            <option>6/6</option>
                            <option>6/5</option>
                            <option>6/4</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Near (OD) (Without Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithoutGlassesNearOd">
                            <option value="${data.visualAcuityWithoutGlassesNearOd}">${data.visualAcuityWithoutGlassesNearOd}</option>
                            <option>
                                < N36</option>
                            <option>N36</option>
                            <option>N24</option>
                            <option>N18</option>
                            <option>N12</option>
                            <option>N10</option>
                            <option>N8</option>
                            <option>N6</option>
                            <option>N5</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Near (OS) (Without Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithoutGlassesNearOs">
                            <option value="${data.visualAcuityWithoutGlassesNearOs}">${data.visualAcuityWithoutGlassesNearOs}</option>
                            <option>
                                < N36</option>
                            <option>N36</option>
                            <option>N24</option>
                            <option>N18</option>
                            <option>N12</option>
                            <option>N10</option>
                            <option>N8</option>
                            <option>N6</option>
                            <option>N5</option>
                        </select>
                    </div>

                    <hr>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Distance (OD) (With Glasses) </label>
                        <select class="form-control mb-3" name="visualAcuityWithGlassesDistanceOd">
                            <option value="${data.visualAcuityWithGlassesDistanceOd}">${data.visualAcuityWithGlassesDistanceOd}</option>

                            <option>NLP</option> <option>HM +ve</option>
                            <option>HM -ve</option>
                            <option>cf@3mtrs</option>
                            <option>cf@2mtrs</option>
                            <option>cf@1mtrs</option>
                            <option>cfcf</option> <option>6/60</option>
                            <option>6/36</option> <option>6/24</option>
                            <option>6/18</option> <option>6/12</option>
                            <option>6/9</option> <option>6/6</option>
                            <option>6/5</option> <option>6/4</option>
                        </select> 
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Distance (OS) (With Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithGlassesDistanceOs">
                            <option value="${data.visualAcuityWithGlassesDistanceOs}">${data.visualAcuityWithGlassesDistanceOs}</option>
                            <option>NLP</option>
                            <option>HM +ve</option>
                            <option>HM -ve</option>
                            <option>cf@3mtrs</option>
                            <option>cf@2mtrs</option>
                            <option>cf@1mtrs</option>
                            <option>cfcf</option>
                            <option>6/60</option>
                            <option>6/36</option>
                            <option>6/24</option>
                            <option>6/18</option>
                            <option>6/12</option>
                            <option>6/9</option>
                            <option>6/6</option>
                            <option>6/5</option>
                            <option>6/4</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Near (OD) (With Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithGlassesNearOd">
                            <option value="${data.visualAcuityWithGlassesNearOd}">${data.visualAcuityWithGlassesNearOd}</option>
                            <option>
                                < N36</option>
                            <option>N36</option>
                            <option>N24</option>
                            <option>N18</option>
                            <option>N12</option>
                            <option>N10</option>
                            <option>N8</option>
                            <option>N6</option>
                            <option>N5</option>
                        </select>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Visual Activity Near (OS) (With Glasses)</label>
                        <select class="form-control mb-3" name="visualAcuityWithGlassesNearOs">
                            <option value="${data.visualAcuityWithGlassesNearOs}">${data.visualAcuityWithGlassesNearOs}</option>
                            <option>
                                < N36</option>
                            <option>N36</option>
                            <option>N24</option>
                            <option>N18</option>
                            <option>N12</option>
                            <option>N10</option>
                            <option>N8</option>
                            <option>N6</option>
                            <option>N5</option>
                        </select>
                    </div>


                    <hr>


                    <div class="col-md-6 form-group">
                        <label>External Examination||OD</label>
                        <input type="text" class="form-control mb-3" value="${data.externalExaminationOd}" name="externalExaminationOd">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>External Examination||OS</label>
                        <input type="text" class="form-control mb-3" value="${data.externalExaminationOs}" name="externalExaminationOs">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Iop & Time||OD</label>
                        <input type="text" class="form-control mb-3" value="${data.iopTimeOd}" name="iopTimeOd">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Iop & Time||OS</label>
                        <input type="text" class="form-control mb-3" value="${data.iopTimeOs}" name="iopTimeOs">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Posterio Segnment||OD</label>
                        <textarea class="form-control mb-3" rows="2"  name="posteriorSegmentOd">${data.posteriorSegmentOd}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Posterio Segnment||OS</label>
                        <textarea class="form-control mb-3" rows="2" name="posteriorSegmentOs">${data.posteriorSegmentOs}</textarea>
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Subjective Refraction Distance||OD</label>
                        <input type="text" class="form-control" value="${data.subjectiveRefractionDistanceOd}" name="subjectiveRefractionDistanceOd">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Subjective Refraction Distance||OS</label>
                        <input type="text" class="form-control mb-3" value="${data.subjectiveRefractionDistanceOs}" name="subjectiveRefractionDistanceOs">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Subjective Refraction Near||OD</label>
                        <input type="text" class="form-control mb-3" value="${data.subjectiveRefractionNearOd}" name="subjectiveRefractionNearOd">
                    </div>

                    <div class="col-md-6 form-group">
                        <label>Subjective Refraction Near||OS</label>
                        <input type="text" class="form-control mb-3" value="${data.subjectiveRefractionNearOs}" name="subjectiveRefractionNearOs">
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Diagnosis</label>
                        <textarea class="form-control mb-3" rows="2" name="diagnosis" placeholder="Enter Diagnosis">${data.diagnosis}</textarea>
                    </div>

                    <div class="col-md-12 form-group">
                        <label>Treatment Plan</label>
                        <textarea class="form-control mb-3" rows="2" name="treatmentPlan"
                            placeholder="Enter Treatment Plans">${data.treatmentPlan}</textarea>
                    </div>

                    <div>
                        <button type="submit" name="editCard" class="btn btn-primary">Save Info</button>
                        <button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>


                </form>`
                return body;
            }

            
            doYourWork();
            setInterval(function () {
                console.log('friend')
                doYourWork();
            }, 5000);
        })
    </script>
</body>

</html>