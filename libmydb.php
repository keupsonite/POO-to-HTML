<?php
/*
** libmydb.php for libmydb in /Users/keupsonite/Documents/Sites/libmy-2014-lounes_z
** 
** Made by zakaria lounes
** Login   <lounes_z@epitech.net>
** 
** Started on  Sun Oct 28 13:14:07 2012 zakaria lounes
** Last update Sun Oct 28 13:14:10 2012 zakaria lounes
*/

class   DBConnection
{
    private     $_server,
                $_port,
                $_user,
                $_password,
                $_dbname,
                $_Connect,
                $_SetCredentials,
                $_query,
                $_GestErrorMessage;


    public function     Connect($server, $port)
    {
        $this->_GestErrorMessage = NULL;
        
        if (isset($server) && isset($port))
        {
            $this->_server = $server;
            $this->_port = $port;
            
            if ($this->_SetCredentials == 1)
            {
                $this->_Connect = mysqli_connect($server, $this->_user, $this->_password, $this->_dbname, $port);
                
                if (!$this->_Connect)
                {
                    $this->_GestErrorMessage = mysqli_connect_error();
                    
                    return (0);
                }
                else
                    return (1);
            }
            else
                return (0);
        }
        else
            return (0);
    }
    
    public function     SetCredentials($user, $password)
    {
        if (isset($user) && isset($password))
        {
            $this->_user = $user;
            $this->_password = $password;
            $this->_SetCredentials = 1;
            
            return (1);
        }
        else
            return (0);
    }
    
    public function     Execute($query)
    {
        
        if (!$this->_Connect && $this->_SetCredentials == 1)
            $this->Connect($this->_server, $this->_port);
        
        if ($this->_Connect)
        {
            $this->_GestErrorMessage = NULL;
            $this->_query = mysqli_query($this->_Connect, $query);
            
            if ($this->_query)
                return (1);
            else
            {
                $this->_GestErrorMessage = mysqli_error($this->_Connect);
                return (0);
            }
        }
        else
            return (0);
    }
    
    public function     SelectDatabase($dbname)
    {
        $this->_GestErrorMessage = NULL;
        
        if (isset($dbname) && $this->_Connect)
        {
            $this->_dbname = $dbname;
            
            if (mysqli_select_db($this->_Connect, $this->_dbname))
            {
                mysqli_select_db($this->_Connect, $this->_dbname);

                return (1);
            }
            else
            {
                $this->_GestErrorMessage = mysqli_error($this->_Connect);

                return (0);
            }
        }
        else
            return (0);
    }
    
    public function     GetResult()
    {
        $this->_GestErrorMessage = NULL;
        
        if ($this->_query)
        {
            $myobject = array();
            
            while ($object = mysqli_fetch_object($this->_query))
            {
                $myobject[] = $object; 
            }
            
            if (count($myobject))
                return ($myobject);
            else
            {
                $this->_GestErrorMessage = mysqli_error($this->_Connect);
                return (NULL);
            }
        }
        else
            return (NULL);
    }
    
    public function     GestErrorMessage()
    {
        if ($this->_GestErrorMessage)
            return ($this->_GestErrorMessage);
        else
            return (NULL);
    }
    
    public function     Disconnect()
    {
        if ($this->_Connect)
        {
            if ($this->_query)
                mysqli_free_result($this->_query);
            
            mysqli_close($this->_Connect);
            
            return (1);
        }
        else
            return (0);
    }
}