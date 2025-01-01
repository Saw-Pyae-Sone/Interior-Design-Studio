<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php
    include_once ('connection.php');
    error_reporting(0);
    ini_set('display_errors', 1);
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
</body>

<?php include_once("header.php"); ?>    

    <div id="right-panel" class="right-panel">

       <?php include_once ('sidebar.php'); ?>
        
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
  
                <div class="clearfix">
                    <?php
                        if(isset($_POST['edit']))
                        {
                            
                            $PID = $_POST['edit'];
                            
                            $SCT = "SELECT * FROM ProductDetail WHERE ProductDetail_ID = '$PID'";
                            $run = mysqli_query($con,$SCT);
                            $data2 = mysqli_fetch_assoc($run);

                            $CID = $data2['SubC_ID'];
                            $WID = $data2['WoodType_ID'];

                            $Select = "SELECT * FROM SubCategory WHERE SubC_ID = '$CID'";
                            $getc = mysqli_query($con,$Select);
                            $fetchS = mysqli_fetch_assoc($getc);
                            
                            $CCID = $fetchS['Category_ID'];

                            $SelectW = "SELECT * FROM WoodType WHERE WoodType_ID = '$WID'";
                            $getW = mysqli_query($con,$SelectW);
                            $fetchW = mysqli_fetch_assoc($getW);

                            $SelC = "SELECT * FROM Category WHERE Category_ID = '$CCID'";
                            $getcc = mysqli_query($con,$SelC);
                            $fetchC = mysqli_fetch_assoc($getcc);

                            $SelC = "SELECT * FROM SubCategory WHERE SubC_ID = '$CID'";
                            $getcc = mysqli_query($con,$SelC);
                            $fetchCS = mysqli_fetch_assoc($getcc);
                    ?>          
                    <div class="col-lg-6 ml-3">
                        <div class="card">
                            <div class="card-header">Update Product</div>
                            <div class="card-body card-block">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="pname" placeholder="Product Name" class="form-control" required value="<?php echo $data2['Name']; ?>">
                                        </div>
                                        <div class="input-group mt-3">
                                            <input type="text" name="price" placeholder="Price" class="form-control" required value="<?php echo $data2['Price'];?>">
                                        </div>
                                        <div class="row form-group mt-3">
                                            <div class="col-12 col-md-12">

                                                <!-- Hidden input to store the current image file name -->
                                                <input type="hidden" name="current_image" value="<?php echo $data2['Image'];?>">

                                                <!-- Image preview based on the current image -->
                                                <img src="./upload/<?php echo $data2['Image'];?>" alt="Current Image" style="max-width: 100px; max-height: 100px;">

                                                <input type="file" id="file-input" name="Uimg" class="form-control-file mt-2" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="input-group mt-3">
                                            <textarea type="textarea" name="description" class="form-control" placeholder="Enter Product Detail" required> <?php echo $data2['Description']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                             <div class="form-group">
                                                <select name="Wselect" id="select" class="form-control" required>
                                                    <option selected disabled>Please Select WoodType</option>
                                                    <option value="<?php echo $fetchW['WoodType_ID']; ?>" selected> <?php echo $fetchW['WoodType_Name']; ?></option>

                                                <?php

                                                    $sel = "SELECT * FROM WoodType";
                                                    $cget = mysqli_query($con,$sel);
                                                    $count = mysqli_num_rows($cget);

                                                    for ($i=0; $i < $count ; $i++) 
                                                    { 
                                                    
                                                        $take = mysqli_fetch_assoc($cget);

                                                ?>
                                                        <option value="<?php echo $take['WoodType_ID']; ?>"> <?php echo $take['WoodType_Name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                          <div class="form-group">
                                            <select name="Cselect" id="selectC" class="form-control" required>
                                                <option selected readonly value="0">Please Select Category</option>
                                                <option value="<?php echo $fetchC['Category_ID']; ?>" selected> <?php echo $fetchC['Category_Name']; ?></option>
                                            <?php

                                                $sel = "SELECT * FROM Category";
                                                $cget = mysqli_query($con,$sel);

                                                while($row = mysqli_fetch_assoc($cget)) 
                                                { 
                                                    echo "<option value='".$row['Category_ID']."'>".$row['Category_Name']."</option>";
                                                }

                                            ?>
                                            </select>
                                        </div>
                                        <select name="Sselect" id="selectS" class="form-control" required>
                                            <option selected readonly value="1">Please Select SubCategory</option>
                                            <option value="<?php echo $fetchS['SubC_ID']; ?>" selected> <?php echo $fetchS['SubC_Name']; ?></option>

                                      
                                        </select>
                                        </div>  
                                    </div>  
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-lg" value="<?php echo $data2['ProductDetail_ID']; ?>" name="update">Update</button>
                                        <button class="btn btn-danger btn-lg" onclick="history.back();">Back</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                     }
                    else{
                    ?>
                        <div class="col-lg-6 ml-3">
                            <div class="card">
                                <div class="card-header">Product</div>
                                <div class="card-body card-block">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="pname" placeholder="Product Name" class="form-control" required>
                                            </div>
                                            <div class="input-group mt-3">
                                                <input type="text" name="price" placeholder="Price" class="form-control" required>
                                            </div>
                                            <div class="row form-group mt-3">
                                                <div class="col-12 col-md-12"><input type="file" id="file-input" name="img" class="form-control-file"  accept="image/*" required></div>
                                            </div>
                                            <div class="input-group mt-3">
                                                <textarea type="textarea" name="description" class="form-control" placeholder="Enter Product Detail" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-12">
                                                 <div class="form-group">
                                                    <select name="Wselect" id="select" class="form-control" required>
                                                        <option selected disabled>Please Select WoodType</option>
                                                    <?php

                                                        $sel = "SELECT * FROM WoodType";
                                                        $cget = mysqli_query($con,$sel);
                                                        $count = mysqli_num_rows($cget);

                                                        for ($i=0; $i < $count ; $i++) 
                                                        { 
                                                        
                                                            $take = mysqli_fetch_assoc($cget);

                                                    ?>
                                                            <option value="<?php echo $take['WoodType_ID']; ?>"> <?php echo $take['WoodType_Name']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <select name="Cselect" id="selectC" class="form-control" required>
                                                        <option selected readonly value="0">Please Select Category</option>
                                                    <?php

                                                        $sel = "SELECT * FROM Category";
                                                        $cget = mysqli_query($con,$sel);

                                                        while($row = mysqli_fetch_assoc($cget)) 
                                                        { 
                                                            echo "<option value='".$row['Category_ID']."'>".$row['Category_Name']."</option>";
                                                        }

                                                    ?>
                                                    </select>
                                                </div>
                                                <select name="Sselect" id="selectS" class="form-control" required>
                                                    <option selected readonly value="1">Please Select SubCategory</option>
                                              
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Wood Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchC = 'SELECT * FROM ProductDetail';
                                            $run = mysqli_query($con,$fetchC);
                                            $count = mysqli_num_rows($run);

                                            $number = 1;
                                            for ($i=0; $i < $count ; $i++) 
                                            { 
                                                $data = mysqli_fetch_array($run);

                                                $SID = $data['SubC_ID'];
                                                $WID = $data['WoodType_ID'];

                                                $SuC= "SELECT * FROM SubCategory WHERE SubC_ID = '$SID'";
                                                $query = mysqli_query($con,$SuC);
                                                $Sdata = mysqli_fetch_assoc($query);

                                                $CID = $Sdata['Category_ID'];

                                                $CC = "SELECT * FROM Category WHERE Category_ID = '$CID'";
                                                $runn = mysqli_query($con,$CC);
                                                $Cdata = mysqli_fetch_assoc($runn);

                                                $WG= "SELECT * FROM WoodType WHERE WoodType_ID = '$WID'";
                                                $get = mysqli_query($con,$WG);
                                                $Wdata = mysqli_fetch_assoc($get);
                                        ?>
                                        <tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $data['Name'];?></td>
                                            <td><img src="./upload/<?php echo $data['Image'];?>" style="height:500, weidth:200,"></td>
                                            <td><?php echo $data['Price'];?></td>
                                            <td><?php echo $data['Description']; ?></td>
                                            <td><?php echo $Cdata['Category_Name']; ?></td>
                                            <td><?php echo $Sdata['SubC_Name']; ?></td>
                                            <td><?php echo $Wdata['WoodType_Name']; ?></td>
                                            <td>
                                                <form method="post" action="">
                                                    <button type="submit" value="<?php echo $data['ProductDetail_ID']; ?>" class="btn btn-primary btn-sm" name="edit">Update</button>
                                                    <button type="submit" value="<?php echo $data['ProductDetail_ID']; ?>" class="btn btn-danger btn-sm mt-1" name="delete">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                            $number++;
                                           }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php include_once("footer.php"); ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Right Panel -->

    <script type="text/javascript" src='jquery-3.4.1.min.js'></script>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>


        <script type="text/javascript">
            $(document).ready(function() {
              $('#bootstrap-data-table-export').DataTable();
          } );
      </script>

    <script type="text/javascript">
    $(document).ready(function(){

        $('#selectC').change(function(){

            var Cid = $(this).val();
            
            $('#selectS').find('option').not(':first').remove();

            $.ajax({
                url: 'ajaxfile.php',
                type: 'post',
                data: {request: 1, Cid:Cid},
                dataType: 'json',
                success: function(response){
                    
                    var len = response.length;

                    for( var i = 0; i<len; i++){
                        var id = response[i]['id'];
                        var name = response[i]['name'];
                            
                        $("#selectS").append("<option value='"+id+"'>"+name+"</option>");

                    }
                },
                error: function(xhr, status, error){
                    console.error(error);
                }
            });
        });
    });
    </script>

    <script>
    function displayFileName(input) {
        var fileNameDisplay = document.getElementById('file-name');
        
        if (input.files && input.files[0]) {
            // Display the file name
            fileNameDisplay.textContent = input.files[0].name;
        } else {
            // If no file is selected, show a message
            fileNameDisplay.textContent = 'No file selected';
        }
    }
    </script>

<?php
    if(isset($_POST['submit']))
    {

        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $img = $_FILES['img']['name'];
        $tmp = $_FILES['img']['tmp_name'];
        $des = $_POST['description'];
        $SID = $_POST['Sselect'];
        $WID = $_POST['Wselect'];

        $insert = "INSERT INTO ProductDetail(Name,Image,Price,Description,SubC_ID,WoodType_ID) VALUES ('$pname','$img','$price','$des','$SID','$WID')";
        $runinsert = mysqli_query($con,$insert);
        if($runinsert > 0)
        {
            move_uploaded_file($tmp,'./upload/'.$img);
            echo "<script>alert('Product has been added');
            location.assign('Product.php');</script>";
        }
    }

    if (isset($_POST['update'])) 
    {
        $pname = $_POST['pname'];
        $PID = $_POST['update'];
        $price = $_POST['price'];
        $des = $_POST['description'];
        $SID = $_POST['Sselect'];
        $WID = $_POST['Wselect'];

        $image = $_FILES['Uimg']['name'];
        $path ="./upload/";

        $currentImageName = $_POST['current_image'];

        // Check if the user has chosen a new image
        if (!empty($_FILES['Uimg']['name'])) 
        {
            $filename = $path."".$image;

            $copy = copy($_FILES['Uimg']['tmp_name'],$filename);
            if(!$copy)
                exit("Problem occured. Can't upload image!");

            $update = "UPDATE ProductDetail SET Image = '$image', Price = '$price', Description = '$des', SubC_ID = '$SID', WoodType_ID = '$WID' WHERE ProductDetail_ID = '$PID'";
            $run = mysqli_query($con,$update);
            if($run)
            {
               echo "<script>alert('Product has been Updated'); location.assign('Product.php');</script>";
            }
        } 
        else 
        {
            // User has not chosen a new image, keep the current one
            $newImage = $currentImageName;
            // Update the database without changing the image

            $update = "UPDATE ProductDetail SET Image = '$newImage', Price = '$price', Description = '$des', SubC_ID = '$SID', WoodType_ID = '$WID' WHERE ProductDetail_ID = '$PID'";
            $run = mysqli_query($con,$update);
            if($run)
            {
               echo "<script>alert('Product has been Updated'); location.assign('Product.php');</script>";
            }
        }
        

      
    }

    if(isset($_POST['delete']))
    {
        $PID = $_POST['delete'];

        $delete = "DELETE FROM ProductDetail where ProductDetail_ID = '$PID'";
        $run = mysqli_query($con,$delete);
        if($run)
        {
            echo "<script>alert('Product has been deleted');location.assign('SubCategory.php');</script>";
        }
    }
?>
</body>
</html>
