<?php

include ("db.php");

if(isset($_POST["save-task"])){
    $title=$_POST["title"];
    $description=$_POST["description"];

    $query="INSERT INTO task(title,description) VALUES('$title','$description')";
    $result= mysqli_query($conn,$query);
    if (!$result) {
        die("Error");
    }

    $_SESSION["message"]="Task has been saved";
    $_SESSION["message-type"]= "success";

    header("Location: index.php");
}

?>