<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;


class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all policies
        return Policy::all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create new policy
        $request->validate([
            'name' => 'required',
            'type' => 'required',

        ]);

        return Policy::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get policy by policy id
        return Policy::find($id);
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
        //Update Policy
        $policy = Policy::find($id);
        $policy->update($request->all());
        return $policy;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete a policy
        return Policy::destroy($id);
    }

    //Get policies by leads
    public function policiesByLead($leadId)
    {
        return Policy::where('lead_id', '=', $leadId)->get();
    }
}
