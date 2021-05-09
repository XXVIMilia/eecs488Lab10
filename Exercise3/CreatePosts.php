<?php

$user = $_POST["user"];
$post = $_POST["post"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

if($user != ""){
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
    echo "<h1> Oi, you gotta submit something";
}


$mysqli->close();

echo "</html>";

?>