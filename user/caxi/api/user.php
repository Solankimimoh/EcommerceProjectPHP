<!doctype html>
<html>
    
    <?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
    
    $con = mysqli_connect("localhost", "dcitsol1_dcweb", "dc4web@123", "dcitsol1_ecommerce");
    
    ?>

<head>
    <meta charset="UTF-8">
    <title>Untitled Document</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>

</head>

<body>
    
    <?php
    
    
    $user = "SELECT * FROM `users`";
    
    
    $result = mysqli_query($con,$user);
    
    
    
    
    
    ?>


    <table>
        <tr>
            <th>User Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Mobile</th>
            
            
        </tr>
        
        <?php
        
            
while($row=mysqli_fetch_row($result))
        
    {
        ?>
        
        <tr>
            
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
            <td><?php echo $row[5]; ?></td>
            
            
        </tr>
        
        
        <?php
    }
        
            ?>
    </table>




</body>

</html>
