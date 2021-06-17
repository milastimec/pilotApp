<?php
require '../../header.php';
require '../../includes/db_handler.inc.php';
require 'findrole.php';
$user = $_SESSION['user'];
?>
<html>
<body>
    <form action="addlicense.inc.php" method="post" id="update">
    <input type= "date" name="dat_pridobitve" id="dat_pridobitve" class="form-control mb-3 col-2 mx-sm-3" >
    <select id="dovoljenje" name="dovoljenja" form= "update" class="form-control mb-3 col-2"> 
        <option value="">Choose License</option>
<?php
                   $sql = "select dovoljenjeID, naziv from dovoljenje where 1=1;";
                   $stmt = mysqli_prepare($conn, $sql) or die();
                   mysqli_stmt_execute($stmt);
                   mysqli_stmt_bind_result($stmt, $ID, $ime);
                   $array = array();

                   while($stmt->fetch()){                        
                    $array = array_push_assoc($array, $ID, $ime);
                   }

                   foreach($array as $ID =>$name){
                       echo '<option value="'.$ID.'">'.$name.'</option>';
                   }


   echo ' </select>
    <select id="ime" name="person" form="update" class="form-control mb-3 col-2">
                   <option value =""> Choose person </option>';

    findrole($user);  
?>   
    </select>

    <input type= "submit" value= "Add License" name= "add-submit" class="btn btn-primary mb-3 mb-4">
    </form>
</body>
</html>


<?php
function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
 }
        
?>