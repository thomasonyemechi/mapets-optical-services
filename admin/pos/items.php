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

    <title>Items </title>

    <style type="text/css">
        .search-result {
            width: 100%;
            height: 380px;
            background-color: whitesmoke;
        }
    </style>
</head>



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
                                <h1 class="mb-0 h2 fw-bold">Items</h1>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="course-category.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Items
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemsModal">Add Item</a>
                            </div>

                        </div>
                    </div>
                </div>


                <?php
                $sql = $db->query("SELECT * FROM items ORDER BY updated_at DESC LIMIT 150 ");
                ?>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card mt-3">
                            <div class="card-body">
                                <h4 class="fw-bold"> <i class="fe fe-list"> </i> Items List</h4>
                                <table class="table table-sm mt-2 table-striped ">
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>

                                    <?php
                                    while ($item = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td class="align-middle"> <?= $item['name'] ?> </td>
                                            <td class="align-middle"><?= money($item['price']) ?></td>
                                            <td class="align-middle"><?= $item['type'] ?></td>
                                            <td class="align-middle">
                                            <?= $item['created_at'] ?>
                                            </td>
                                            <td class="align-middle">
                                                <!-- <button class="btn btn-xs px-1 py-0 btn-danger"> <i class="fe fe-trash"> </i> </button> -->
                                                <button class="btn btn-xs px-1 py-0 btn-primary editItem" data-data='<?= json_encode($item) ?>' > <i class="fe fe-edit"> </i> </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="modal fade" id="addItemsModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0" id="newCatgoryLabel">
                        Add Item
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row">
                        <div class="col-lg-12 mb-2 ">
                            <label class="form-label">Item Name<span class="text-danger">*</span></label>
                            <input type="text" name="item_name" class="form-control py-1" placeholder="Item Name" required>
                        </div>
                        <div class="col-lg-6 ">
                            <label class="form-label">Price<span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control py-1" placeholder="Enter Item Price" required>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label">Type<span class="text-danger">*</span></label>
                            <select class="form-control py-1" name="type">
                                <option selected>Product</option>
                                <option>Service</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3 mb-3 mt-2">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control py-1" rows="1"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="addProduct" class="btn py-2 btn-primary">Save Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mb-0">
                        Edit Item
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="row">
                        <div class="col-lg-12 mb-2 ">
                            <label class="form-label">Item Name<span class="text-danger">*</span></label>
                            <input type="text" name="item_name" class="form-control py-1" placeholder="Item Name" required>
                            <input type="hidden" name="item_id" >
                        </div>
                        <div class="col-lg-6 ">
                            <label class="form-label">Price<span class="text-danger">*</span></label>
                            <input type="number" name="price" class="form-control py-1" placeholder="Enter Item Price" required>
                        </div>

                        <div class="col-lg-6">
                            <label class="form-label">Type<span class="text-danger">*</span></label>
                            <select class="form-control py-1" name="type">
                                <option>Product</option>
                                <option>Service</option>
                            </select>
                        </div>

                        <div class="col-lg-12 mb-3 mb-3 mt-2">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control py-1" rows="1"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" name="updateItem" class="btn py-2 btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Script -->
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

        $(function() {
            $('.editItem').on('click', function() {
                data = $(this).data('data');
                console.log(data);
                modal = $('#editModal');
                form = modal.find('form');
                form.find('input[name="item_id"]').val(`${data.id}`)
                form.find('input[name="item_name"]').val(`${data.name}`)
                form.find('input[name="price"]').val(`${data.price}`)
                form.find('select[name="type"]').val(`${data.type}`);
                form.find('textarea[name="description"]').html(`${data.description}`)
                modal.modal('show');
            });
        })
    </script>
</body>

</html>