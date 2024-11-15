<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="POST">

            <div>
                <label for="discountAmount">Phần trăm giảm giá</label>
                <input type="number" min="1" max="99" name="discountAmount" value="<?= $discount['discount_amount']?>">
                <div id="discountAmountError" class="error"></div>
            </div>

            <div>
                <label for="start_date">Ngày bắt đầu</label>
                <input type="datetime-local" name="start_date" value="<?= epochTimeToDateTimeLocal($discount['start_date'])?>">
                <div id="startDateError" class="error"></div>
            </div>

            <div>
                <label for="end_date">Ngày kết thúc</label>
                <input type="datetime-local" name="end_date" value="<?= epochTimeToDateTimeLocal($discount['end_date'])?>">
                <div id="endDateError" class="error"></div>
            </div>

            <div>
                <label for="start_price">Từ giá</label>
                <input type="number" name="start_price" value="<?= $discount['start_price']?>">
                <div id="startPriceError" class="error"></div>
            </div>

            <div>
                <label for="end_price">Đến giá</label>
                <input type="number" name="end_price" value="<?= $discount['end_price']?>">
                <div id="endPriceError" class="error"></div>
            </div>
            <button name="btn_updateDiscount">Xác nhận</button>
        </form>
    </div>
</body>

</html>