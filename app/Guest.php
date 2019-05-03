<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    protected $table = 'guests';
    public $timestamps = false;
    protected $fillable = ['guest_name'];

    public function saveGuestDetail($data){

        $returnResponse = array();
        $response = new \stdClass();

        try{

            $latestData = [
                'guest_name' => $data['guest_name'],
                'created_at'=> Carbon::now()->toDateTimeString(),
                'updated_at'=> Carbon::now()->toDateTimeString()
            ];
            $newData =  Guest::create($latestData);

            $returnResponse['statusCode'] = 200;
            $returnResponse['message']    = (!$response) ? 'Something Went Wrong. Please Try Again!' : 'Guest Detail Saved Successfully';
            $returnResponse['result']     = $response;
            return $returnResponse;

        }catch(\Exception $e){

            dd($e->getMessage());

            $returnResponse['statusCode']  = 503;
            $returnResponse['message']     = 'Something went wrong. Please try again!';
            $returnResponse['result']      = '';
            return $returnResponse;
        }
    }

}

