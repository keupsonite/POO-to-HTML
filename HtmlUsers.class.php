<?php

class HtmlUsers extends HtmlTable
{
    private $_caption,
            $_content,
            $_attributes;
    
    public function     makeListTab($donnees)
    {
        $UsersTab = new HtmlTable();
        $makeListTabRow = array();
        $i = 0;
        
        if (isset($donnees) && count($donnees))
        {
            foreach ($donnees as $donnees)
            {
                $makeListTabRow[$i] = new HtmlTableRow();
                
                foreach ($donnees as $key => $value)
                {
                    if ($key == 'pseudo' || $key == 'email' || $key == 'date')
                    {
                        $makeListTabCell = new HtmlTableCell();
                        $makeListTabCell->addAttribute('class', $key);
                        $makeListTabCell->addContent($value);
                        
                        $makeListTabRow[$i]->addItem($makeListTabCell);
                    }
                }
                $UsersTab->addItem($makeListTabRow[$i]);
                $i++;
            }
            
            if (isset($this->_caption))
                $UsersTab->setCaption($this->_caption);
            
            if (isset($this->_attributes))
            {
                foreach ($this->_attributes as $key => $value)
                {
                    $UsersTab->addAttribute($key, $value);
                }
            }
            
            $this->_content = ($UsersTab);
            
            return (1);
        }
        else
            return (0);
    }
    
    public function     setCaption($caption)
    {
        if (isset($caption))
            $this->_caption = $caption;
        
        if ($this->_content)
            $this->_content->setCaption($this->_caption);
    }
    
    public function     toHtml()
    {        
        return ($this->_content->tohtml());
    }
    
    public function     getTableNumRows()
    {
        if ($this->_content)
        {
            return ($this->_content->getTableNumRows());
        }
    }
    
    public function     addAttribute($key, $value)
    {
        if (isset($key) && isset($value))
        {
            $this->_attributes[$key] = $value;
            
            if ($this->_content)
                $this->_content->addAttribute($key, $value);
        }
        
    }
}