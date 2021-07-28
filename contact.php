<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //Database Connection
    $conn = new mysqli('localhost','root','','e-gardening');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed: ". $conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into contact(name,email,title,phone,message) values(?,?,?,?,?)");
        $stmt->bind_param("sssss" ,$name,$email,$title,$phone,$message);
        $execval = $stmt->execute();
        echo $execval;
        echo "Submitted Sucessfully";
        $stmt->close();
        $conn->close();
    }
?>