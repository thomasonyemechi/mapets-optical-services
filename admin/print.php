<?php
session_start();
ob_start();
ob_clean();

?>
<?php include('../lib/connect.inc.php');


$card = getCard($_GET['card']);
$client = $card['client_id'];
$data = getClient($client);
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


    <!-- Libs CSS -->

    <link href="../assets/fonts/feather/feather.css" rel="stylesheet" />
    <link href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
    <link href="../assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="../assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
    <link href="../assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="../assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
    <link href="../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <link href="../assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
    <link href="../assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
    <link href="../assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">






    <!-- Theme CSS -->
    <link rel="stylesheet" href="../assets/css/theme.min.css">
    <link rel="stylesheet" href="../assets/css/emoji.css">
    <link rel="stylesheet" href="../assets/css/all.css">

    <?php
    if (isset($report)) {
        echo Alert();
    } 
    if(!isset($_SESSION['mapets'])) { header('location: ../login.php'); }

    $me = getUser($_SESSION['mapets']);
    ?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</head>

<body onload="print()">
    

    <p style="page-break-before: always;">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
           <div class="card-body">
                <div class="text-center">
                    <h1 class="text-center mb-0">Mapet Optical Services</h1>
                    <big><i class="text-muted">Optometrist And Dispensing Opticians</i></big>
                    <p class="mb-0">Head Office: 137, New Hospital Road, Akure, Ondo State.<br>
                        08030458004, 08035762121, 08145461223<br>
                        Email: mapet. optical services servies@gmail.com
                     </p>
                     <h2 class="text-muted m-0">Eye Examination Card</h2>
                </div>
                <div class="d-flex justify-content-between border-bottom py-2 ">
                    <div>
                        <b>ID:</b>
                        <span> <?= $client ?> </span>
                    </div>
                    <div>
                        <b>Date:</b>
                        <span> <?= $card['created_at'] ?> </span>
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
                        <span><?= $card['complaint'] ?></span>
                    </div>
                </div>

                <div class="d-flex justify-content-between border-bottom py-2 ">
                    <div>
                        <b>Past History:</b><br>
                        <span> <?= $card['history'] ?> </span>
                    </div>
                </div>

                <div class=" border-bottom py-2">
                    <div>
                        <b>Visual Acuity:</b>
                        <div class="d-flex justify-content-between">
                            <div>
                                <b>Without Glasses Distance</b>: OD = <?= $card['visualAcuityWithoutGlassesDistanceOd'] ?>  <b>OS</b> = <?= $card['visualAcuityWithoutGlassesDistanceOs'] ?>
                            </div>
                            <div style="margin-left: 10px">
                                <b> Near </b> OD = <?= $card['visualAcuityWithoutGlassesNearOd'] ?> <b>OS</b> = <?= $card['visualAcuityWithoutGlassesNearOs'] ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <div>
                                <b>With Glasses Distance</b>: OD = <?= $card['visualAcuityWithGlassesDistanceOd'] ?> <b>OS</b> = <?= $card['visualAcuityWithGlassesDistanceOs'] ?>
                            </div>
                            <div style="margin-left: 10px">
                                <b> Near  OD</b> = <?= $card['visualAcuityWithGlassesNearOd'] ?> <b>OS</b> = <?= $card['visualAcuityWithGlassesNearOs'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" border-bottom py-2">
                    <b>External Examination:</b>
                    <div class="d-flex justify-content-between">
                        <div>
                            OD = <?= $card['externalExaminationOd'] ?>
                        </div>
                        <div style="margin-left: 10px">
                            OS = <?= $card['externalExaminationOs'] ?>
                        </div>
                    </div>
                </div>

                <div class=" border-bottom py-2">
                    <b>IOP & Time:</b>
                    <div class="d-flex justify-content-between">
                        <div>
                            OD = <?= $card['iopTimeOd'] ?>
                        </div>
                        <div style="margin-left: 10px">
                            OS = <?= $card['iopTimeOs'] ?>
                        </div>
                    </div>
                </div>

                <div class=" border-bottom py-2">
                    <b>Posterior Segment:</b>
                    <div class="d-flex justify-content-between">
                        <div>
                            OD = <?= $card['posteriorSegmentOd'] ?>
                        </div>
                        <div style="margin-left: 10px">
                            OS = <?= $card['posteriorSegmentOs'] ?>
                        </div>
                    </div>
                </div>

                <div class=" border-bottom py-2">
                    <div>
                        <b>Subjective Refraction With New Rx:</b>
                        <div class="d-flex justify-content-between">
                            <div>
                                <b>Distance</b>: OD = <?= $card['subjectiveRefractionDistanceOd'] ?> <b>OS</b> = <?= $card['subjectiveRefractionDistanceOs'] ?>
                            </div>
                            <div style="margin-left: 10px">
                                <b> Near </b> OD = <?= $card['subjectiveRefractionNearOd'] ?> <b>OS</b> = <?= $card['subjectiveRefractionNearOs'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between border-bottom py-2 ">
                    <div>
                        <b>Diagnosis:</b><br>
                        <span> <?= $card['diagnosis'] ?> </span>
                    </div>
                </div>

                <div class="d-flex justify-content-between border-bottom py-2 ">
                    <div>
                        <b>Treatment Plan:</b><br>
                        <span> <?= $card['treatmentPlan'] ?> </span>
                    </div>
                </div>
             
            </div>
        </div>
    </div>

    </p>
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