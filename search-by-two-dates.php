<?php
  session_start(); 
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>web learning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
      
       <div class="container">
        <div class="row justify-content-center">
           <div class="col-md-8">
                <div class="col-md-12">
                    <div class="card-header">
                        <h4>How to instert checkbox value into database in php</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>from date</label>
                                        <input type="date" name="from_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>to date</label>
                                        <input type="date" name="to_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>click to filter</label> <br>
                                        <button type="submit" class="btn btn-primary">filter</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    
                    </div>

                    <div class="card mt-4">
                        <tbody class="card-body">
                            <table class="table table bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>first Name</th>
                                        <th>Last Name</th>
                                    </tr>
                                </thead>
                                
                            
                            <tbody>
                            <?php

                            $con = mysqli_connect("localhost","root","","phptutorials");

                            if(isset($GET['from_date']) && isset($GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];

                                $query = "SELECT * FROM users WHERE created_at BETWEEN '$from_date' AND '$to_date' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                        <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['firstname']; ?></td>
                                    <td><?= $row['lastname']; ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                else
                                {
                                    echo "No record found";
                                }
                            }
                            ?>   
                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       


       <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>