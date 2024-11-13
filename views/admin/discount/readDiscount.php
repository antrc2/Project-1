<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Phần trăm giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Từ giá</th>
                <th>Đến giá</th>
            </tr>
            <?php foreach ($discounts as $discount): ?>
            <tr>
                <td><?= $discount['id']?></td>
                <td><?= $discount['name']?></td>
                <td><?= $discount['discount_amount']?></td>
                <td><?= epochTimeToDateTime($discount['start_date'])?></td>
                <td><?= epochTimeToDateTime($discount['end_date'])?></td>
                <td><?= $discount['start_price']?></td>
                <td><?= $discount['end_price']?></td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>