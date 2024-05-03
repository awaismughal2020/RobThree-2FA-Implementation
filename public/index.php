<?php
require 'secretGenerator.php';
$secret = $tfa->createSecret();
$secretToSave = $secret;
?>

<p>Scan the following image with your app:</p>
<img src="<?php echo $tfa->getQRCodeImageAsDataUri('MWP-New-2FA', $secret); ?>">

<form action="validate.php" method="get">
    <input type="hidden" name="secretFromPage" value="<?=$secretToSave?>">
    <button type="submit">Validate</button>
</form>


