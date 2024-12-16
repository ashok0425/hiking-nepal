 <div class="content-header px-0">
     <h1 class="m-0">{{ isset($title) ? $title : Str::upper(Request::segment(2)) }}</h1>
     <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
             <li class="breadcrumb-item">
                 <a href="{{ route('admin.dashboard') }}">Dashboard</a>
             </li>
             <li class="breadcrumb-item {{ Request::segment(3) ? '' : 'active' }}">
                 @if (Request::segment(3))
                     <a
                         href="{{ route('admin.' . Request::segment(2) . '.index') }}">{{ Str::ucfirst(Request::segment(2)) }}</a>
                 @else
                     {{ Str::ucfirst(Request::segment(2)) }}
                 @endif
             </li>
             @if (Request::segment(3))
                 <li class="breadcrumb-item active" aria-current="page">
                     {{ Str::ucfirst(Request::segment(3)) }}
                 </li>
             @endif
         </ol>
     </nav>
 </div>
