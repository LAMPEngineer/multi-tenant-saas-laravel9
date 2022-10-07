<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Individual;
use App\Models\Entity;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$applicants = Individual::all();
        $applicants =Individual::leftJoin('entities', 'individuals.id', '=', 'entities.individual_id')
        ->select('individuals.*', 'entities.number_of_employees', 'entities.industry')
        ->get(); 
        
        return view ('applicants.index')->with('applicants', $applicants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $individual = Individual::create($input);

        if(!empty($individual->id)){
            $lastInsertID = $individual->id;
        }

        if(!empty($request->input('number_of_employees'))){
           
            $entity = Entity::create([
                'number_of_employees' => $request->input('number_of_employees'),
                'industry' => $request->input('industry'),
                'individual_id' => $lastInsertID,
            ]);
        }

        return redirect('applicant')
        ->with('status', 'Record has been generated')
        ->with('json_str', $this->generateJson($request));
    }

    /*
     * To convert model to JSON
     */
    protected function convertModelToJson(Collection $collection): string
    {
        $data = $collection;
        if(!empty($collection['number_of_employees'])){

        }
        return $json_string;
    }

    /*
     * To generate JSON
     */
    protected function generateJson(Request $request): string
    {

        $json_string = '{"basic": {
                            "name" : "' . $request->input('name') . '",
                            "email": "' . $request->input('email') . '",
                    "tax_id_number": "' . $request->input('tax_id_number') .  '",
                            "phone": "' . $request->input('phone') .'"
                            }';

        if(!empty($request->input('number_of_employees'))){

            $json_string .= ',
                            "entity": {
                                "number_of_employees": "' . $request->input('number_of_employees') .'",
                                "industry": "'. $request->input('industry') .'"
                                    }';
            }
                        
                
        if($request->input('country') != 'usa'){
                $json_string .= ',
                                "foreign": {
                                    "country": "' . $request->input('country') .'"
                                }';
            }

        $json_string .= '}';


        return $json_string;                        
                    
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $individual = Individual::find($id);

        return $individual->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
