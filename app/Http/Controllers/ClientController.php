<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){

     $date['rows'] = Client::all();
     return view('clients.show')->with($date);

    }
    public function store(Request $request)
    {
        
        if($request->ajax())
        {

            $request->validate([
                'name'=>'required|string|max:100',
                'email'=>'required|string|max:100',
                'position'=>'required|string|max:100',
                'mobile'=>'required|string|max:100'
            ]);
            $data = new Client;
            $data ->name = $request->name;
            $data->email = $request->email;
            $data->position = $request->position;
            $data->mobile = $request->mobile;
            $data->save();

            $response['row'] = $data;   
            return view('clients.row')->with($response);
        }
    }
    public function edit($id)
{
    $data = Client::findOrfail($id);
    return response()->json($data);
}

public function update(Request $request)
{
    
    if($request->ajax())
    {

        $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'position'=>'required|string|max:100',
            'mobile'=>'required|string|max:100'
        ]);
        $data = Client::findOrFail($request->id);
        $data ->name = $request->name;
        $data->email = $request->email;
        $data->position = $request->position;
        $data->mobile = $request->mobile;
        $data->save();

        $response['row'] = $data;   
        return view('clients.rowEdit')->with($response);
    }
}

    public function delete($id)
    {
        Client::findOrFail($id)->delete();
        return response()->json(['success'=>'deleted message','id'=>$id]);
    }

}
