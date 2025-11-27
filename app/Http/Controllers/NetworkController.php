<?php

namespace App\Http\Controllers;

use App\Models\Network;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $networks = Network::all();

        return view('networks.index', compact('networks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('networks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'lan' => 'required|string|max:255',
            'is_out_of_service' => 'boolean',
        ]);

        Network::create($validated);

        return redirect()->route('networks.index')->with('success', __('Network created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Network $network): View
    {
        return view('networks.show', compact('network'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Network $network): View
    {
        return view('networks.edit', compact('network'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Network $network): RedirectResponse
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'lan' => 'required|string|max:255',
            'is_out_of_service' => 'boolean',
        ]);

        // Checkbox handling: if unchecked, it's not in the request, so default to false
        $validated['is_out_of_service'] = $request->has('is_out_of_service');

        $network->update($validated);

        return redirect()->route('networks.index')->with('success', __('Network updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Network $network): RedirectResponse
    {
        $network->delete();

        return redirect()->route('networks.index')->with('success', __('Network deleted successfully.'));
    }
}
