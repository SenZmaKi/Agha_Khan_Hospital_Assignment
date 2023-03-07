<?php
include('connection.php');

$db = $conn;
$table_name = 'patients';
$columns = ['patient_id', 'first_name', 'middle_name', 'surname', 'date_of_birth', 'gender', 'county'];

function fetch_data($db, $table_name, $columns){
     if(empty($db)){
        $msg = "Database connection error";
     }
     elseif(empty($columns) || !is_array($columns)){
        $msg = "Columns are empty or not an array";

     }
     elseif(empty($table_name)){
        $msg = "Table name is empty";
     }
     else{
        $column_name = implode(', ', $columns);
        $query = "SELECT $column_name FROM $table_name";

        $result = mysqli_query($db, $query);
        
        if($result == true){
            if($result->num_rows > 0){
                $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg= $row;
            }
            else{
                $msg = "No data found";
            }
        }
        else{
            $msg = mysqli_error($db);
        }
    }
     return $msg;

}

$fetched_data = fetch_data($db, $table_name, $columns);

?>