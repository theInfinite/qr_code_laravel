<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //


//    public function saveGuestDetails(Request $request)
//    {
//        $packageModel = new Guest();
//        $data['guest_name'] = stripslashes(trim($request->input('guest_name')));
//        $data['created_at'] = date("Y-m-d H:i:s");
//        $packageModel->saveGuestDetail($data);
//        return view('index');
//    }

    public function saveGuestDetail(Request $request){

        $data = $request->all();
        $model  = new Guest();
        $response = $model->saveGuestDetail($data);
        return redirect('/');
    }

    function sendResponse($responseData){
        $response = new \stdClass();
        if($responseData['statusCode'] == 200){
            $response->result = $responseData['result'];
            if(isset($responseData['paginate'])){
                $response->paginate = $responseData['paginate'];
            }
            $response->message = $responseData['message'];
            $response->messageType = 'success';
            $response->messageTitle = 'Success..!';
            $response->response = $responseData['statusCode'];

            return response()->json($response, 200);
        }

        $response->message = $responseData['message'];
        $response->messageType = 'warning';
        $response->messageTitle = 'Error..!';
        $response->response = $responseData['statusCode'];

        return response()->json($response, 200);
    }

    function errorResponse($message=null, $errorCode=null){
        $response = new \stdClass();
        $response->message = $message;
        $response->messageType = 'warning';
        $response->messageTitle = 'Error..!';
        $response->response = $errorCode;

        return response()->json($response, 200);
    }
}
