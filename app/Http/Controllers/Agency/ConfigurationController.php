<?php

namespace App\Http\Controllers\Agency;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configs = Configuration::all();
        return view('agency.configuration', compact('configs'));
    }

    public function update(Request $request)
    {
        // Validate request input
        $data = $request->validate([
            'settings' => 'array',
            'settings.*' => 'nullable|string',
        ]);

        // Save each setting key-value pair
        foreach ($data['settings'] as $key => $value) {
            Configuration::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

}
