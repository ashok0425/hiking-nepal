<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;

class PartnerLogoController extends Controller
{
    public function index(Request $request)
    {
        $query = PartnerLogo::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $partnerLogos = $query->orderBy('sort_order')->get();

        return view('admin.partner-logos.index', compact('partnerLogos'));
    }

    public function create()
    {
        return view('admin.partner-logos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partner_logos', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        PartnerLogo::create($validated);

        return redirect()->route('admin.partner-logos.index')
            ->with('success', 'Partner logo created successfully');
    }

    public function edit(PartnerLogo $partnerLogo)
    {
        return view('admin.partner-logos.edit', compact('partnerLogo'));
    }

    public function update(Request $request, PartnerLogo $partnerLogo)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'nullable|image|max:2048',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partner_logos', 'public');
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        $partnerLogo->update($validated);

        return redirect()->route('admin.partner-logos.index')
            ->with('success', 'Partner logo updated successfully');
    }

    public function destroy(PartnerLogo $partnerLogo)
    {
        $partnerLogo->delete();

        return redirect()->route('admin.partner-logos.index')
            ->with('success', 'Partner logo deleted successfully');
    }
}
