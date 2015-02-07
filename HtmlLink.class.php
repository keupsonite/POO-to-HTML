<?php

class HtmlLink extends HtmlElement
{
    public function toHtml()
    {
        parent::toHtml();
        
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        $this->_tohtml = "<a".$attributes.">".$content."</a>";
        
        return ($this->_tohtml);
    }
    
    public function getLinkUrl()
    {
        return ($this->toHtml());
    }
}