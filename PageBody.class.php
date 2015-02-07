<?php

class       PageBody
{
    private     $_attributes;
    public      $_body = array();
    
    public function     addAttribute($attribute, $value)
    {
        if (isset($attribute) && isset($value))
        {
            $this->_attributes[$attribute] = $value;
        }
    }
    
    public function     getAttribute()
    {
        $result = "";
        
        foreach ($this->_attributes as $key => $value)
        {
            $result .= " ".$key."=".$value;
        }
        
        return ($result);
    }
    
    public function getBody()
    {
        $count_HtmlElement = count($this->_body);
        $head = "";
        $body = "";
        $html = "";
        
        for ($i = 0; $i < $count_HtmlElement; $i++)
        {
            if ($this->_body[$i]->_tag == "meta" || $this->_body[$i]->_tag == "link")
            {
                $head .= $this->_body[$i]->toHtml();
            }
            else if ($this->_body[$i]->_toBody == 1)
            {
                $body .= $this->_body[$i]->toHtml();
            }
        }
        if (strlen(Page::getTitle()) > 1)
            $head .= Page::getTitle();
        if (strlen(Page::getAuthor()) > 1)
            $head .= PHP_EOL.Page::getAuthor();
        if (strlen(Page::getKeywords()) > 1)
            $head .= PHP_EOL.Page::getKeywords();
        if (strlen(Page::getLastMod()) > 1)
            $head .= PHP_EOL.Page::getLastMod();
        
        $html = "<!DOCTYPE html>\n".
                "<html>\n".
                "\t<head>\n".$head."\n\t</head>\n".
                "\t<body".$this->getAttribute().">\n".$body."\n\t</body>\n".
                "</html>";
        
        return ($html);
    }
}