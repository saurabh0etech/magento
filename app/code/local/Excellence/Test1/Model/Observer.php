<?php
class Excellence_Test1_Model_Observer {

    public function hidePrice($observer){
            $event = $observer->getEvent();
            $product = $event->getProduct();
            if(!Mage::getSingleton('customer/session')->isLoggedIn()){
                $product->setFinalPrice(1);
                $product->setPrice(1);
            }
             
    }
     
    public function hidePriceCatalog($observer){
        $products = $observer->getCollection();
     
        if(!Mage::getSingleton('customer/session')->isLoggedIn()){
            foreach( $products as $product )
            {
                $product->setFinalPrice(1);
                $product->setPrice(1);
            }
        }
    }
}