<?php

class   HtmlElement
{
    private     $_attributes,
                $_content;
    public      $_tohtml,
                $_toBody = 0,
                $_tag;
    
    public function     setTag($tag)
    {
        if (isset($tag))
            $this->_tag = $tag;
    }
    
    public function     getTag()
    {
        return ($this->_tag);
    }
    
    public function     addAttribute($key, $value)
    {
        if (isset($key) && isset($value))
        {
            $this->_attributes[$key] = $value;
        }
    }
    
    public function     addContent($string)
    {
        $this->_content = $string;
    }
    
    public function    prepareTag()
    {
        if ($this->_tag)
            $tag = $this->_tag;
        else
            $tag = "";
        
        return ($tag);
    }
    
    public function    prepareAttributes()
    {
        if ($this->_attributes)
        {
            $count_attributes = count($this->_attributes);
            $i = 0;
            $attributes = "";
            
            foreach ($this->_attributes as $key => $value)
            {
                if ($i == $count_attributes - 1)
                    $attributes .= ' '.$key.'="'.$value.'"';
                else
                    $attributes .= ' '.$key.'="'.$value.'"';
                $i++;
            }
        }
        else
            $attributes = "";
        
        return ($attributes);
    }
    
    public function    prepareContent()
    {
        if ($this->_content)
            $content = $this->_content;
        else
            $content = "";
        
        return ($content);
    }
    
    public function     toHtml()
    {
        $tag = $this->prepareTag();
        $attributes = $this->prepareAttributes();
        $content = $this->prepareContent();
        
        if ($tag != "")
        {
            $this->_tohtml = "<".$tag.$attributes.">".$content."</".$tag.">";
            
            if ($tag == "meta" || $tag == "link")
                $this->_tohtml = "<".$tag.$attributes." />";
        }
        else
            $this->_tohtml = $content;
        
        return ("\t\t".$this->_tohtml."\n");
    }
    
    public function toBody()
    {
        $this->_toBody = 1;
    }
}