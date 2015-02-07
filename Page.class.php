<?php
require_once("PageBody.class.php");

class   Page
{
    private static  $_title,
                    $_author,
                    $_last_mod,
                    $_keywords;
    
    public static function  setTitle($title)
    {
        if (isset($title))
        {
            self::$_title = $title;
        }
    }
    
    public static function  getTitle()
    {
        return ("\t\t<title>".self::$_title."</title>");
    }
    
    public static function  setAuthor($author)
    {
        if (isset($author))
        {
            self::$_author = $author;
        }
    }
    
    public static function  getAuthor()
    {
        return ("\t\t".'<meta name="author" content="'.self::$_author.'" />');
    }
    
    public static function  setLastMod($date)
    {
        if (isset($date))
        {
            self::$_last_mod = $date;
        }
    }
    
    public static function  getLastMod()
    {
        return ("\t\t".'<meta name="Date-Revision-yyyymmdd" content="'.self::$_last_mod.'" />');
    }
    
    public static function  setKeywords($keywords)
    {
        if (isset($keywords))
        {
            self::$_keywords = $keywords;
        }
    }
    
    public static function  getKeywords()
    {
        return ("\t\t".'<meta name="keywords" content="'.self::$_keywords.'" />');
    }
    
    public static function  getBody()
    {
        return (new PageBody());
    }
}