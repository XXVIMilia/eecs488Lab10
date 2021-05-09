<?php


echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

$post_id = $_POST["post_id"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");



for($i = 0; $i < count($post_id); $i++){
    $query = "delete from posts where post_id =" . $post_id[$i];
        if($result = $mysqli->query($query)){
            echo "Deleted: " . $post_id[$i] . "Successfully<br>";
        }
        else{
            $mysqli->close();
            printf("Command Failed");
            die("Connection failed: " . $mysqli->connect_error);
        }

    
}


$mysqli->close();


echo "</html>";

?>