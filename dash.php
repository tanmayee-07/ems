<?php

require 'conn.php';
session_start();
if(!$_SESSION['u_name']){
    header('Location: index.php');
}
?>

<!DOCTYPE html><!--to work on HTML 5 -->
<html lang="en">
    <head>
        <meta charset="utf-8"><!--to tell the browser that this file is UTF-8 encoded-->
        
        <title>Welcome</title>
        <meta name="viewport" content="width=device-width,initial scale=1"><!--to control the page's dimensions and scaling i.e.to make the webpage responsive-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        
    </head>
    <style>
        body{
            background-image:url("https://www.uniper.energy/sites/default/files/gif%20home_reduced.gif");
            background-size: cover;
        }
    </style>
    <body>
        <?php require "nav.php"; ?>

        <!--main content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: brown;"><strong>Employees</strong></div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="add_new_employee.php">Add New Employee</a></li>
                            <li class="list-group-item"><a href="dash.php">View All Employees</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color: brown;"><strong>Employees List</strong></div>
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            <?php 

                                $sql="SELECT * FROM employees";
                                $result=mysqli_query($conn,$sql);

                                if(mysqli_num_rows($result)>0){
                                    //output data of each row
                                    while($employee=mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $employee['e_id']; ?></td>
                                    <td><?php echo $employee['e_name']; ?></td>
                                    <td><a href="single_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-info">Details</a></td>
                                    <td><a href="single_employee_edit.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-warning">Edit</a></td>
                                    <td><a href="delete_employee.php?e_id=<?php echo $employee['e_id']; ?>" class="btn btn-block btn-xs btn-danger">Delete</a></td>    
                                </tr>        
                                <?php }
                                }else{
                                    echo "0 results";
                                }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </body>
</html>