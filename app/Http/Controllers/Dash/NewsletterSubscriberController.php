<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscriber::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('email', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $subscribers = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.newsletter-subscribers.index', compact('subscribers'));
    }

    public function create()
    {
        return view('admin.newsletter-subscribers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
            'first_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'status' => 'required|in:subscribed,unsubscribed,inactive,unconfirmed,bounced',
        ]);

        NewsletterSubscriber::create($validated);

        return redirect()->route('admin.newsletter-subscribers.index')
            ->with('success', 'Newsletter Subscriber created successfully');
    }

    public function edit(NewsletterSubscriber $newsletterSubscriber)
    {
        return view('admin.newsletter-subscribers.edit', compact('newsletterSubscriber'));
    }

    public function update(Request $request, NewsletterSubscriber $newsletterSubscriber)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email,'.$newsletterSubscriber->id,
            'first_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'status' => 'required|in:subscribed,unsubscribed,inactive,unconfirmed,bounced',
        ]);

        $newsletterSubscriber->update($validated);

        return redirect()->route('admin.newsletter-subscribers.index')
            ->with('success', 'Newsletter Subscriber updated successfully');
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber)
    {
        $newsletterSubscriber->delete();

        return redirect()->route('admin.newsletter-subscribers.index')
            ->with('success', 'Newsletter Subscriber deleted successfully');
    }
}
