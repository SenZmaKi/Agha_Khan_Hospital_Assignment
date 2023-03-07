<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);


$patient_id = $_POST['patient_id'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$surname = $_POST['surname'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$county = $_POST['county'];

if(!empty($patient_id)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "agha_khan";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT patient_id From Patients Where patient_id = ? Limit 1";
        $INSERT = "INSERT Into Patients(patient_id, first_name, middle_name, surname, date_of_birth, gender, county) values(?, ?, ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("i", $patient_id);
        $stmt->execute();
        $stmt->bind_result($patient_id);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum==0){
            $stmt->close();
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("issssss", $patient_id, $first_name, $middle_name, $surname, $date_of_birth, $gender, $county);
            $stmt->execute();
            header("Location: table.php");
        }
        else{
            echo '<script> alert("Someone already registered using this Patient\'s ID")  </script>';
            echo '<script> window.location.href = "form.html"; </script>';
        }
        $stmt -> close();
        $conn -> close();
    }
    
}
else{
    echo "Patient ID is required";
    die();
}

?>
