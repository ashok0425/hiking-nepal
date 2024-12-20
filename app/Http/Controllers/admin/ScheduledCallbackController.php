<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduledCallback;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ScheduledCallbackController extends Controller
{
    public function index(Request $request)
    {
        $query = ScheduledCallback::query();

        // Search functionality
        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by status if needed
        if ($request->has('status')) {
            $query->where('status', $request->query('status'));
        }

        $scheduledCallbacks = $query->latest()->paginate(10);

        return view('admin.scheduled-callbacks.index', compact('scheduledCallbacks'));
    }

    public function create()
    {
        return view('admin.scheduled-callbacks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comments' => 'required',
            'callback_date' => 'required|date',
            'callback_time' => 'required|string',
            'status' => ['required', Rule::in(array_keys(ScheduledCallback::getStatuses()))],
        ]);

        ScheduledCallback::create($validated);

        return redirect()->route('admin.scheduled-callbacks.index')
            ->with('success', 'Scheduled Callback created successfully');
    }

    public function edit(ScheduledCallback $scheduledCallback)
    {
        return view('admin.scheduled-callbacks.edit', compact('scheduledCallback'));
    }

    public function update(Request $request, ScheduledCallback $scheduledCallback)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comments' => 'required',
            'callback_date' => 'required|date',
            'callback_time' => 'required|string',
            'status' => ['required', Rule::in(array_keys(ScheduledCallback::getStatuses()))],
            'callback_message' => 'nullable',
        ]);

        $scheduledCallback->update($validated);

        return redirect()->route('admin.scheduled-callbacks.index')
            ->with('success', 'Scheduled Callback updated successfully');
    }

    public function destroy(ScheduledCallback $scheduledCallback)
    {
        $scheduledCallback->delete();

        return redirect()->route('admin.scheduled-callbacks.index')
            ->with('success', 'Scheduled Callback deleted successfully');
    }
}
