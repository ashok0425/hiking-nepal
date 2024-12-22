@extends('admin.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="welcome-section">
        <h2>Welcome back, {{ Auth::user()->name }}! 👋</h2>
        <p class="lead">Manage your hiking adventures and content from this admin dashboard.</p>
    </div>
@endsection
