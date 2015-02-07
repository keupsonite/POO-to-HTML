<?php

class HtmlTable extends HtmlElement
{
    private     $_content,
                $_caption;
    public      $_tag;
    
    public function toHtml()
    {
        parent::prepareAttributes();
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        $this->_tohtml = "\n\t\t<table".$attributes.">\n\t\t\t".$this->_caption.$content."\t\t</table>\n";
        
        return ($this->_tohtml);
    }
    
    public function addItem(HtmlTableRow $row)
    {
       $this->_content[] = $row->toHtml();
    }
    
    public function prepareContent()
    {
        $content =  "";
        
        if ($this->_content)
        {
            foreach ($this->_content as $value)
                $content .= $value;
        }
        $this->_content = $content;
        
        return ($this->_content);
    }
    
    public function setCaption($caption)
    {
        if (isset($caption))
            $this->_caption = '<caption>'.$caption."</caption>\n";
    }
    
    public function getTableNumRows()
    {
        if ($this->_content)
        {
            return (count($this->_content));
        }
    }
}
