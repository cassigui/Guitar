<?php

namespace App\Modules\Brands;

use Symfony\Component\HttpKernel\Exception\HttpException;

class BrandException extends HttpException
{
    public function __construct(int $statusCode, string $message = null)
    {
        parent::__construct($statusCode, $message);
    }
}
