<?php
    class cartController{
        public $cart;
        function __construct()
        {
            $this->cart = new cartModel;
        }
    }
?>