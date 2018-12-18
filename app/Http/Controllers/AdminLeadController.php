<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::get();

        return view('admin.leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::findOrFail($id);

        return view('admin.leads.show', ['lead' => $lead]);
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:10',
            'postal_code' => 'required|min:5|max:15',
        ]);

        $lead = Lead::findOrFail($id);
        $leadPhone = LeadPhone::findOrFail($lead->phone->id);

        DB::transaction(function () use ($lead, $leadPhone, $validatedData) {
            $lead->name = $validatedData['name'];
            $lead->email = $validatedData['email'];
            $lead->postal_code = $validatedData['postal_code'];
            $lead->save();

            $leadPhone->phone = $validatedData['phone'];
            $leadPhone->save();
        });

        $request->session()->flash('lead-updated', true);

        return redirect()->route('leads.show', ['id' => $lead->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect()->route('leads.index');
    }
}
