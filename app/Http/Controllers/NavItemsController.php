<?php

namespace App\Http\Controllers;

use App\Models\NavItems;
use Illuminate\Http\Request;

class NavItemsController extends Controller
{
    public function index()
    {
        $navbarItems = NavItems::with('post')->get();
        return view('dashboard.nav_items.index', [
            'navbarItems' => $navbarItems,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'post_id' => 'required|exists:posts,id',
            'is_dropdown' => 'nullable|boolean',
        ]);

        NavItems::create($validated);

        return response()->json(['message' => 'Navbar item added successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(NavItems $navItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NavItems $navItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NavItems $navItems)
    {
        $validated = $request->validate([
            'name' => 'required',
            'post_id' => 'required|exists:posts,id',
            'is_dropdown' => 'nullable|boolean',
        ]);

        $navItems->update($validated);

        return response()->json(['message' => 'Navbar item updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NavItems $navItems)
    {
        $navItems->delete();
        return response()->json(['message' => 'Navbar item deleted successfully!']);
    }
}
