<?php

$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");

function checkUserExist(){
    $user = $_POST["user"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");
    if($mysqli->connect_error){
        printf("No Connect: %s\n",$mysqli->connect_error);
        die("Connection failed: " . $mysqli->connect_error);
    }
    else{
        $query = "select user_id from users where exists (Select user_id from users where user_id = '$user')";
        if($result = $mysqli->query($query)){
            if($result->num_rows > 0){
                $mysqli->close();
                return(false);
            }
            else{
                $mysqli->close();
                return(true);
            }
        }
        else{
            $mysqli->close();
            printf("Command Failed");
            die("Connection failed: " . $mysqli->connect_error);
        }
    }
}



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

if($user != ""){
    if(checkUserExist()){
        echo "<h1> Thank You for creating an account, $user</h1>";
        $query = "insert into users values ($users)";
        if($result = $mysqli->query($query)){
            echo "<h1> Account creation successful</h1>";
        }
        else{
            echo "<h1> Account creation unsuccessful</h1>";
        }

    }
    else{
        echo "<h1> The following username is taken: $user</h1>";
    }

}


$mysqli->close();

echo "</html>";

?>