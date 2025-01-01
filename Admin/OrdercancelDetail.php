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
    <title>Order Detail</title>
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

                <div class="row">

                    <div class="col-md-12"> 
                        <div class="card">
                             <?php 
                              if(isset($_POST['detail']))
                              {
                                $oid = $_POST['detail'];
                                $total = $_POST['tamount'];
                                $cid = $_POST['cid'];

                                $name = mysqli_query($con, "SELECT * FROM Customer WHERE Customer_ID = '$cid'");
                                $got = mysqli_fetch_assoc($name);
                              ?>
                            <div class="card-header">
                                OrderDetail Table of <strong class="card-title"> <?php echo $got['Customer_Name']; ?></strong>
                            </div>
                            
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sub-Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            $qcount = 0;

                                            $sel=mysqli_query($con,"SELECT * FROM P_Order po
                                            JOIN Customer c ON po.Customer_ID = c.Customer_ID
                                            JOIN OrderDetail od ON po.Order_ID = od.Order_ID
                                            JOIN ProductDetail p ON p.ProductDetail_ID = od.ProductDetail_ID
                                            WHERE po.Order_ID = '$oid' ORDER BY po.Order_ID DESC");                                       

                                            while($r=mysqli_fetch_assoc($sel)){ 
                                            $qcount += $r['Quantity'];
                                            $subtotal = $r['Price'] * $r['Quantity']; 
                                        ?>
                                        <tr>
                                            <td scope="row"><?php echo $count++ ?></td>
                                            <td scope="row"><?php echo $r['Name']; ?></td>
                                            <td scope="row">
                                                <img src="./upload/<?php echo $r['Image'];?>" style="width: 10vw; height: 15vh;">
                                            </td>                                           
                                            <td scope="row">$<?php echo number_format($r['Price'], 2); ?></td>
                                            <td scope="row"><?php echo $r['Quantity'];?> </td>
                                            <td scope="row">$<?php echo number_format($subtotal, 2); ?></td>
                                        </tr>
                                        <?php 
                                            } 
                                        ?>
                                    </tbody>
                                      <tfoot>
                                      <tr>
                                        <td style="color: transparent;">3</td>
                                        <td style="color: transparent;">3</td>
                                        <td style="color: transparent;">2</td>
                                        <td style="color: transparent;">1</td>
                                        <td>Total Quantity: <strong><?php echo $qcount ?></strong></td>
                                        <td>Grand Total: <strong>$<?php echo number_format($total, 2); ?></strong></td>
                                      </tr>
                                    </tfoot>
                                </table>
                                 <div class="col-md-12">
                                    <form action="" method="POST">
                                        <div class="col-lg-6 col-md-6">
                                            <button class="btn btn-danger btn-md" name="undo" value=" <?php echo $oid ?>"type="submit">Undo</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                                } 
                            ?>
                        </div>

                    </div>
                   

                </div>


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
    if(isset($_POST['undo'])) 
    {
        $oid = $_POST['undo'];

        $OC = "UPDATE P_Order SET Status = 'Pending' WHERE Order_ID = '$oid'";
        $run = mysqli_query($con,$OC);
        if($run)
            echo "<script>alert('Order Cancellation has been undid');location.href = 'Orderconfirm.php';</script>";
        else
            mysqli_connect_error();
    }
?>
</html>