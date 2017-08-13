<?php

class Format
{
    public function formatDate($date)
    {
        return date('F j,Y, g:i,a', strtotime($date));
    }
    
    public function textShorten($body,$limit = 400)
    {
        $body = $body." ";
        $body = substr($body, 0, $limit);
        $body = $body. "....";
        return $body;
    }
}
?>
