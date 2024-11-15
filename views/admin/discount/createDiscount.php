<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">

        <div>
            <label for="discountAmount">Phần trăm giảm giá</label>
            <input type="number" min="1" max="99" name="discountAmount">
            <div id="discountAmountError" class="error"></div>
        </div>

        <div>
            <label for="start_date">Ngày bắt đầu</label>
            <input type="datetime-local" name="start_date">
            <div id="startDateError" class="error"></div>
        </div>

        <div>
            <label for="end_date">Ngày kết thúc</label>
            <input type="datetime-local" name="end_date">
            <div id="endDateError" class="error"></div>
        </div>

        <div>
            <label for="start_price">Từ giá</label>
            <input type="number" name="start_price">
            <div id="startPriceError" class="error"></div>
        </div>

        <div>
            <label for="end_price">Đến giá</label>
            <input type="number" name="end_price">
            <div id="endPriceError" class="error"></div>
        </div>
        <div>
            <label for="product_detail_id">Sản phẩm</label>
            <select name="product_detail_id" id="productDetailId">
                <option value="">Chọn sản phẩm</option>
                <?php foreach ($allProduct as $product): ?>
                    <?php $count =0; ?>
                    <?php foreach($allDiscount as $discount): ?>
                        <?php if ($discount['product_detail_id'] == $product['product_detail_id']){
                            $count++;
                        } ?>
                    <?php endforeach ?>
                    <?php if ($count ==0): ?>
                        <option value="<?= $product['product_detail_id'] ?>">RAM: <?= $product['ram'] ?> -  Màu: <?= $product['color']?> - Số lượng: <?= $product['amount']?> - Giá: <?= $product['price']?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
            <div id="productDetailIdError" class="error"></div>
        </div>
        <button name="btn_addDiscount">Xác nhận</button>
    </form>
</body>

</html>