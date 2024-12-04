<?php if(!isset($_SESSION['username'])){
    header("Location: ?act=login");
} else {
    $acc = new accountModel;
    $userInfo = $acc->getInformationUserByUsername($_SESSION['username']);
    if($userInfo['role_id'] ==2){

    } else {
        header("Location: ?act=forbidden");
    }
} 
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <h1 style="font-size: 25px;"><a href="http://localhost/project-1/" class="nav-link">Website</a></h1>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
