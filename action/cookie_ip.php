<?php
if (!isset($_COOKIE['user_ip_and_access_date'])) {
    $access_date = date('d-m-Y H:i:s');
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $value = $user_ip . ' ' . $access_date;
    setcookie('user_ip_and_access_date', $value, time() + (86400 * 30), "/"); // 86400 = 1 día
}
?>
