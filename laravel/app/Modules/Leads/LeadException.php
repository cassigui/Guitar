<?php

namespace App\Modules\Leads;

use Symfony\Component\HttpKernel\Exception\HttpException;

class LeadException extends HttpException
{
    public function __construct(int $statusCode, string $message = null)
    {
        parent::__construct($statusCode, $message);
    }
}
