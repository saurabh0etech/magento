<?php

class Excellence_Test1_Block_Catalog_Product_Price extends Mage_Catalog_Block_Product_Price
{

//    public function getProduct()
//    {
//       
//        return 'dsfasdf';
//    }

	public function getDisplayMinimalPrice()
	{

		echo "Block Override";
		return $this->_getData('display_minimal_price');
	}
	// public function abc(){
	// 	echo "Block Override"; 
	// }

}