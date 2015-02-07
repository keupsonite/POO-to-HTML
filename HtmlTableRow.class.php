<?php

class HtmlTableRow extends HtmlElement
{
    private     $_content;
    
    public function toHtml()
    {
        parent::prepareAttributes();
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        $this->_tohtml = "\t\t\t<tr".$attributes.">\n".$content."\t\t\t</tr>\n";
        
        return ($this->_tohtml);
    }
    
    public function addItem(HtmlTableCell $cell)
    {
       $this->_content[] = "\t\t".$cell->toHtml();
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