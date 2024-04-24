<?php
include_once "process.php";

if(isset($_GET["edit"]))
{
    $id = $_GET["edit"];
    $editstate = true;
    $record = mysqli_query($conn,"select * from data where id=$id");
    $data = mysqli_fetch_array($record);
    $name = $data["name"];
    $mobile = $data["mobile"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>
    <center>
        <h1>CRUD APPLICATION</h1>
        <?php if(isset($_SESSION["msg"])) : ?>
        <h4>
            <?php echo $_SESSION["msg"]; ?>
            <?php unset($_SESSION["msg"]); ?>
        </h4>
        <?php endif ?>
        <hr>
        <form action="process.php" method="post">
            <table border="1" cellpadding="5">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <tr>
                    <td>Name : </td>
                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Mobile number : </td>
                    <td><input type="text" name="mobile" value="<?php echo $mobile; ?>"></td>
                </tr>
                <tr>
                    <?php if($editstate == true) : ?>
                        <td colspan="1"><button type="submit" name="edit">Edit</button></td>
                    <?php else : ?> 
                            <td colspan="1"><button type="submit" name="add">Add</button></td>
                    <?PHP endif ?>
                </tr>
            </table>
        </form>
        <hr>
        <table border="1" cellpadding="5">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>MOBILE</th>
                <th>ACTION</th>
            </tr>
            <?php 
            $record = mysqli_query($conn,"select * from data");
            $i = 1;
            while($data = mysqli_fetch_array($record)){
                // print_r($data);
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data["name"]; ?></td>
                <td><?php echo $data["mobile"] ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $data["id"]?>">Edit</a>
                    <a href="process.php?delete=<?php echo $data["id"]?>">Delete</a>
                </td>
            </tr>
            <?php
            $i++;
            }
            ?>
            
            
        </table>
    </center>
</body>
</html>