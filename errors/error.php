<?php

namespace Application\errors\error;

class Exception
{
    private String $message = "Sorry, page not found";
    public function notFound()
    {
        $errorMessage = $this->message;
        require('./template/error.php');
    }
}
