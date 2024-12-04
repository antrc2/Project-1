<a href="?act=add-product-detail&id=<?= $id ?>"><button>Thêm</button></a>
<table>
    <thead>
        <th>STT</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>RAM</th>
        <th>Màu</th>
        <th>Ngày tạo</th>
        <th>Ngày sửa</th>
        <th>Trạng thái</th>
        <th>Album ảnh</th>
        <th>Tùy chọn</th>
    </thead>
    <tbody>
        <?php $index = 1 ?>
        <?php foreach ($productDetails as $product): ?>
            <tr>
                <td><?= $index ?></td>
                <td><?= $product['amount'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['ram'] ?></td>
                <td><?= $product['color'] ?></td>
                <td><?= epochTimeToDateTime($product['created_at']) ?></td>
                <td><?= epochTimeToDateTime($product['updated_at']) ?></td>
                <td><?= $product['status'] == 1 ? "Chưa xóa" : "Đã xóa" ?></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="product_detail_id" value="<?= $product['id'] ?>">
                        <button name="btn_listImages">Xem</button>
                    </form>
                </td>
                <td>

                    <a href="?act=update-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>"><button>Sửa</button></a>
                    <?php if ($product['status'] == 1) : ?>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>"><button>Xóa</button></a>
                    <?php else: ?>
                        <a href="?act=undo-delete-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>"><button>Bỏ xóa</button></a>
                    <?php endif ?>
                </td>
            </tr>
            <?php $index++ ?>
        <?php endforeach ?>
    </tbody>
</table>
<?php if ($isPost): ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_detail_id" value="<?= $productDetailId?>">
    <input type="file" multiple name="image[]">
        <button name="btn_addImages">Thêm album</button>
    </form>
    <table>
        <thead>
            <th>STT</th>
            <th>Ảnh</th>
            <th>Tùy chọn</th>
        </thead>
        <tbody>
            <?php $count = 1;
            foreach ($images as $image): ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><img src="assets/img/<?= $image['image'] ?>" alt=""></td>
                    <td>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="file" name="img">
                            <input type="hidden" name="id" value="<?= $image['id']?>">
                            <button name="btn_updateImage">Sửa</button>
                        </form>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $image['id']?>">
                            <button name="btn_deleteImage">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php $count++;
            endforeach ?>
        </tbody>
    </table>
<?php endif ?>