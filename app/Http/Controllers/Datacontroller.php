<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class Datacontroller extends Controller
{
    public function customers(Request $request){
        
        $page = ($request->start + 8) / 8;
        $totalRecord=Customer::select('count(*) as allcount')->count();
        if (!empty($_GET['data_searc_custome'])) {
            # code...
            $id = $_GET['data_searc_custome'];
            $records=Customer::where('name', 'like', '%' .$id . '%')-> paginate(8,['*'],'page',$page);
        }else{
            $id='';
            $records=Customer::orderBy('name','ASC') ->paginate(8,['*'],'page',$page);
        }
        $return=[];
        foreach ($records as $key => $record) {
            $edit=route('customer.edit',$record->id);
            $show=route('customer.detail',$record->id);
            $action='<a href="'.$show.'" class="btn btn-primary btn-sm mx-1">Show</a>';
            $action3='<a href="'.$edit.'"  class="btn btn-success btn-sm mx-1">Edit</a>';
            $action2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$record->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
            $id = $record->id;
            $name = $record->name;
            $address = $record->address;
            $no_tlp = $record->no_tlp;
            $regis_at = $record->regis_at;

            $return[] = array(
                "id" => $id,
                "address" => $address,
                "name" => $name,
                "no_tlp" => $no_tlp,
                'regis_at'=>$regis_at,
                'action' =>$action . $action2 . $action3
            );
         }
        $output['draw'] = $request->draw; 
        $output['recordsTotal'] = $totalRecord;
        $output['recordsFiltered'] = $totalRecord;
        $output['data']=$return;
        // $response['data']=$return;
        echo json_encode($output);
 
    
    }
}
