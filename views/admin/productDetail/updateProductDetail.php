<form action="" method="POST">
    <input type="number" name="amount" placeholder="Số lượng" value="<?=$productDetail['amount']?>">
    <input type="number" name="ram" placeholder="RAM" value="<?=$productDetail['ram']?>">
    <input type="text" name="color" placeholder="Màu" value="<?=$productDetail['color']?>">
    <input type="number" name="price" placeholder="Giá" value="<?= $productDetail['price']?>">
    <button name="btn_updateProductDetail">Sửa</button>
</form>