<?php
session_start();
ob_start();
ob_clean();

// --kiosk --kiosk-printing
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php include('link.php') ?>
    <link rel="stylesheet" type="text/css" href="toast.min.css">

    <title>Point Of Sales</title>

    <style type="text/css">
        .searchresult {
            width: 100%;
            max-height: 200px;
            background-color: white;
            overflow-y: auto;
            display: none;
        }


        .search_item {
            margin-bottom: 5px;
            list-style-type: none;
            font-weight: bolder;
            background-color: whitesmoke;
            padding: 8px 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search_item>span {
            margin-left: 10px;
        }

        .remove_item {
            cursor: pointer;
        }


        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
                        <div class="card">
                            <div class="card-body">
                                <h4 class="fw-bold"><i class="fe fe-plus-circle"> </i>Add Item</h4>

                                <form id="add_item" class="row">
                                    <div class="form-group  col-md-8 ">
                                        <input type="text" id="item_name" autofocus class="form-control py-1" placeholder="Enter name of item">
                                    </div>
                                    <div class="form-group  col-md-4 ">
                                        <input type="number" id="item_price" class="form-control py-1" placeholder="Enter price">
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-end mt-3 ">
                                        <button class="btn btn-primary btn-xs">
                                            Add Item
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 cart_list " style="display: none">
                        <div class="card-body">
                            <h4 class="fw-bold"> <i class="fe fe-shopping-cart"> </i> Cart</h4>
                            <form>
                                <table class="table table-sm mt-2 table-striped  ">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Ext Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>



                                    </tbody>

                                </table>

                                <div class="d-flex justify-content-end ">
                                    <div class=" ">
                                        <!-- <button class="btn checkout btn-info py-1">Update Cart</button> -->
                                        <button class="btn checkout btn-primary py-1">Checkout</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript" src="toast.js"></script>

    <script type="text/javascript">
        $(function() {

            setTimeout(function() {
                $("#refresh").fadeOut(3000);
            }, 3000);


        })


        // loc = location.href;
        // loc = loc.replace('/pos/index', '/pos/receipt.php?sales=6');
        // ur = loc
        // console.log(ur);


        $(function() {

            function pickItem(item) {
                console.log(item);
            }


            $("#search").on('keyup', function(e) {
                e.preventDefault()
                param = $('#search');

                str = param.val().trim()

                $.ajax({
                    method: 'post',
                    url: '../../api',
                    data: {
                        'search_item': str
                    },
                    beforeSend: () => {
                        body = $('.searchresult');
                        body.css("display", "block");
                        body.html(`
                            <button class="btn mt-3 py-2 btn-light" type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Fetch Items ...
                            </button>
                        `)
                    }
                }).done((res) => {
                    res = JSON.parse(res);
                    body.html(``);
                    if (res.length == 0) {
                        body.html(`
                            <div class="bg-danger mt-2  text-white p-2 rounded" >
                                No item found
                            </div>
                        `)
                    }

                    res.map((item, index) => {
                        body.append(`
                            <li class="search_item ${(index==0) ? 'mt-3': ''} " data-data='${JSON.stringify(item)}'  >
                                ${item.name}
                                <span>
                                    (${item.price})
                                <span>
                            </i>
                        `)
                    })
                }).fail((res) => {
                    console.log(res);
                })
            })
        })
    </script>

    <script>
        $(function() {
            function trno() {
                return Math.floor(Math.random() * 10000000000000000);
            }

            trno = trno();

            function getItems() {
                items = (localStorage.getItem(trno) == null) ? [] : JSON.parse(localStorage.getItem(trno));
                return items;
            }

            function setItem(trno, items) {
                localStorage.setItem(trno, JSON.stringify(items));
            }

            function displayCart() {
                items = getItems();
                card = $('.cart_list');
                tbody = card.find('tbody');
                tbody.html(``);

                if (items == null || items.length == 0) {
                    card.css('display', 'none')
                    return;
                }


                card.css('display', 'block');

                cart_total = 0;

                items.map((item, index) => {
                    console.log(item);

                    total = parseInt(item.qty) * parseInt(item.price);
                    cart_total += parseInt(total)

                    tbody.append(`
                        <tr class="cart_item" >
                            <td class="align-middle">${item.name}</td>
                            <td class="align-middle">
                                <input type="number" class="cart_qty form-control px-2 p-0" min="1" value="${item.qty}" data-index=${item.uuid} style="width:20%">
                            </td>
                            <td class="align-middle">
                                ${item.price}
                            </td>
                            <td class="align-middle">
                                <h5 class="fw-bold mb-0">${total}</h5>
                            </td>
                            <td class="align-middle"> <span class="remove_item fw-bold text-danger" data-uuid=${item.uuid} > X</span> </td>
                        </tr>
                    `)
                })

                tbody.append(`
                    <tr>
                        <td class="align-middle fw-bolder" colspan="3">Sub total</td>
                        <td class="align-middle" colspan="3">
                            <h5 class="fw-bold mb-0">${cart_total}</h5>
                        </td>
                    </tr>
                `)



            }


            displayCart();

            $('body').on('click', '.remove_item', function() {
                uuid = $(this).data('uuid');
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items.splice(index, 1);
                setItem(trno, items);
                displayCart()
            })


            var timeout = null;

            $('body').on('keyup', '.cart_qty', function() {
                clearTimeout(timeout);
                val = parseInt($(this).val());
                if (val == "" || isNaN(val)) {
                    console.log('In valid number');
                    return;
                }
                uuid = $(this).data('index')
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items[index].qty = val
                console.log(uuid, index);
                setItem(trno, items);
                displayCart()
            })

            // $('body').on('keyup', '.cart_price', function() {
            //     val = $(this).val();
            //     uuid = $(this).data('index')
            //     items = getItems();
            //     const index = items.findIndex(object => {
            //         return object.uuid == uuid;
            //     });
            //     items[index].price = val
            //     console.log(uuid, index);
            //     setItem(trno, items);
            //     displayCart()
            // })

            $('.checkout').on('click', function(e) {
                e.preventDefault();
                console.log(trno);

                btn = $(this);

                $.ajax({
                    method: 'post',
                    url: '../../api',
                    data: {
                        'checkout_now': 'checkout',
                        items: getItems(),
                        user_id: 1,
                        sales_id: trno
                    },
                    beforeSend: () => {
                        btn.html(`
                             <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Checking Out...  
                        `)
                    }
                }).done(function(res) {
                    console.log(res);
                    res = JSON.parse(res);

                    Toastify({
                        text: `${res.message}`,
                        className: "info",
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        }
                    }).showToast();

                    btn.html(`Checkout`);
                    $('.cart_list').css('display', 'none');

                    var strWindowFeatures = "location=yes,height=570,width=520,scrollbars=yes,status=yes";
                    loc = location.href
                    loc = loc.replace('/pos/index', `/pos/receipt.php?sales=${res.sales_id}`);
                    var URL = loc;
                    // var win = window.open(URL, "_blank", strWindowFeatures);
                    // window.open(URL, '_blank').focus();
                    // printPage(URL)

                    // setTimeout(() => {
                    //     location.reload();
                    // }, 3000);




                }).fail(function(res) {
                    console.log(res);
                    btn.html(`Checkout`)

                })

            })


            // $(document).on('click', '.search_item', function() {
            //     item = $(this).data('data');
            //     cart = (localStorage.getItem(trno) == null) ? [] : JSON.parse(localStorage.getItem(trno));
            //     arr = {
            //         uuid: Math.floor(Math.random() * 10000000),
            //         id: item.id,
            //         name: item.name,
            //         price: item.price,
            //         qty: 1
            //     }
            //     cart.push(arr);
            //     $('.searchresult').html(``);
            //     $('#search').val(``);
            //     localStorage.setItem(trno, JSON.stringify(cart));
            //     displayCart();
            // });


            $('#add_item').on('submit', function(e) {
                e.preventDefault();
                form = $(this);
                item_name = $(form).find('#item_name');
                item_price = $(form).find('#item_price');

                price = item_price.val();
                name = item_name.val();

                if (price == '' || price == null || name == '' || name == null) {
                    console.log('Item name and price is required');
                    return;
                }

                arr = {
                    uuid: Math.floor(Math.random() * 10000000),
                    name: name,
                    price: price,
                    qty: 1
                }

                cart = (localStorage.getItem(trno) == null) ? [] : JSON.parse(localStorage.getItem(trno));
                cart.push(arr);
                localStorage.setItem(trno, JSON.stringify(cart));
                displayCart();

                item_name.val(``)
                item_price.val(``)

            })

        })
    </script>
</body>

</html>