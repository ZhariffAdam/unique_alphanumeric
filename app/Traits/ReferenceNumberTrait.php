<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait ReferenceNumberTrait
{
    public function generate()
    {
        $unique = false;
        $random = null;
        $previousList = [];

        while(!$unique) {
            $random = Str::random(7);

            if (in_array($random, $previousList)) { continue; }

            $validator = Validator::make([
                'reference_number'    =>  $random
            ], [
                'reference_number' => 'unique:reference_numbers,name'
            ]);

            if ($validator->fails()) {
                $previousList[] = $random;
                $unique = false;
            } else {
                $unique = true;
            }
        }

        return $random;
    }
}
