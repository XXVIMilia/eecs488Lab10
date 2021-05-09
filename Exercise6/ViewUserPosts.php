<?php


echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");
$query = "select content from posts where (Select author_id from posts where author_id = '$user')";
        if($result = $mysqli->query($query)){
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                    echo $row["content"] . "<br>";
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