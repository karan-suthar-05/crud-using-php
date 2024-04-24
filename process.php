<?php

session_start();
include_once "db.php";

$name = "";
$mobile = "";
$id = 0;

$editstate = false;

if(isset($_POST["add"])){
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $sql = "insert into data(name,mobile) values('$name','$mobile')";

    if($conn->query($sql))
    {
        $_SESSION["msg"] = "Data added successfully.";
        header("Location: index.php");        
    }
    else
    {
        mysqli_close($conn);
    }
}

if(isset($_POST["edit"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];

    $sql = "update data set name='$name',mobile='$mobile' where id=$id";

    if($conn->query($sql))
    {
        $_SESSION["msg"] = "Data updated successfully";
        header("Location: index.php");
    }
    else
    {
        mysqli_close($conn);
    }
}

if(isset($_GET["delete"])){
    $id = $_GET["delete"];
    $sql = "delete from data where id=$id";
    if($conn->query($sql))
    {
        $_SESSION["msg"] = "Record deleted successfully.";
        header("Location: index.php");
    }
    else
    {
        mysqli_close($conn);
    }
}

?>