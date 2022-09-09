<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Basic;
use App\Models\Entity;


class RealblocksController extends Controller
{
    /**
     * Show a list of all of the applicant.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basic = DB::table('basics')->get();
 
        return view('appliants', ['appliants' => $basic]);
    }
 

    /*
     * To generate record
     */
    public function store(Request $request)
    {

        //$basic = Basic::create($request->all());
        $basic = Basic::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'tax_id_number' => $request->input('tax_id_number'),
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'user_id' => auth()->id(),
        ]);


        if(!empty($request->input('number_of_employees'))){

            $entity = Entity::create([
                'number_of_employees' => $request->input('number_of_employees'),
                'industry' => $request->input('industry'),
                'basic_id' => $basic->id,
            ]);
        }

        return redirect('home')
        ->with('status', 'Record has been generated')
        ->with('json_str', $this->generateJson($request));
    }


    /*
     * To generate JSON
     */
    protected function generateJson(Request $request): string
    {

        $json_string = "{'basic': {
                            'name': '" . $request->input('name') .  "',
                            'email': '" . $request->input('email') . "',
                            'tax_id_number': '" . $request->input('tax_id_number') .  "',
                            'phone': '" . $request->input('phone') ."'
                            }";

        if(!empty($request->input('number_of_employees'))){

            $json_string .= ",
                        'entity': {
                            'number_of_employees':'" . $request->input('number_of_employees') ."',
                            'industry':'". $request->input('industry') ."'
                        }";
        }
                        
                
        if($request->input('country') != 'usa'){
                $json_string .= ",
                            'foreign': {
                                'country':'" . $request->input('country') ."'
                            }";
            }

        $json_string .= "}";


        return $json_string;                        
                    
    }

}
