<?php

$user = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "chaunceyhester", "eithae7u", "chaunceyhester");


function checkUserExist(){
    if($mysqli->connect_errno){
        printf("No Connect: %s\n",$mysqli->connect_errno);
        exit();
    }
    else{
        $query = "select user_id from users where exists (Select user_id from users where user_id == $user)";
        if($result = $mysqli->query($query)){
            return(true);
        }
        else{
            return(false);
        }
    }
}



echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "</head>";

// if($user != ""){
//     if(checkUserExist()){
//         echo "<h1> Thank You for creating an account, $user</h1>";
//         $query = "Insert into users values ($users)";
//         if($result = $mysqli->query($query)){
//             echo "<h1> Account creation successful</h1>";
//         }
//         else{
//             echo "<h1> Account creation unsuccessful</h1>";
//         }

//     }
//     else{
//         echo "<h1> The following username is taken: $user</h1>";
//     }

// }

echo "<h1> The following username is taken: $user</h1>";



echo "</html>";

?>