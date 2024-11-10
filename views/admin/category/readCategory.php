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
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Sửa</th>
                <th>Xóa / Bỏ xóa</th>
            </tr>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category['id']?></td>
                <td><?= $category['cate_name']?></td>
                <td><?= $category['status'] == 1 ? "Chưa xóa" : "Đã xóa"?></td>
                <td><a href="?act=update-category&id=<?= $category['id']?>"><button>Sửa</button></a></td>
                <td>
                    <?php if ($category['status'] ==1): ?>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-category&id=<?= $category['id']?>"><button>Xóa</button></a>
                    <?php else: ?>
                        <a onclick="return confirm('Bạn có chắc chắn muốn bỏ xóa không?')" href="?act=undo-delete-category&id=<?= $category['id']?>"><button>Bỏ xóa</button></a>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>