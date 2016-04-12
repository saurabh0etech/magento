<?php
class Excellence_Test_Model_Source
{
  public function toOptionArray()
  {
    return array(
      array('value' => 0, 'label' =>'First item'),
      array('value' => 1, 'label' => 'Second item'),
      array('value' => 2, 'label' =>'third item'),
     // and so on...
    );
  }
}
