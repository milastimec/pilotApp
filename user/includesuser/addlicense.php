<?php
require '../../header.php';
require '../../includes/db_handler.inc.php';
require 'findrole.php';
$user = $_SESSION['user'];
?>
<html>
<body>
    <form action="addlicense.inc.php" method="post" id="update">
    <input type= "date" name="dat_pridobitve" id="dat_pridobitve"/>
    <select id="dovoljenje" name="dovoljenja" form= "update"> 
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
    <select id="ime" name="person" form="update">
                   <option value =""> Choose person </option>';

    findrole($user);  
?>   
    </select>

    <input type= "submit" value= "Add License" name= "add-submit" >
    </form>
</body>
</html>


<?php
function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
 }
    require '../../footer.html';
        
?>