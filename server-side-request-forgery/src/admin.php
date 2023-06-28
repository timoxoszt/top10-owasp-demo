<?php
// whitelist IP address, admin's IP address is 127.0.0.1
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    echo 'Welcome Admin, your password is timoxoszt{ssrf_1s_d4ng3r0us}';
}else{
    echo 'You are not allowed to access this page';
    echo '<br>';
    echo 'Your IP address is: ' . $_SERVER['REMOTE_ADDR'];
}
?>