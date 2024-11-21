<?php
function database()
{
    return new PDO("mysql:host=localhost;dbname=project1", "root", "");
}
function SweetAlert2($icon, $message)
{
    echo "<script src='assets/sweetalert2/sweetalert2.js'></script>";
    echo "<link rel='stylesheet' href='assets/sweetalert2/sweetalert2.css'>";
    return "<script>Swal.fire({
  title: '$message',
  icon: '$icon'
})</script>";
}
function headerAfterXSecondWithSweetAlert2($location, $time, $icon, $message)
{
    echo "<script>
        setTimeout(function() {
                    window.location.href = '${location}';
                }, ${time});
                </script>";
    echo SweetAlert2($icon, $message);
}
function epochTimeToDateTime($epochtime, $format = "H:i:s d-m-Y")
{
    // Sử dụng hàm date() để chuyển đổi epochtime thành định dạng timestamp
    return date($format, $epochtime);
}
function epochTimeToDateTimeLocal($epochtime)
{
    // Chuyển epochtime thành định dạng datetime-local: Y-m-d\TH:i
    return date("Y-m-d\TH:i", $epochtime);
}
function dateTimeToEpochTime($time)
{
    $datetime = new DateTime($time);
    return $datetime->getTimestamp();
}
function deleteSession()
{
    unset($_SESSION['error']);
    // Xóa tất cả các session
    // session_unset(); 
    // session_destroy();
}
