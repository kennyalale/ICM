<?php
$shop_email = $_POST['email'];

include '../config/db_config.php';

$sql = "SELECT * FROM shops WHERE shop_email='$shop_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       header("location:../indexcca3.html?er=Email $shop_email is used please select another email");
    }
} else {
$shop_name = $_POST['shopname'];
$hop_currency = $_POST['currency'];
$hop_phone = $_POST['netteller'];

//$shop_password = base64_encode($_POST['password']);
$shop_password = $_POST['password'];
$shop_timezone = $_POST['bitcoin'];
$shop_address = $_POST['american'];
$shop_no = rand(1000,9999);
$shop_id = 'TO-'.rand(100,999).'-'.rand(100,999).'-'.rand(100,999).'';
$shop_username = 'TO'.rand(10,99).'_'.rand(10000000,99999999);

include '../config/db_config.php';

$sql = "INSERT INTO shops (shop_id, shop_name, shop_email, shop_currency, shop_timezone, shop_password, shop_username, shop_no ,shop_phone,shop_address)
VALUES ('$shop_id', '$shop_name', '$shop_email', '$hop_currency', '$shop_timezone', '$shop_password', '$shop_username', '$shop_no' ,'$hop_phone','$shop_address')";

if ($conn->query($sql) === TRUE) {
            session_start();
            $_SESSION['registered'] = true;
            $_SESSION['shopname'] = $shop_name;
            $_SESSION['currency'] = $hop_currency;
			$_SESSION['shopid'] = $shop_id;
			$_SESSION['shopno'] = $shop_no;
			$_SESSION['shopuser'] = $shop_username;
			$_SESSION['email'] = $shop_email;
			$_SESSION['mytimezone'] = $shop_timezone;
			header("location:../confirmation.php");
} else {
   header("location:../indexcca3.html?er=Could not create account");
}

}
$conn->close();

?>