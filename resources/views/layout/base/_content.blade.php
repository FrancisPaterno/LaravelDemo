{{-- Content --}}
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if (config('layout.content.extended'))
@yield('content')
@else
<div class="d-flex flex-column-fluid">
    <div class="{{ Metronic::printClasses('content-container', false) }}">
        @yield('content')
    </div>
</div>
@endif