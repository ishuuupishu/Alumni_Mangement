<?php 

namespace App\Http\Controllers;

use App\Models\Alumni; // Include the Alumni model
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all alumni records and pass them to the view
        $alumni = Alumni::all();
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return a form to create a new alumni record
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumni,email',
            'phone' => 'required|string|max:15',
            'degree' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        // Handle file upload for profile picture
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Create new alumni record
        Alumni::create($validated);

        return redirect()->route('alumni.index')->with('success', 'Alumni added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Display details of a specific alumni
        $alumnus = Alumni::findOrFail($id);
        return view('alumni.show', compact('alumnus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Return a form to edit an existing alumni record
        $alumnus = Alumni::findOrFail($id);
        return view('alumni.edit', compact('alumnus'));
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
        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:alumni,email,' . $id,
            'phone' => 'required|string|max:15',
            'degree' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        // Find the alumni record to update
        $alumnus = Alumni::findOrFail($id);

        // Handle file upload for profile picture
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // Update alumni record
        $alumnus->update($validated);

        return redirect()->route('alumni.index')->with('success', 'Alumni updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find and delete the specified alumni record
        $alumnus = Alumni::findOrFail($id);
        if ($alumnus->profile_picture) {
            // Delete the profile picture from storage
            \Storage::disk('public')->delete($alumnus->profile_picture);
        }
        $alumnus->delete();

        return redirect()->route('alumni.index')->with('success', 'Alumni deleted successfully!');
    }
}
