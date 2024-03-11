<section class="navbar-header">
    <div class="navigation">
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route(View::yieldContent('title')) }}">{{ ucwords(View::yieldContent('title')) }}</a></li>
            @if (!empty(View::yieldContent('sub-title')))
            <li>{{ ucwords(View::yieldContent('sub-title')) }}</li>
            @endif
        </ol>
        <a href="{{ url()->previous() }}" class="nav-link text-decoration-none  btn color-secondary">
            <i class="fa-solid fa-caret-left"></i>
            back
        </a>
    </div>
    <h2>
        {{ ucwords(View::yieldContent('title')) }}
    </h2>
</section>
<br>