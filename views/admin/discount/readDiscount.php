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
                <th>Biến thể</th>
                <th>Phần trăm giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Từ giá</th>
                <th>Đến giá</th>
                <th>Sửa</th>
                <th>Xóa / Bỏ xóa</th>
            </tr>
            <?php foreach ($discounts as $discount): ?>
            <tr>
                <td><?= $discount['discount_id'] ?></td>
                <td>RAM: <?= $discount['ram'] ?> - Màu: <?= $discount['color'] ?> - Số lượng: <?= $discount['amount'] ?> - Giá: <?= $discount['price'] ?></td>
                <td><?= $discount['discount_amount'] ?></td>
                <td><?= epochTimeToDateTime($discount['start_date']) ?></td>
                <td><?= epochTimeToDateTime($discount['end_date']) ?></td>
                <td><?= $discount['start_price'] ?></td>
                <td><?= $discount['end_price'] ?></td>
                <td><a href="?act=update-discount&id=<?= $discount['discount_id'] ?>"><button>Sửa</button></a></td>
                <td>
                <?php if ($discount['status'] == 1): ?>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Xóa</button></a>
                <?php else: ?>
                    <a onclick="return confirm('Bạn có chắc chắn muốn bỏ xóa không?')" href="?act=undo-delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Bỏ xóa</button></a>
                <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>