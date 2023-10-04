<?php

namespace Application\errors\error;

class Exception
{
    private String $message = "La page que vous cherchez n'existe pas";
    public function notFound()
    {
        $errorMessage = $this->message;
        require('../template/error.php');
    }
}
