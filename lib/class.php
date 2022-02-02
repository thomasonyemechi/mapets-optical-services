<?php

class Mapets
{
    function __construct()
    {
        if(array_key_exists('registerClient', $_POST)) { $this->registerClient(); }
        elseif(array_key_exists('editClientProfile', $_POST)) { $this->editClientProfile(); }
        elseif(array_key_exists('uploadCard', $_POST)) { $this->uploadCard(); }
        elseif(array_key_exists('editCard', $_POST)) { $this->editCard(); }
        elseif(array_key_exists('deleteCard', $_POST)) { $this->deleteCard(); }
        elseif(array_key_exists('login', $_POST)) { $this->login(); }
        elseif(isset($_GET['pickCards'])) { $this->pickCards(); }
        elseif(isset($_GET['selectUser'])) { $this->selectUser(); }
        elseif(isset($_POST['postOrderUpdate'])) { $this->postOrderUpdate(); }
    }

    function postOrderUpdate()
    {
        global $db, $report;
        $id = $_POST['id'];
        $val = $_POST['postOrderUpdate'];

        $db->query("UPDATE cards SET remark=$val WHERE id=$id ");

        $report = 'Card has been updated scuessfully';
        return;
    }


    function selectUser()
    {
        $id = $_GET['selectUser'];
        header('location: userprofile.php?'.sha1($id).'&&token='.$id);
        return;
    }

    function deleteCard()
    {
        global $db, $report;
        $id = $_POST['deleteCard'];
        $db->query("DELETE FROM cards WHERE id=$id ");
        $report = 'Card has been deleted';
        return;
    }


    function editCard()
    {
        global $db, $report, $count;

        //print_r($_POST); exit();

        $id = $_POST['id'];

        $card_id = $_POST['id'];
        $complaint = addslashes($_POST['complaint']);
        $history = addslashes($_POST['history']);
        $visualAcuityWithoutGlassesDistanceOd = addslashes($_POST['visualAcuityWithoutGlassesDistanceOd']);
        $visualAcuityWithoutGlassesDistanceOs = addslashes($_POST['visualAcuityWithoutGlassesDistanceOs']);
        $visualAcuityWithoutGlassesNearOd = addslashes($_POST['visualAcuityWithoutGlassesNearOd']);
        $visualAcuityWithoutGlassesNearOs = addslashes($_POST['visualAcuityWithoutGlassesNearOs']);
        $visualAcuityWithGlassesDistanceOd = addslashes($_POST['visualAcuityWithGlassesDistanceOd']);
        $visualAcuityWithGlassesDistanceOs = addslashes($_POST['visualAcuityWithGlassesDistanceOs']);
        $visualAcuityWithGlassesNearOd = addslashes($_POST['visualAcuityWithGlassesNearOd']);
        $visualAcuityWithGlassesNearOs = addslashes($_POST['visualAcuityWithGlassesNearOs']);
        $externalExaminationOd = addslashes($_POST['externalExaminationOd']);
        $externalExaminationOs = addslashes($_POST['externalExaminationOs']);
        $iopTimeOd = addslashes($_POST['iopTimeOd']);
        $iopTimeOs = addslashes($_POST['iopTimeOs']);
        $posteriorSegmentOd = addslashes($_POST['posteriorSegmentOd']);
        $posteriorSegmentOs = addslashes($_POST['posteriorSegmentOs']);
        $subjectiveRefractionDistanceOd = addslashes($_POST['subjectiveRefractionDistanceOd']);
        $subjectiveRefractionDistanceOs = addslashes($_POST['subjectiveRefractionDistanceOs']);
        $subjectiveRefractionNearOd = addslashes($_POST['subjectiveRefractionNearOd']);
        $subjectiveRefractionNearOs = addslashes($_POST['subjectiveRefractionNearOs']);
        $diagnosis = addslashes($_POST['diagnosis']);
        $treatmentPlan = addslashes($_POST['treatmentPlan']);
        $status = $_POST['status'] ?? 0;


        $db->query("UPDATE cards SET card_id='$card_id', complaint='$complaint', history='$history', visualAcuityWithoutGlassesDistanceOd='$visualAcuityWithoutGlassesDistanceOd', visualAcuityWithoutGlassesDistanceOs='$visualAcuityWithoutGlassesDistanceOs', visualAcuityWithoutGlassesNearOd='$visualAcuityWithoutGlassesNearOd', visualAcuityWithoutGlassesNearOs='$visualAcuityWithoutGlassesNearOs', visualAcuityWithGlassesDistanceOd='$visualAcuityWithGlassesDistanceOd', visualAcuityWithGlassesDistanceOs='$visualAcuityWithGlassesDistanceOs', visualAcuityWithGlassesNearOd='$visualAcuityWithGlassesNearOd', visualAcuityWithGlassesNearOs='$visualAcuityWithGlassesNearOs', externalExaminationOd='$externalExaminationOd', externalExaminationOs='$externalExaminationOs', iopTimeOd='$iopTimeOd', iopTimeOs='$iopTimeOs', posteriorSegmentOd='$posteriorSegmentOd', posteriorSegmentOs='$posteriorSegmentOs', subjectiveRefractionDistanceOd='$subjectiveRefractionDistanceOd', subjectiveRefractionDistanceOs='$subjectiveRefractionDistanceOs', subjectiveRefractionNearOd='$subjectiveRefractionNearOd', subjectiveRefractionNearOs='$subjectiveRefractionNearOs', diagnosis='$diagnosis', treatmentPlan='$treatmentPlan', status='$status' WHERE id=$id
        ")or die('bad service');



        $report = 'Update Scuessful';


        return ;

        return;
    }



    function pickCards()
    {
        global $db;

        $id = $_GET['pickCards'];

        $data = [];

        

        $sql2 = $db->query("SELECT * FROM cards WHERE client_id=$id ORDER BY id DESC LIMIT 20 ");

        while($row = mysqli_fetch_array($sql2)){
            $data[] = [
                'id' => $row['id'],
                'data' => $row,
            ];
        }

        echo json_encode($data);
    }


    function uploadCard()
    {
        global $db, $report, $count;
        $client_id = $_POST['client'];

        $card_id = $client_id;
        $complaint = addslashes($_POST['complaint']);
        $history = addslashes($_POST['history']);
        $visualAcuityWithoutGlassesDistanceOd = addslashes($_POST['visualAcuityWithoutGlassesDistanceOd']);
        $visualAcuityWithoutGlassesDistanceOs = addslashes($_POST['visualAcuityWithoutGlassesDistanceOs']);
        $visualAcuityWithoutGlassesNearOd = addslashes($_POST['visualAcuityWithoutGlassesNearOd']);
        $visualAcuityWithoutGlassesNearOs = addslashes($_POST['visualAcuityWithoutGlassesNearOs']);
        $visualAcuityWithGlassesDistanceOd = addslashes($_POST['visualAcuityWithGlassesDistanceOd']);
        $visualAcuityWithGlassesDistanceOs = addslashes($_POST['visualAcuityWithGlassesDistanceOs']);
        $visualAcuityWithGlassesNearOd = addslashes($_POST['visualAcuityWithGlassesNearOd']);
        $visualAcuityWithGlassesNearOs = addslashes($_POST['visualAcuityWithGlassesNearOs']);
        $externalExaminationOd = addslashes($_POST['externalExaminationOd']);
        $externalExaminationOs = addslashes($_POST['externalExaminationOs']);
        $iopTimeOd = addslashes($_POST['iopTimeOd']);
        $iopTimeOs = addslashes($_POST['iopTimeOs']);
        $posteriorSegmentOd = addslashes($_POST['posteriorSegmentOd']);
        $posteriorSegmentOs = addslashes($_POST['posteriorSegmentOs']);
        $subjectiveRefractionDistanceOd = addslashes($_POST['subjectiveRefractionDistanceOd']);
        $subjectiveRefractionDistanceOs = addslashes($_POST['subjectiveRefractionDistanceOs']);
        $subjectiveRefractionNearOd = addslashes($_POST['subjectiveRefractionNearOd']);
        $subjectiveRefractionNearOs = addslashes($_POST['subjectiveRefractionNearOs']);
        $diagnosis = addslashes($_POST['diagnosis']);
        $treatmentPlan = addslashes($_POST['treatmentPlan']);
        $status = $_POST['status'] ?? 0;


        $db->query("INSERT INTO cards(client_id, card_id, complaint, history, visualAcuityWithoutGlassesDistanceOd, visualAcuityWithoutGlassesDistanceOs, visualAcuityWithoutGlassesNearOd, visualAcuityWithoutGlassesNearOs, visualAcuityWithGlassesDistanceOd, visualAcuityWithGlassesDistanceOs, visualAcuityWithGlassesNearOd, visualAcuityWithGlassesNearOs, externalExaminationOd, externalExaminationOs, iopTimeOd, iopTimeOs, posteriorSegmentOd, posteriorSegmentOs, subjectiveRefractionDistanceOd, subjectiveRefractionDistanceOs, subjectiveRefractionNearOd, subjectiveRefractionNearOs, diagnosis, treatmentPlan, status, created_at)

            VALUES('$client_id', '$card_id', '$complaint', '$history', '$visualAcuityWithoutGlassesDistanceOd', '$visualAcuityWithoutGlassesDistanceOs', '$visualAcuityWithoutGlassesNearOd', '$visualAcuityWithoutGlassesNearOs', '$visualAcuityWithGlassesDistanceOd', '$visualAcuityWithGlassesDistanceOs', '$visualAcuityWithGlassesNearOd', '$visualAcuityWithGlassesNearOs', '$externalExaminationOd', '$externalExaminationOs', '$iopTimeOd', '$iopTimeOs', '$posteriorSegmentOd', '$posteriorSegmentOs', '$subjectiveRefractionDistanceOd', '$subjectiveRefractionDistanceOs', '$subjectiveRefractionNearOd', '$subjectiveRefractionNearOs', '$diagnosis', '$treatmentPlan', '$status', now() )

        ")or die('bad service');



        $report = 'Card Uploaded Scuessfully';


        return ;
    }



    function editClientProfile()
    {
        global $db, $report, $count;

        $id = $_POST['id'];
        $firstname = valEmpty($_POST['firstname'], 'First Name', 3);
        $lastname = valEmpty($_POST['lastname'], 'Last Name', 3);
        $age = valEmpty($_POST['age'], 'Age', 1);
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $title = $_POST['title'] ?? '';
        $gender = $_POST['gender'] ?? '';

        if(!isset($count)) {
            $db->query("UPDATE clients SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', address='$address', title='$title', age='$age', gender='$gender' WHERE id='$id' ")or die('cannot connect ');
            $report = 'Profile update scuessful';
        }

        return;
    }

    function registerClient()
    {
        global $db, $report, $count;
        $firstname = valEmpty($_POST['firstname'], 'First Name', 3);
        $lastname = valEmpty($_POST['lastname'], 'Last Name', 3);
        $age = valEmpty($_POST['age'], 'Age', 1);
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $title = $_POST['title'] ?? '';
        $gender = $_POST['gender'] ?? '';

        if(!isset($count)) {
            $db->query("INSERT INTO clients(firstname, lastname, email, phone, address, title, age, gender, created_at) 
            VALUES('$firstname', '$lastname', '$email', '$phone', '$address', '$title', '$age', '$gender', now() ) ")or die('cannot connect ');
            $report = 'User Has Been Added Scuessfully';
        }

        return ;
    }

    function login()
    {
        global $db, $report, $count;
        $email = valEmpty($_POST['email'], 'Email', 5);
        $password = trim($_POST['password']);

        if(!isset($count)){
            $sql = $db->query("SELECT * FROM users WHERE email='$email' ");
            if(mysqli_num_rows($sql) > 0 ) {
                $row = mysqli_fetch_array($sql);
                if(password_verify($password, $row['password'])){
                    $_SESSION['mapets'] = $row['id'];
                    header('location: admin/index.php');
                }else { $report = 'Password does not match'; $count = 1; }
            }else { $report = 'Email does not exist'; $count = 1; }
        }
        return ;
    }
}


$map = new Mapets;

