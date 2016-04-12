<?php
require_once 'Mage/Checkout/controllers/CartController.php';
class Excellence_Test1_Checkout_CartController extends Mage_Checkout_CartController{

	public function indexAction(){
		echo "hello";
	}

}
