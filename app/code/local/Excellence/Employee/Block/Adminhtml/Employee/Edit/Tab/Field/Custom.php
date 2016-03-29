<?php
class Excellence_Employee_Block_Adminhtml_Employee_Edit_Tab_Field_Custom extends Varien_Data_Form_Element_Abstract{
    public function __construct($attributes=array())
    {
        parent::__construct($attributes);
    }
    public function getElementHtml()
    {
        $value = $this->getValue();
        $custom1 = $this->getCustom1();
        $custom2 = $this->getCustom1();
        $html = '<b><p id="' . $this->getHtmlId() . '"'. $this->serialize($this->getHtmlAttributes()) .'>I can put any custom html/javascript here.</p></b>';
        $html .= "<p>Here i can access custom fields passed </p>";
        $html .= "<b>CheckBox:</b> <input type='checkbox' name='check'><br/>";
        $html .= "<b>Input:</b> <input type='text' name='txt'><br/>";
        $html .= "<b>Description:</b> <textarea type='text' name='txt'></textarea><br/>";
        $html .= $this->getAfterElementHtml();
        return $html;
    }
}
