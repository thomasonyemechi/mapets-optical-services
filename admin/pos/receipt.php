<?php
include('../../lib/connect.inc.php');
$sales_no = $_GET['sales'];

$summary = $db->query("SELECT * FROM sales_summary WHERE id='$sales_no' ");
if (mysqli_num_rows($summary) == 0) {
    echo 'Transaction Not Found';
    exit;
}

$sum = mysqli_fetch_array($summary);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Receipt</title>

    <style>
        @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        }

        #invoice-POS {
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
            padding: 2mm;
            margin: 0 auto;
            width: 44mm;
            background: #FFF;
        }

        #invoice-POS ::selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS ::moz-selection {
            background: #f31544;
            color: #FFF;
        }

        #invoice-POS h1 {
            font-size: 1.5em;
            color: #222;
        }

        #invoice-POS h2 {
            font-size: .9em;
        }

        #invoice-POS h3 {
            font-size: 1.2em;
            font-weight: 300;
            line-height: 2em;
        }

        #invoice-POS p {
            font-size: .7em;
            color: #666;
            line-height: 1.2em;
        }

        #invoice-POS #top,
        #invoice-POS #mid,
        #invoice-POS #bot {
            /* Targets all id with 'col-' */
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS #top {
            min-height: auto;
        }

        #invoice-POS #mid {
            min-height: 80px;
        }

        #invoice-POS #bot {
            min-height: 50px;
        }

        #invoice-POS #top .logo {
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
            background-size: 60px 60px;
        }

        #invoice-POS .clientlogo {
            float: left;
            height: 60px;
            width: 60px;
            background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
            background-size: 60px 60px;
            border-radius: 50px;
        }

        #invoice-POS .info {
            display: block;
            margin-left: 0;
        }

        #invoice-POS .title {
            float: right;
        }

        #invoice-POS .title p {
            text-align: right;
        }

        #invoice-POS table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice-POS .tabletitle {
            font-size: .5em;
            background: #EEE;
        }

        #invoice-POS .service {
            border-bottom: 1px solid #EEE;
        }

        #invoice-POS .item {
            width: 24mm;
        }

        #invoice-POS .itemtext {
            font-size: .5em;
        }

        #invoice-POS #legalcopy {
            margin-top: 5mm;
        }


        p {
            font-weight: bold !important;
            color: #000000 !important;
        }
    </style>


</head>

<body translate="no">


    <div id="invoice-POS">

        <center id="top">

            <div class="info" style="margin-bottom: 10px; ">
                <div style="display: flex; justify-content: space-between; font-size: 10px; ">
                    <p><?= date('j/m/Y h:i',strtotime($sum['created_at'])); ?></p>
                    <p> <b>Sales Receipt </b> #<?= $sum['id']; ?></p>
                </div>
                <h2 style="margin-top: 0px;" >Mapets Optical Services</h2>
                <p style="margin-bottom: 0px; font-size: 9px; ">
                    Opp. Specialist Hospital, New Hospital road, 340283, Akure, Ondo State
                    <span style="display: block">
                        0803 576 2121
                    </span>
                </p>
            </div>
        </center>

        <div id="bot">

            <div id="table">
                <table>
                    <tr class="tabletitle">
                        <td class="item">
                            <h2>Item</h2>
                        </td>
                        <td class="Hours">
                            <h2>Qty</h2>
                        </td>
                        <td class="Rate">
                            <h2>Price</h2>
                        </td>
                        <td class="Rate">
                            <h2>Ext Price</h2>
                        </td>
                    </tr>


                    <?php
                    $total = 0;
                    $sql = $db->query("SELECT * FROM sales WHERE sumary_id=$sales_no ");
                    while ($item = mysqli_fetch_array($sql)) {
                        $total += ($item['quantity'] * $item['price']);
                    ?>
                        <tr class="service">
                            <td class="tableitem">
                                <p class="itemtext"><?= getItem($item['item_id'])['name'] ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?= $item['quantity'] ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?= money($item['price']) ?></p>
                            </td>
                            <td class="tableitem">
                                <p class="itemtext"><?= money($item['quantity'] * $item['price']) ?></p>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr class="tabletitle">
                        <td></td>
                        <td></td>
                        <td class="Rate">
                            <h2>Total</h2>
                        </td>
                        <td class="payment">
                            <h2><?= money($total) ?> </h2>
                        </td>
                    </tr>

                </table>
            </div>
            <div id="legalcopy">
                <center>
                    <p class="legal">
                        <strong style="font-size: smaller; display: block ">Thank you for your patronage!</strong>
                        <hr>
                    <p style="font-size: 9px;">
                        Opening Hours
                        <span style="display: block; margin-top: 3px">Mon - Sat 8:00am - 8:00pm</span>
                    </p>
                    </p>
                </center>
            </div>

        </div>
    </div>
</body>

<!-- <script>
    window.print();
</script> -->

</html>