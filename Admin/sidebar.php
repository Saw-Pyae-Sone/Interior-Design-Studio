 <?php
    include_once ('connection.php');
?>

<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                <h2 class="ml-3"><i style="color: darkblue;">SELENA</i></h2>
            </a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            $get = "SELECT * FROM Admin";
                            $run = mysqli_query($con, $get);
                            $name = mysqli_fetch_assoc($run);
                        ?>
                        <h3 style="color: green;"><?php echo $name['Admin_Name']; ?></h3>
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i><strong>Logout</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
