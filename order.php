<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $code = $_POST['code'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    //Database Connection
    $conn = new mysqli('localhost','root','','e-gardening');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed: ". $conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into ordersreceived(name,email,phone,ordercode,type,description) values(?,?,?,?,?,?)");
        $stmt->bind_param("ssisss" , $name, $email, $phone, $code, $type, $description);
        $execval = $stmt->execute();
        echo $execval;
        echo "Submitted Sucessfully";
        $stmt->close();
        $conn->close();
    }
?>