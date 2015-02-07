<?php

class HtmlListItem extends HtmlElement
{
    public      $_tohtml;
    
    public function SetContent($string)
    {
        $this->addContent($string);
        
        return ($this->toHtml());
    }
    
    public function prepareTag()
    {
        if ($this->_tag)
            $tag = $this->_tag;
        else
            $tag = "li";
        
        return ($tag);
    }
}