<?php

namespace App\Modules\Products;

use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductException extends HttpException
{
    public function __construct(int $statusCode, string $message = null)
    {
        parent::__construct($statusCode, $message);
    }
}
