<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use Response;

class CrudController extends Controller
{
    public function getTable(){
        $providers = Provider::all();
        return datatables()->of($providers)
                ->addColumn('action', function ($row) {
                    $html = '<button data-id="' . $row->id . '" class="btn btn-xs btn-info btn-get">Get Image</button> ';
                    $html .= '<button data-id="' . $row->id . '" class="btn btn-xs btn-secondary btn-view">Update</button> ';
                    $html .= '<button data-id="' . $row->id . '" class="btn btn-xs btn-danger btn-delete">Delete</button>';
                    return $html;
                })->toJson();
    }


    public function addProvider(Request $request){
        $formData = $request->all();
        $values = array("provider_name"=>$formData['provider_name'],"provider_url"=>$formData['provider_url']);
        $provider = Provider::create($values);
    }

    public function updateProvider(Request $request){
        $formData = $request->all();
        $formID = $formData['id'];
        $values = array("provider_name"=>$formData['provider_name'],"provider_url"=>$formData['provider_url']);
        $provider = Provider::where(['id' => $formID])->update($values);
    }
    
    public function deleteProvider(Request $request){
        $formData = $request->all();
        $formID = $formData['id'];
        Provider::where(['id' => $formID])->delete();
    }

    public function viewProvider(Request $request){
        $formData = $request->all();
        $formID = $formData['id'];
        $provider = Provider::where(['id' => $formID])->get()->first()->toArray();
        return view("updatemodal")->with(compact("provider"))->render();
    }
}




