<?php

function connect(){
    $hostname = 'ID329136_moodify.db.webhosting.be';
    $db = 'ID329136_moodify';
    $username = 'ID329136_moodify';
    $password = 'moodifyteampass2021';

    $conn = mysqli_connect($hostname, $username, $password, $db);

    if ($conn == false){
        die("Connection Failed!");
    }
    return $conn;
}
function insertQuery(){
    $conn = connect();

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    $sqlQuery = "insert into `userInfo` (`userFirstname`, `userLastname`, `userEmail`, `userGSM`, `userPassword`) 
                    values ('$firstname', '$lastname', '$email', '$number', MD5('$password'));";

    $result = mysqli_query($conn, $sqlQuery);

    closeconnection($conn);
    header("Location: landing_page.php");

    return $result;

}

function exists(){
    $conn = connect();
    $email = $_POST["email"];
    $password = $_POST["pwd"];

    $sqlQuery = "select * from `userInfo`;";

    $result = mysqli_query($conn, $sqlQuery);

    closeconnection($conn);
    //$res = $result->fetch_all(MYSQLI_ASSOC);

    //foreach ($res as $emails){
    //    echo $emails['userEmail'];
    //}
    return $result->fetch_all(MYSQLI_ASSOC);
}

function authorisation(){
    $emails = exists();

    $userEmail = $_POST['email'];
    $password = $_POST['pwd'];
    $access = false;

    foreach ($emails as $ele){
        if ( $ele['userEmail'] == $userEmail){
            //echo "User already exists";
            if($ele['userPassword'] == MD5($password)){
                $access = true;
            }

        }
    }

    if ($access){
        header("Location: landing_page.php");
    }
    else{
        echo "Email or password is incorrect";
    }
}



function closeconnection($conn){
    $conn->close();
}
//to create a new account
if (isset($_POST["submit"])){
    insertQuery();
}

//to log in
//if (isset($_POST["submit_login"])){
//   authorisation();

//}



