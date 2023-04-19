<?php


function slug($string)
{
    $string = strtolower($string);
    $string = preg_replace('/\s+/', ' ', $string);
    $string = trim($string);
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

    return rand(11111, 999999) . '-' . $slug;
}

function getCard($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM cards WHERE id=$id ");
    return mysqli_fetch_array($sql);
}


function cardRemark($sn, $opt=0)
{
    $tp = ''; $val = '';
    if($sn == 0){
        $tp = '........';
        $val = '<i class="text-danger">Pending</i>';
    }else if($sn == 1){
        $tp = 'Special Orders';
        $val = '<i class="text-success">Completed</i>';
    }else if($sn == 2){
        $tp = 'BF';
        $val = '<i class="text-success">Completed</i>';
    }else if($sn == 3){
        $tp = 'Easy';
        $val = '<i class="text-success">Completed</i>';
    }


    return ($opt == 0) ? $tp : $val;
}

function getUser($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM users WHERE id=$id ");
    return mysqli_fetch_array($sql);
}


function getClient($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM clients WHERE id=$id ");
    return mysqli_fetch_array($sql);
}

function getClientName($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM clients WHERE id=$id ");
    $row = mysqli_fetch_array($sql);
    return @ucwords($row['title'].' '.$row['lastname'].' '.$row['firstname']);
}


function win_hashs($length)
{
    return substr(str_shuffle(str_repeat('123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
}
function win_hash($length)
{
    return substr(str_shuffle(str_repeat('123456789', $length)), 0, $length);
}


function Alert()
{
    global $report, $count;

    echo '<script>
        setTimeout(function() {
            $("#refresh").fadeOut(3000);
        }, 3000);
    </script>';
    if ($count > 0) {
        echo '
            <div id="refresh"  class="alert bg-danger" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<i class="icon fa fa-ban text-white"> &nbsp;' . $report . '</i></div>';
    } else {
        echo '<div id="refresh"  class="alert bg-success" style="position:fixed; top:10px; right:10px; z-index:10000; width: auto;">
			<i class="icon fa fa-check text-white"> &nbsp;' . $report . '</i></div>';
    }
    return;
}

function valEmpty($field, $fname, $ct)
{
    global $report, $count;
    $field = trim($field);
    if ($field == '') {
        $report .= "<br>" . $fname . " field is required! ";
        $count = 1;
        return;
    } elseif (strlen($field) < $ct) {
        $report .= "<br>" . $fname . " must be at least " . $ct . " characters! ";
        $count = 1;
        return;
    } else {
        return $field;
    }
}


function money($money)
{
    return '₦' . number_format($money);
}


    // function upUnikexpress()
    // {
    //     global $db2, $report, $count;
    //     ini_set('memory_limit', '3050M');
    //     $title = $_POST['title'];
    //     $id = $_POST['id'];
    //     $photos = $_FILES['photos'];
    //     $count = count($photos['name']);

    //     for($i = 0; $i < $count; $i++){
    //         $ext = pathinfo($photos['name'][$i], PATHINFO_EXTENSION);
    //         $name = $title.'_' .time().rand(11111, 999999).'.'.$ext;
    //         $name2 = 'thumb_'.$title.'_' .time().rand(11111, 999999).'.'.$ext;
    //         $dest_path = '../assets/mockup/'.$name;
    //         $dest_path2 = '../assets/mockup/'.$name2;

    //         createThumbnail($photos['tmp_name'][$i], $dest_path2, 250);

    //         //move_uploaded_file($image['tmp_name'], $dest_path);
    //     }
        

    //     print_r($name);

    //     exit();
    // }




function createThumbnail($sourceImagePath, $destImagePath, $thumbWidth = 50)
{
    $type = exif_imagetype($sourceImagePath);
    if (!$type || !IMAGETYPE_JPEG || !IMAGETYPE_PNG) {
        return null;
    }
    if ($type == IMAGETYPE_PNG) {
        $sourceImage = imagecreatefrompng($sourceImagePath);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
        // make image transparent
        imagecolortransparent(
            $thumbnail,
            imagecolorallocate(
                $thumbnail,
                0,
                0,
                0
            )
        );
        imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);

        imagepng($thumbnail, $destImagePath);
    } elseif ($type  == IMAGETYPE_JPEG) {
        $sourceImage = imagecreatefromjpeg($sourceImagePath);
        $orgWidth = imagesx($sourceImage);
        $orgHeight = imagesy($sourceImage);
        $thumbHeight = floor($orgHeight * ($thumbWidth / $orgWidth));
        $thumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $orgWidth, $orgHeight);
        imagejpeg($thumbnail, $destImagePath);
    }
    imagedestroy($sourceImage);
    imagedestroy($thumbnail);
}

function formatDate($string, $op = '')
{
    if($op == 'f') {
        return date('j M Y h:i a',strtotime($string));
    }else {
        return date('j M Y',strtotime($string));
    }
}