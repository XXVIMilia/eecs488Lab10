<?php

function checkUserExist(){
    $user = $_POST["user"];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");
    if($mysqli->connect_error){
        printf("No Connect: %s\n",$mysqli->connect_error);
        die("Connection failed: ". $mysqli->connect_error);
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

$user = $_POST["user"];
$post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

if($user != "" && $post != ""){
    if(checkUserExist()){
        echo "<h1> Attempting to create post by $user</h1>";
        $userVal = "'" . $mysqli->real_escape_string($user) . "'";
        $postVal = "'" . $mysqli->real_escape_string($post) . "'";
        $randVal = 'Rand()*100000';
        $query = "insert into posts (post_id, content, author_id) values ($randVal, $postVal, $userVal)";
        if($result = $mysqli->query($query)){
            echo "<h1> Post sent successfully!</h1>";
        }
        else{
            echo "<h1> Post Sent unsuccessfully</h1>";
        }
    }
    else{
        echo "<h1> User Not Found</h1>";
    }
}
else{
    echo "<h1> Oi, you gotta submit something";
}

$mysqli->close();

echo "</html>";

?>