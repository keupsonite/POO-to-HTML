<?php

class HtmlList extends HtmlElement
{
    private     $_content;
    
    public function toHtml()
    {
        parent::prepareAttributes();
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        $this->_tohtml = "\n\t\t<ul".$attributes.">".$content."\t\t</ul>";
        
        return ($this->_tohtml);
    }
    
    public function addItem(HtmlListItem $item)
    {
       $this->_content[] = "\n\t".$item->toHtml();
    }
    
    public function prepareContent()
    {
        $content =  "";
        
        if ($this->_content)
        {
            foreach ($this->_content as $value)
                $content .= $value;
        }
        
        return ($content);
    }
}