

<?php
    include "connect.php";
    $query = " SELECT * from registertable ";
    $result = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            width: 100%;
            background-color: black;
            color: white;
        }
        table{
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }
        
        td{   
            width: 10%;
            height: 40px;
            border: 1px solid white;                 
        }
        .edit{
            color: white;
            text-decoration: none;
        }
       .edit:hover{
        background-color: white;
        color: black;
       }
       
        .delete{
            color: red;
            text-decoration: none;
        }
        .delete:hover{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>Email</th>
            <th>Number</th>
            <th>Nationality</th>
            <th>Date</th>
            <th>Gender</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php 
            while ($row = mysqli_fetch_array($result)){

        ?>
        <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['number']; ?></td>
                <td><?php echo $row['nationality']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td class="td-edit"><a href="edit.php?id=<?php echo $row['id']?>" class="edit">Edit/Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']?>" class="delete">DELETE</a></td>
        </tr>
        <?php
             }
        ?>
    </table>
</body>
</html>