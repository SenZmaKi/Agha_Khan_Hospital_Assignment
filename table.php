<?php
include('fetch.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Patient Records</title>

    </head>

    <body>
        <table class="table">
            <thead "><tr><th>No</th>
                <th>Patient ID</th>
                <th>First name</th>
                <th>Middle name</th>
                <th>Surname</th>
                <th>Date of birth</th>
                <th>Gender</th>
                <th>County</th>
            </thead>
            <tbody>
                <?php
      if(is_array($fetched_data)){      
      $sn=1;
      foreach($fetched_data as $data){
    ?>
      <tr>
      <td><?php echo $sn; ?></td>
      <td><?php echo $data['patient_id']??''; ?></td>
      <td><?php echo $data['first_name']??''; ?></td>
      <td><?php echo $data['middle_name']??''; ?></td>
      <td><?php echo $data['surname']??''; ?></td>
      <td><?php echo $data['date_of_birth']??''; ?></td>
      <td><?php echo $data['gender']??''; ?></td>
      <td><?php echo $data['county']??''; ?></td>  
     </tr>
     <?php
      $sn++;}}else{ ?>
      <tr>
        <td colspan="8">
    <?php echo $fetched_data; ?>
  </td>
  <tr>
    <?php
    }?>
    <tr>
    </tbody>
            </tbody>
        </table>
    </body>

</html>