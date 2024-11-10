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
                <label for="">Tên danh mục</label>
                <input type="text" value="<?= $category['cate_name']?>" name="cate_name">
            </div>
            <div>
                <button name="btn_updateCategory">Sửa</button>
            </div>
        </form>
    </div>
</body>
</html>