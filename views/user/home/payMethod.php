<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<main role="main" class="container py-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 white">Thông tin Chuyển khoản</h4>
        </div>
        <div class="card-body text-center">
            <div class="mb-4">
                <img src="https://img.vietqr.io/image/MB-0838411897-qr_only.png?addInfo=<?= $id ?>&amount=<?= $amount ?>"
                    alt="QR Code" class="img-fluid rounded shadow">
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-start mx-auto">
                    <p class="mb-2">Ngân hàng: <strong>MBBank</strong></p>
                    <p class="mb-2">Số tài khoản: <strong>0838 411 897</strong></p>
                    <p class="mb-2">Số tiền: <strong><?= number_format($amount) ?></strong></p>
                    <p class="mb-0">Nội dung chuyển khoản: <strong><?= $id ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include './views/user/components/footer.php';
?>