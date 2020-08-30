@extends('layouts.appTemplate')

@section('allContent')
        <main class="container my-4">
        
                @if(session()->get('type_user') === 3)
                    <div>
                        <h1 class="display-4 text-center">@yield('title')</h1>
                    </div>
                @endif
                <div>
                    @yield('content')
                </div>
        </main>
@endsection