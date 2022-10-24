<?php

namespace App\Http\Controllers;

use App\Models\ReferenceNumber;
use App\Traits\ReferenceNumberTrait;
use Illuminate\Support\Facades\DB;

class ReferenceNumberController extends Controller
{
    use ReferenceNumberTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * URL: /reference_number/create
     *
     */
    public function create()
    {
        $referenceNumber = $this->generate();
        ReferenceNumber::create(['name'    =>  $referenceNumber]);
        return response()->json($referenceNumber, 200);
    }

    /**
     * URL: /reference_number/create/bulk/100000
     *
     */
    public function createBulk($id) {
        $range = range( 1, $id );
        $chunkSize = 10000;

        foreach( array_chunk( $range, $chunkSize ) as $chunk ){
            // Using Factory (Start)
//            ReferenceNumber::factory(ReferenceNumber::class)->count($chunkSize)->create();
            // Using Factory (End)

            // Using DB insert (Start)
            $referenceNumber = [];
            foreach( $chunk as $i ) {
                $referenceNumber[] = [
                    'name' => $this->generate()
                ];
            }
            DB::disableQueryLog();
            DB::table('reference_numbers')->insert($referenceNumber);
            // Using DB insert (End)
        }
        return 'success';
    }
}
