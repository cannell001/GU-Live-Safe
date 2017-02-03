<?php
session_start();
if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
include 'dbconnection.php';
$email_id=$_REQUEST['email_id'];
 $sql="select * from users where email_id='$email_id'";
$res=mysql_query($sql);
if($catres=mysql_fetch_assoc($res)) {
	
 $_SESSION['pass']=$catres['password'];

  $to =$email_id;
 $from = "lankadha001@knights.gannon.edu"; // this is the sender's Email address
 // Create the message....
  $_SESSION['pass'];
$subject = 'Password Verification Information';
// message
 $message= 
'<html>
<head>
<title>GuLiveSafe</title>
</head>
<body><div style="background-color: #E5E5E5; padding-left:20px;padding:20px">
<p>Your email_id is : '.$email_id. ' and password is :'.$_SESSION['pass']=$catres['password'].'</p>
</div>
</body>
</html>
';

$headers = 'From: GuLiveSafe lankadha001@knights.gannon.edu' . "\r\n" ;
   $headers .='Reply-To: '. $to . "\r\n" ;
   $headers .='X-Mailer: PHP/' . phpversion();
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";   
// Mail it
//mail($from, $subject, $message, $headers);
mail($to, $subject, $message, $headers);
mail($from, $subject, $message , $headers); 

        $response["message"] = "success";
       echo json_encode($response);

}
else{
        $response["message"] = "fail";
        echo json_encode($response);

	
}

?>