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
                <div class="card-mt-3">
                    <div class="card-header">
                        <h4>Filter or search data using multiple checkbox in php</h4>
                    </div>
                </div>
            </div>
            <!-- Brands List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                <div class="card shadow mt-3">
                    <div class="card-header">
                        <h5>Filter
                            <button type="submit" class="btn btn-primary btn-sm float-end ">Search</button>
                        </h5>
                    </div>
                    <div class="card-body"> 
                        <h6>Brand List</h6>
                        <hr>
                        <?php
                            $con = mysqli_connect("localhost","root","","phptutorials");
                            $brand_query = "SELECT * FROM a_brands";
                            $brand_query_run = mysqli_query($con, $brand_query);

                            if(mysqli_num_rows($brand_query_run) > 0)
                            {
                                foreach($brand_query_run as $brandlist)
                                {
                                    $checked = [];
                                    if(isset($_GET['brands']))
                                    {
                                        $checked = $_GET['brands'];
                                    }
                                    ?>
                                       <div>
                                          <input type="checkbox" name="brands[]" value="<?= $brandlist['id']; ?>">
                                          <?= $brandlist['name']; ?>
                                       </div>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "no brands found";
                            }
                        ?>
                    </div>
                </div>
                </form>
            </div>

            <!-- Brand Item - Products -->
            <div class="col-md-9 mt-2">
                <div class="card">
                    <div class="card-body row">
                        <?php

                            if(isset($_GET['brands']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['brands'];
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    $products = "SELECT * FROM a_products WHERE brand_id IN ($rowbrand)";
                        $products_run = mysqli_query($con, $products);

                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
                                   <div class="col-md-4 mt-3">
                                    <div class="border p-2">
                                        <h6><?= $proditems['name']; ?></h6>
                                    </div>
                                   </div>
                                <?php
                            endforeach;
                        }
                        else
                        {
                            echo "no brands found";
                        }
                                }
                            }
                            else
                            {

                        $products = "SELECT * FROM a_products";
                        $products_run = mysqli_query($con, $products);

                        if(mysqli_num_rows($products_run) > 0)
                        {
                            foreach($products_run as $proditems) :
                                ?>
                                   <div class="col-md-4 mt-3">
                                    <div class="border p-2">
                                        <h6><?= $proditems['name']; ?></h6>
                                    </div>
                                   </div>
                                <?php
                            endforeach;
                        }
                        else
                        {
                            echo "no brands found";
                        }

                    }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
