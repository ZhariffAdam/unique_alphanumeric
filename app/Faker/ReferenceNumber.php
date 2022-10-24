<?php

namespace App\Faker;

use App\Traits\ReferenceNumberTrait;
use \Faker\Provider\ms_MY\Address as OldAddress;

class ReferenceNumber extends OldAddress
{
    use ReferenceNumberTrait;
    public function referenceNumber(): string
    {
        return $this->generate();
    }
}
