<?php
class cartModel
{
    public $conn;
    function __construct()
    {
        $this->conn = database();
    }
    function checkIssetCartByUserId($id)
    {
        return $this->conn->query("SELECT * FROM cart WHERE user_id=$id")->fetch();
    }
    function addCart($userId)
    {
        $time = time();
        return $this->conn->prepare("INSERT INTO cart(user_id, created_at, updated_at) VALUES($userId,$time,$time)")->execute();
    }
    function getCartByUserId($userId)
    {
        return $this->checkIssetCartByUserId($userId);
    }
    function getInformationOfCartDetailById($id)
    {
        return $this->conn->query("SELECT * FROM cart_detail WHERE id=$id")->fetch();
    }
    function getCartDetailById($id){
        return $this->conn->query("SELECT *, cart_detail.amount as cart_detail_amount, cart_detail.price as cart_detail_price, cart_detail.amount * cart_detail.price as total FROM cart_detail JOIN product_detail ON cart_detail.product_detail_id = product_detail.id JOIN product ON product.id = product_detail.product_id WHERE cart_detail.cart_id = $id")->fetchAll();
    }
    function checkIssetProductDetailIdInCartOfUser($userId, $productDetailId)
    {
        return $this->conn->query("SELECT *, cart_detail.id as cart_detail_id FROM cart_detail JOIN cart ON cart_detail.id = cart_detail.id WHERE user_id = $userId AND product_detail_id=$productDetailId")->fetch();
    }
    function getInformationOfCartDetailByUserIdAndProductDetailId($userId, $productDetailId)
    {
        return $this->checkIssetProductDetailIdInCartOfUser($userId, $productDetailId);
    }
    function addAmountProductDetailToCartDetail($cartId, $productDetailId, $amount, $price, $cartDetailInfo)
    {
        // var_dump($cartDetailInfo);
        $id= $cartDetailInfo['cart_detail_id'];
        $time = time();
        $cartDetail  = $this->getInformationOfCartDetailById($id);
        // var_dump($cartDetail);
        // var_dump($price);
        if ($cartDetail['price'] != $price) {
            return $this->conn->prepare("INSERT INTO cart_detail (cart_id, product_detail_id, amount, price, created_at, updated_at) VALUES ($cartId, $productDetailId, $amount, $price, $time, $time) ")->execute();
        } else {
            return $this->conn->prepare("UPDATE cart_detail SET amount= amount + $amount, updated_at= $time WHERE id=$id")->execute();
        }
    }
    function addCartDetail($cartId, $productDetailId, $amount, $price)
    {
        $time = time();
        return $this->conn->prepare("INSERT INTO cart_detail (cart_id, product_detail_id, amount, price, created_at, updated_at) VALUES ($cartId, $productDetailId, $amount, $price, $time, $time)")->execute();
    }
}
