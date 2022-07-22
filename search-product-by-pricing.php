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
        <div class="row">
            <div class="col-md-12">
                <div class="card-mt-4">
                    <div class="card-header">
                        <h4>Filter or search data by pricing</h4>
                    </div>
                    <div class="card-body">         
                        <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-4"> 
                                <label for="">start price</label>
                                <input type="text" name="start_price" value="<?php if(isset($_GET['start_price'])){echo $_GET['start_price'];}else{echo "100";} ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">end price</label>
                                <input type="text" name="end_price" value="<?php if(isset($_GET['end_price'])){echo $_GET['end_price'];}else{echo "900";} ?>" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">click me</label> <br>
                                <button type="submit" class="btn btn-primary px-4">filter</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                            <h5>Product Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <?php
                              $con = mysqli_connect("localhost","root","","phptutorials");

                              if(isset($_GET['start_price']) && isset($_GET['end_price']))
                              {
                                $startprice = $_GET['start_price'];
                                $endprice = $_GET['end_price'];

                                $query = "SELECT * FROM a_products WHERE price BETWEEN $startprice AND $endprice ";
                              }
                              else
                              {
                                $query = "SELECT * FROM a_products";
                              }
                              
                              $query_run = mysqli_query($con, $query);

                              if(mysqli_num_rows($query_run) > 0)
                              {
                                foreach($query_run as $item)
                                {
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="border p-2">
                                        <h5><?php echo $item['name']; ?></h5>
                                        <h6>PRICE: <?php echo $item['price']; ?></h6>
                                    </div>
                                    </div>
                                    <?php
                                }
                              }
                              else
                              {
                                echo "no record found";
                              }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>