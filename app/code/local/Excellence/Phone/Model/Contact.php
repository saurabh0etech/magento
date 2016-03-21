<?php
class Excellence_Phone_Model_Contact extends Mage_Customer_Model_Customer
{
	public function authenticate($login, $password)
	{
		if(filter_var($login, FILTER_VALIDATE_EMAIL))
		{
			$this->loadByEmail($login);

		}
		else
		{   
			// echo $login; 
			// echo $password;
			// die();
			$email = $this->getResource()->loadByContact($login);
			//echo $login; die();
			$this->loadByEmail($email);
		}         
		if ($this->getConfirmation() && $this->isConfirmationRequired()) {
			throw Mage::exception('Mage_Core', Mage::helper('customer')->__('This account is not confirmed.'),
				self::EXCEPTION_EMAIL_NOT_CONFIRMED
				);
		}
		if (!$this->validatePassword($password)) {
			throw Mage::exception('Mage_Core', Mage::helper('customer')->__('Invalid login or password.'),
				self::EXCEPTION_INVALID_EMAIL_OR_PASSWORD
				);
		}
		Mage::dispatchEvent('customer_customer_authenticated', array(
			'model'    => $this,
			'password' => $password,
			));

		return true;
	}
}

?>