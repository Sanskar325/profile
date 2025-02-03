<?php 
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="profile";
    public $mysqli;
    
    public function __construct() {
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    
    public function contact_us($data){
        $fname=$data['Name'];
        $email=$data['email'];
        $subject=$data['subject'];
        $message=$data['message'];
        $q="insert into contact_us set first_name='$fname',  email='$email', subject'$subject', message='$message'";
       $data= $this->mysqli->query($q);
       if($data==true){
           $body="One message received from sanskar contact us. details are below..<br> first_name='$fname', email='$email', message='$message'";
           return $this->sent_mail("info@sanskar_profile.com", "Message received from sanskar", $body);
       }
    }
    
    public function sent_mail($to,$subject,$body){
$mailFromName="HubBunch";
$mailFrom="info@hubbunch.com";
/////////////////////////////////////////////////////////////
//Mail Header
$mailHeader = 'MIME-Version: 1.0'."\r\n";
$mailHeader .= "From: $mailFromName <$mailFrom>\r\n";
$mailHeader .= "Reply-To: $mailFrom\r\n";
$mailHeader .= "Return-Path: $mailFrom\r\n";
//$mailHeader .= "CC: $mailCC\r\n";
//$mailHeader .= "BCC: $mailBCC\r\n";
$mailHeader .= 'X-Mailer: PHP'.phpversion()."\r\n";
$mailHeader .= 'Content-Type: text/html; charset=utf-8'."\r\n";
/////////////////////////////////////////////////////////////
//Email to Admin
if(mail($to, $subject, $body, $mailHeader)){
 return true;
 }else{
return false;
 }
    }
}


?>