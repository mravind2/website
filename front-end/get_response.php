<?php 
require_once("config.php");
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !=''))
{
    require_once("contact_mail.php");
    $yourName = $conn->real_escape_string($_POST['input-name']);
    $yourEmail = $conn->real_escape_string($_POST['input-email']);
    $yourPhone = $conn->real_escape_string($_POST['input-phone']);
    $comments = $conn->real_escape_string($_POST['input-question']);
    $sql="INSERT INTO contact_form (name, email, phone, comments) VALUES ('".$yourName."','".$yourEmail."', '".$yourPhone."', '".$comments."')";
    if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}
else
{
    echo "Thank you! We will contact you soon";
}
}
else
{
    echo "Please fill Name and Email";
}
?>