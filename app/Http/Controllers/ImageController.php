<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ImageController extends Controller
{
    public function getImageFromURL(Request $request){
        $formData = $request->all();
        $formID = $formData['id'];
        $provider = Provider::where(['id' => $formID])->get()->first()->toArray();
        try {
            $clientHTTP = new Client(['verify' => false]);
            $responseHTTP = $clientHTTP->request('GET', $provider['provider_url']);
            $responseArray = json_decode($responseHTTP->getBody()->getContents(), true);
            $imageUrl = "None";
            if(!empty($responseArray)){
                foreach($responseArray as $row){
                    if(filter_var($row, FILTER_VALIDATE_URL)){  //Check if response contains a URL
                       $imageUrl = $row;
                    }
                }
            }
            return $imageUrl;
            
        } catch (GuzzleException $exception) {
            return [
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage()
            ];
        }
    }
}