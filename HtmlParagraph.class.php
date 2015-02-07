<?php

class HtmlParagraph extends HtmlElement
{
    public function toHtml()
    {
        parent::toHtml();
        
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        $this->_tohtml = "<p".$attributes.">".$content."</p>";
        
        return ($this->_tohtml);
    }
}