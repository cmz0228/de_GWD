<?php require_once('auth.php'); ?>
<?php if (isset($auth) && $auth) {?>
<?php
$DoH1 = $_GET['DoH1'];
$DoH2 = $_GET['DoH2'];

$data = json_decode(file_get_contents('/usr/local/bin/0conf'), true);
$data['doh']['doh1'] = $DoH1;
$data['doh']['doh2'] = $DoH2;
$newJsonString = json_encode($data, JSON_PRETTY_PRINT);
file_put_contents('/usr/local/bin/0conf', $newJsonString);

shell_exec('sudo /usr/local/bin/ui-changeDOH');
?>
<?php }?>