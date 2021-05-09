<?php


echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");
$query = "select user_id from users";
        if($result = $mysqli->query($query)){
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    printf ("%s\n", $row["user_id"]);
                }
            }
            else{
                echo "No users found";
            }
        }
        else{
            $mysqli->close();
            printf("Command Failed");
            die("Connection failed: " . $mysqli->connect_error);
        }


$mysqli->close();


echo "</html>";

?>