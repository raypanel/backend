<?php


namespace App\DataTransfers;

use Spatie\LaravelData\Data;

class ClientData extends Data
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $phone;

    /**
     * @var string|null
     */
    public ?string $uuid;
}
