<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;



class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.index');
    }
    public function create()
    {
        return view('customer.create');
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'no_tlp' => 'required',
        ]);
        Customer::create($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }
    public function show($id)
    {
        $data=Customer::find($id);
        return view('customer.show',compact('data'));
    }
    public function edit($id)
    {
        $data=Customer::find($id);
        return view('customer.edit',compact('data'));
    }

    public function update(Request  $request)
    {
        $data=Customer::find($request->id);
        $data->update($request->all());
        return json_encode(array(
            "statusCode"=>200
        ));
    }

    public function destroy($id)
    {
        $Customer = Customer::find($id);
        $Customer->delete();
        if($Customer){
            return to_route('city.index')->withSuccess("Delete City Successfully !!");
        }else{
            return to_route('city.index')->withDanger("Failed Create New City!!");
        }
    }
}
