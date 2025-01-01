<?php
    $connect = mysqli_connect('localhost','root','');
        if($connect)
            echo "connection secure <br>";
        echo mysqli_connect_error();
    
    $database = "CREATE DATABASE IF NOT EXISTS furniture_shop";
    $return = mysqli_query($connect,$database);
        if($return)
            echo "Database successfully created <br>";
        echo mysqli_connect_error();
    $seldatabase = mysqli_select_db($connect,"furniture_shop");
        if($seldatabase)
            echo "Database has been selected <br>";
        echo mysqli_connect_error();

   $admin = "CREATE TABLE IF NOT EXISTS Admin
        (
            Admin_ID int primary key auto_increment not null,
            Admin_Name varchar(30),
            Password varchar(40)
        );";
    $adreturn = mysqli_query($connect,$admin);
        if($adreturn)
            echo "Admin table created <br>";
        echo mysqli_error($connect);

    $customer = "CREATE TABLE IF NOT EXISTS Customer
    (
        Customer_ID int primary key auto_increment not null,
        Customer_Name varchar(30),
        Password varchar(40),
        C_Date date
    );";
    $creturn = mysqli_query($connect,$customer);
        if($creturn)
            echo "Customer table created <br>";
        echo mysqli_error($connect);


    $Wood = "CREATE TABLE IF NOT EXISTS WoodType
    (
        WoodType_ID int primary key auto_increment not null,
        WoodType_Name varchar(100)
    );";
    $wreturn = mysqli_query($connect,$Wood);
        if($wreturn)
            echo "Wood Type table created <br>";
        echo mysqli_error($connect);

    $category = "CREATE TABLE IF NOT EXISTS Category
    (
        Category_ID int primary key auto_increment not null,
        Category_Name varchar(100)
    );";
    $careturn = mysqli_query($connect,$category);
        if($careturn)
            echo "category table created <br>";
        echo mysqli_error($connect);

    $Subcategory = "CREATE TABLE IF NOT EXISTS SubCategory
    (
        SubC_ID int primary key auto_increment not null,
        SubC_Name varchar(100),
        Category_ID int not null,
        foreign key(Category_ID) references Category(Category_ID) 
    );";
    $subreturn = mysqli_query($connect,$Subcategory);
        if($subreturn)
            echo "Subcategory table created <br>";
        echo mysqli_error($connect);

   $feedback = "CREATE TABLE IF NOT EXISTS Feedback
    (
        Feedback_ID int primary key auto_increment not null,
        Feedback varchar(255),
        Customer_ID int not null,
        foreign key(Customer_ID) references customer(Customer_ID)  
    );";
    $freturn = mysqli_query($connect,$feedback);
        if($freturn)
            echo "feedback table created <br>";
        echo mysqli_error($connect);

    $order = "CREATE TABLE IF NOT EXISTS P_Order
    (
        Order_ID int primary key auto_increment not null,
        Totalamount int,
        Status varchar(30),
        Pay_type varchar(50),
        O_Date date,
        Customer_ID int not null,
        foreign key(Customer_ID) references Customer(Customer_ID)
    );";
    $oreturn = mysqli_query($connect,$order);
        if($oreturn)
            echo "Order table created <br>";
        echo mysqli_error($connect); 

    $Product = "CREATE TABLE IF NOT EXISTS ProductDetail
    (
        ProductDetail_ID int primary key auto_increment not null,
        Name varchar(50),
        Image varchar(100),
        Price int,
        Description varchar (255),
        SubC_ID int not null,
        foreign key(SubC_ID) references SubCategory(SubC_ID),
        WoodType_ID int not null,
        foreign key (WoodType_ID) references WoodType(WoodType_ID)
    );";
    $Preturn = mysqli_query($connect,$Product);
        if($Preturn)
            echo "Product Detail table created <br>";
        echo mysqli_error($connect);

    $orderdetail = "CREATE TABLE IF NOT EXISTS OrderDetail
    (
        OrderDetail_ID int primary key auto_increment not null,
        Quantity int,
        Order_ID int not null,
        foreign key(Order_ID) references P_Order(Order_ID),
        ProductDetail_ID int not null,
        foreign key(ProductDetail_ID) references ProductDetail(ProductDetail_ID)
    );";
    $odreturn = mysqli_query($connect,$orderdetail);
        if($odreturn)
            echo "Order Detail table created <br>";
        echo mysqli_error($connect);    
?>