<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadPhone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function page()
    {        
        return view('leads.page');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|min:10',
            'postal_code' => 'required|min:5|max:15',
        ]);

        DB::transaction(function () use ($request) {
            $lead = Lead::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'postal_code' => $request->input('postal_code'),
            ]);

            $lead->phone()->create([
                'phone' => $request->input('phone'),
            ]);
        });

        return view('leads.success');
    }
}
