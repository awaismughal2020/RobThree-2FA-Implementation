<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Validation</title>
</head>
<body>

<h2>Submit QR Code</h2>

<form action="" method="post">
    <input type="text" name="qr_code_data" placeholder="Enter QR Code" required>
    <?php
        if($_GET && isset($_GET['secretFromPage'])){
    ?>
    <input type="hidden" name="qr_secret" value="<?=$_GET['secretFromPage']?>">
    <?php
        }
    ?>
    <button type="submit" name="submit">Submit</button>
</form>

<?php

require 'secretGenerator.php';

// Check if form is submitted
if(isset($_POST['submit'])) {

    // Check if QR code data is provided
    if(isset($_POST['qr_code_data']) && !empty(trim($_POST['qr_code_data']))) {
        $qr_data = $_POST['qr_code_data'];
        $qr_secret = $_GET['secretFromPage'];
        $result = $tfa->verifyCode($qr_secret, $qr_data);

        if($result){
            echo "<p>QR Code Accepted</p>";
        } else {
            echo "<p>QR Code Rejected</p>";
        }

    } else {
        echo "<p>Please enter Scanned QR code.</p>";
    }
}
?>

</body>
</html>
