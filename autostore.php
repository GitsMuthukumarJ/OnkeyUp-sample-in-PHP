ONKEYUP

<script>
  $('#patient_name,#patient_email,#patient_phonenumber,#patient_country_code').on('focusout', function() {
    var name = $("#patient_name").val();
    var email = $("#patient_email").val();
    var mobile = $("#patient_phonenumber").val();
    var code = $("#patient_country_code").val();
   
    if(name !== '' && email !== '' && mobile !== ''){
        jQuery.ajax({
            type: 'post', 
            url: 'https://drgalen.org/wp-content/themes/pearl-medicalguide/consultation/action.php',
            data: { name: name, email: email, mobile: mobile, code:code },
            success: function(successData) {
                console.log(successData);
            }
       });
    }
 });
  </script>






<?php
$servername = "localhost";
$username = "root";
$password = "2v7!wGxrQAv!";
$dbname = "consultation";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$ip = $_SERVER["HTTP_CF_CONNECTING_IP"] ?? $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Kolkata');
$date_time = date('d-m-y H:i:s');

$client_name = mysqli_real_escape_string($conn, $_POST['name']);
$client_mail = mysqli_real_escape_string($conn, $_POST['email']);
$client_mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
$country_code = mysqli_real_escape_string($conn, $_POST['code']);

 
$sql = "INSERT INTO advanced_partial (client_name,client_email,client_mobile,date_time,ip,country_code)Values('$client_name','$client_mail','$client_mobile','$date_time','$ip','$country_code')";

$result=$conn->query($sql);

?>
