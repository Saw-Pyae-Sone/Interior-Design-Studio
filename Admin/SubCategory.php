<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<?php
    include_once ('connection.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SubCategory</title>
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

                            $SCID = $_POST['edit'];
                            
                            $SCT = "SELECT * FROM SubCategory WHERE SubC_ID = '$SCID'";
                            $run = mysqli_query($con,$SCT);
                            $data2 = mysqli_fetch_assoc($run);

                            $CID = $data2['Category_ID'];

                            $Select = "SELECT * FROM Category WHERE Category_ID = '$CID'";
                            $getc = mysqli_query($con,$Select);
                            $fetchS = mysqli_fetch_assoc($getc);
                    ?>          
                    <div class="col-lg-6 ml-3">
                        <div class="card">
                            <div class="card-header">Update SubCategory</div>
                            <div class="card-body card-block">
                                <form action="" method="POST">
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <select name="select" id="select" class="form-control" required>
                                                <option value="<?php echo $fetchS['Category_ID']; ?>" selected> <?php echo $fetchS['Category_Name']; ?></option>
                                                <?php

                                                    $sel = "SELECT * FROM Category";
                                                    $cget = mysqli_query($con,$sel);
                                                    $count = mysqli_num_rows($cget);

                                                    for ($i=0; $i < $count ; $i++) 
                                                    { 
                                                    
                                                        $take = mysqli_fetch_assoc($cget);

                                                ?>
                                                    <option value="<?php echo $take['Category_ID']; ?>"> <?php echo $take['Category_Name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="name" value="<?php echo $data2['SubC_Name']; ?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group"><button type="submit" class="btn btn-primary btn-lg" value="<?php echo $data2['SubC_ID']; ?>" name="update">Update</button>
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
                                <div class="card-header">SubCategory</div>
                                <div class="card-body card-block">
                                    <form action="" method="POST">
                                        <div class="row form-group">
                                            <div class="col-12 col-md-12">
                                                <select name="select" id="select" class="form-control" required>
                                                    <option selected disabled>Please Select Category</option>
                                                <?php

                                                    $sel = "SELECT * FROM Category";
                                                    $cget = mysqli_query($con,$sel);
                                                    $count = mysqli_num_rows($cget);

                                                    for ($i=0; $i < $count ; $i++) 
                                                    { 
                                                    
                                                        $take = mysqli_fetch_assoc($cget);

                                                ?>
                                                        <option value="<?php echo $take['Category_ID']; ?>"> <?php echo $take['Category_Name']; ?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                            </div>  
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" name="Nname" placeholder="SubCategory Name" class="form-control" required>
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
                                <strong class="card-title">SubCategory Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Category</th>
                                            <th>SubCategory</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $fetchC = 'SELECT * FROM SubCategory';
                                            $run = mysqli_query($con,$fetchC);
                                            $count = mysqli_num_rows($run);

                                            $number = 1;
                                            for ($i=0; $i < $count ; $i++) 
                                            { 
                                                $data = mysqli_fetch_array($run);

                                                $CID = $data['Category_ID'];

                                                $SuC= "SELECT * FROM Category WHERE Category_ID = '$CID'";
                                                $query = mysqli_query($con,$SuC);
                                                $fdata = mysqli_fetch_assoc($query);
                                        ?>
                                        <tr>
                                            <td><?php echo $number; ?></td>
                                            <td><?php echo $fdata['Category_Name'];?></td>
                                            <td><?php echo $data['SubC_Name'];?></td>
                                            <td>
                                                <form method="post" action="">
                                                    <button type="submit" value="<?php echo $data['SubC_ID']; ?>" class="btn btn-primary btn-sm" name="edit">Update</button>
                                                    <button type="submit" value="<?php echo $data['SubC_ID']; ?>" class="btn btn-danger btn-sm" name="delete">Delete</button>
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

</body>
<?php
    if(isset($_POST['submit']))
    {

        $SCname = $_POST['Nname'];
        $CID = $_POST['select'];

        $insert = "INSERT INTO SubCategory(SubC_Name,Category_ID) VALUES ('$SCname','$CID')";
        $runinsert = mysqli_query($con,$insert);
        if($runinsert > 0)
        {
            echo "<script>alert('SubCategory has been added');
            location.assign('SubCategory.php');</script>";
        }
    }

    if (isset($_POST['update'])) 
    {

        $SCID = $_POST['update'];
        $Cname = $_POST['name'];
        $CID = $_POST['select'];

        $update = "UPDATE SubCategory SET SubC_Name = '$Cname', Category_ID = '$CID' WHERE SubC_ID = '$SCID'";
        $run = mysqli_query($con,$update);
        if($run)
        {
           echo "<script>alert('SubCategory has been Updated'); location.assign('SubCategory.php');</script>";
        }
    }

    if(isset($_POST['delete']))
    {
        $SCID = $_POST['delete'];

        $delete = "DELETE FROM SubCategory where SubC_ID = '$SCID'";
        $run = mysqli_query($con,$delete);
        if($run)
        {
            echo "<script>alert('SubCategory has been deleted');location.assign('SubCategory.php');</script>";
        }
    }
?>
</html>
