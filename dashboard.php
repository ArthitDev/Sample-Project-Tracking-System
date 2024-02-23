<?php
include('header.php');
include('functions.php');

if (isset($_SESSION['login_username'])) {
    $username = $_SESSION['login_username'];
    echo '<div class="text-center">';
    echo '<h1>ยินดีต้อนรับ, ' . $username . '</h1>';
    echo '</div>';
} else {
    echo '<div class="text-center">';
    echo '<h1>ยินดีต้อนรับ</h1>';
    echo '</div>';
}
?>
<div class="text-center" style="text-decoration: underline;">
    <h1>ระบบติดตามโครงการ</h1>
</div>


<hr>

<?php
include('footer.php');
?>