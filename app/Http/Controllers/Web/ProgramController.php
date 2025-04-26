<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        return view('program.index', [
            'programs' => $programs,
            'title' => 'Program',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            Program::create($validatedData);
            return redirect()->route('program.index')->with('success', 'Program created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('program.index')->with('error', 'Failed to create program: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'is_active' => 'boolean',
            ]);

            $program = Program::findOrFail($id);
            $program->update($validatedData);
            return redirect()->route('program.index')->with('success', 'Program updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('program.index')->with('error', 'Failed to update program: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $program = Program::findOrFail($id);
            $program->delete();
            return redirect()->route('program.index')->with('success', 'Program deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('program.index')->with('error', 'Failed to delete program: ' . $e->getMessage());
        }
    }
}