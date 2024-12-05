@extends('layouts.website')

@section('title', 'Hiking Nepal')

@section('content')
    <section class="position-relative overflow-hidden d-flex justify-content-center align-items-center"
        style="height: 330px;">
        <img src="{{ asset('images/head-cover.jpeg') }}" alt="head cover" class="w-100 position-absolute start-0 top-0"
            style="height: 330px; object-fit:cover; filter: brightness(80%) contrast(110%);">
        <div class="container">
            <h1 class="mb-0 z-1 position-relative text-uppercase text-white text-center">TRAVEL BLOGS</h1>
        </div>
    </section>

    <section class="container py-5 my-5">
        <h2 class="text-success text-center mb-4">
            Search Blog
        </h2>

        <form action="" method="GET" class="mb-5">
            <div class="input-group mb-3 border">
                <span class="input-group-text text-primary" id="basic-addon1">
                    <i class="fas fa-search"></i>
                </span>
                <input class="form-control ps-0" type="text" placeholder="Search Blog" required>
            </div>
        </form>

        <div class="row mb-4 gy-3">
            @for ($i = 0; $i < 12; $i++)
                <div class="col-lg-4 col-md-6">
                    <x-blog-card />
                </div>
            @endfor

        </div>

        <nav aria-label="Pagination">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </section>

    @include('inc.book-a-call-cta')
@endsection
