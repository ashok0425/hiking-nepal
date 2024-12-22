<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSection;
use Illuminate\Http\Request;

class HomeFAQController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.home-faqs.edit', 'home_faqa');
    }

    public function edit()
    {
        $pageSection = PageSection::where('key', 'home_faqs')->first();

        return view('admin.home-faqs.edit', compact('pageSection'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'value' => 'required|string'
        ]);

        PageSection::updateOrCreate(
            ['key' => 'home_faqs'],
            ['value' => $validated['value']]
        );

        return redirect()->route('admin.home-faqs.edit', 'home_faqs')->with('success', 'Home FAQ updated successfully!');
    }
}
