<?php

class Pos extends Mapets
{
    function __construct()
    {
        if (array_key_exists('addProduct', $_POST)) {
            $this->addProduct();
        } elseif (array_key_exists('search_item', $_REQUEST)) {
            $this->searchProduct($_REQUEST['search_item']);
        } elseif (array_key_exists('updateItem', $_REQUEST)) {
            $this->updateItem();
        }elseif (array_key_exists('checkout_now', $_POST)) {
            $this->checkOut();
        }elseif (array_key_exists('test', $_REQUEST)) {
            // $this->test();
        }

        
    }


    function addProduct()
    {
        global $db, $report, $count;
        $item = valEmpty($_POST['item_name'], 'Item Name', 3);
        $price = valEmpty($_POST['price'], 'Price', 1);
        $type = valEmpty($_POST['type'], 'Type', 3);
        $des = $_POST['description'];

        $ck = $db->query("SELECT * FROM items WHERE name='$item' ");

        if (mysqli_num_rows($ck) > 0) {
            $report = 'Item with this name already exists';
            $count = 1;
            return;
        }

        $ins = $db->query("INSERT INTO items(name,price,type,description) VALUES('$item', '$price', '$type', '$des') ");
        $report = 'Item has been added sucessfully';

        return;
    }


    function test()
    {

        global $db;
        $items = [
            'Guccii Glass Pouch', 'Plain glass pack', 'Eye Test ', 'Marco Lens', 'Myopia lens', 'versace frame', 'iron frame', 'Mapets Eye Drop', 'Ondo Eye Drop', 'Loking powder', 'Brass Pouch',
            'Lens Cleaner', 'Lens fluid'
        ];

        $prices = [
            3500, 1000, 15000, 1500, 5000, 4750
        ];

        foreach($items as $item){
            $price = $prices[rand(0, count($prices)-1 ) ];
            $db->query("INSERT INTO items(name,price,type,description) VALUES('$item', '$price', 'Product', '$item') ");
            
        }

        return;
    }

    function updateItem()
    {
        global $db, $report, $count;
        $item_id = $_POST['item_id'];
        $item = valEmpty($_POST['item_name'], 'Item Name', 3);
        $price = valEmpty($_POST['price'], 'Price', 1);
        $type = valEmpty($_POST['type'], 'Type', 3);
        $des = $_POST['description'];

        $ck = $db->query("SELECT * FROM items WHERE name='$item' AND id != $item_id ");

        if (mysqli_num_rows($ck) > 0) {
            $report = 'Item with this name already exists';
            $count = 1;
            return;
        }

        $db->query("UPDATE items SET name='$item', price='$price', type='$type', description='$des' WHERE id=$item_id ");
        $report = 'Item has been updated sucessfully';
        return;
    }


    function deleteItem()
    {
        global $db, $report, $count;

        $item_id = $_POST['item_id'];
        $ck = $db->query("SELECT * FROM sales WHERE item_id='$item_id' limit 1 ");
        if(mysqli_num_rows($ck) > 0) {
            $report = 'You cannot delete this item'; $count = 1;
            return;
        }
        $exe = $db->query("DELETE FROM items WHERE id='$item_id' ");
        $report = 'Item has been deleted sucessfully';
        return;
    }


    function searchProduct($q)
    {
        global $db;

        $sql = $db->query("SELECT id,name,price FROM items where name like '%$q%' ORDER BY name ASC LIMIT 20 ");

        $data = [];
        while ($item = mysqli_fetch_array($sql)) {
            $data[] = [
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price']
            ];
        }
        echo json_encode($data);
    }

    function checkOut()
    {
        global $db, $report, $count;  

        $sales_id = $_POST['sales_id'];
        $user = $_POST['user_id'];
        $cart_total = 0;

        $sales_summary = $db->query("INSERT INTO sales_summary(sales_id,total,user_id) VALUES ('$sales_id', 0 , '$user'  ) ");
        $ft = $db->query("SELECT id FROM sales_summary WHERE sales_id=$sales_id order by id DESC LIMIT 1 ");

        $sales_summary_id = mysqli_fetch_array($ft)['id'];

        foreach ($_POST['items'] as $item) {
            $item_id = $item['id'];
            $price = $item['price'];
            $qty = $item['qty'];
            $item_total = ($price * $qty);
            $cart_total += $item_total;
            $db->query("INSERT INTO sales(sumary_id, item_id, quantity, price) VALUES('$sales_summary_id', '$item_id', '$qty', '$price') ");
        }

        $db->query("UPDATE sales_summary SET total='$cart_total' WHERE id=$sales_summary_id ");

        echo json_encode([
            'message' => 'Sales has been registered',
            'sales_id' => $sales_summary_id,
            'status' => true
        ]);

    }
}


$map = new Pos;
