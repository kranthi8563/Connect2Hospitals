<?php
error_reporting(0);
//if(isset($Name) || isset($Email) || isset($Select_Doctor) || isset($Appointment_Date) || isset($Message) ){
    $Name = $_POST['Name'];
    $Email = $_POST['email'];
    $Mobile_Number = $_POST['number'];
    $Select_Hospital = $_POST['sel1'];
    $Select_Doctor = $_POST['sel2'];
    $Appointment_Date = $_POST['date1'];
    $Address = $_POST['texta1'];
    
//}
//Database connection
$conn = new mysqli('localhost','root','','connect');
    if($conn->connect_error){
        die('Connection Failed :'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("Insert into appointment(Name, Email,Mobile_Number,Select_Hospital, Select_Doctor, Appointment_Date, Address)
        values(?,?,?,?,?,?,?)");
        $stmt->bind_param("ssissss",$Name, $Email,$Mobile_Number,$Select_Hospital, $Select_Doctor, $Appointment_Date, $Address);
        $execval = $stmt->execute();
        echo $execval;
        //$stmt->Execute();
        echo "Appointment Successfully Registered....!";
        $stmt->close();
        $conn->close();
    }

?>