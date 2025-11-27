<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use App\Models\Network;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $computers = Computer::with('network')->get();

        return view('computers.index', compact('computers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $networks = Network::all();

        return view('computers.create', compact('networks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'serial_number' => 'required|string|unique:computers',
            'model' => 'required|string',
            'brand' => 'required|string',
            'commissioned_at' => 'required|date',
            'network_id' => 'required|exists:networks,id',
        ]);

        Computer::create($validated);

        return redirect()->route('computers.index')->with('success', __('Computer created successfully.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer): View
    {
        /** @phpstan-ignore argument.type */
        return view('computers.show', compact('computer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer): View
    {
        $networks = Network::all();

        return view('computers.edit', compact('computer', 'networks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer): RedirectResponse
    {
        $validated = $request->validate([
            'serial_number' => 'required|string|unique:computers,serial_number,'.$computer->id,
            'model' => 'required|string',
            'brand' => 'required|string',
            'commissioned_at' => 'required|date',
            'network_id' => 'required|exists:networks,id',
        ]);

        $computer->update($validated);

        return redirect()->route('computers.index')->with('success', __('Computer updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer): RedirectResponse
    {
        $computer->delete();

        return redirect()->route('computers.index')->with('success', __('Computer deleted successfully.'));
    }
}
