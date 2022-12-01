@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>{{ __('Climbing crags') }}</h2>
            </div>
            <div class="col-6">
                <a class="float-roght" href="{{ route('crag_create') }}">
                    <button type="button" class="btn btn-primary">{{ __('Add new crag') }}</button>
                </a>
            </div>
        </div>  
            
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($crags as $crag)
                    <tr>
                        <th scope="row">{{($crags->currentPage() - 1) * $crags->perPage() + $loop->iteration}}</th>
                        <td>{{ $crag->name }}</td>
                        <td>{{ $crag->country }}</td>        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $crags->appends(['routes' => $routes->currentPage()])->links() }}
    </div>
    <br>
    
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>{{ __('Climbing routes') }}</h2>
            </div>
            <div class="col-6">
                <a class="float-roght" href="{{ route('route_create') }}">
                    <button type="button" class="btn btn-primary">{{ __('Add new route') }}</button>
                </a>
            </div>
        </div>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Crag</th>
                    <th scope="col">Grade</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <th scope="row">{{($routes->currentPage() - 1) * $routes->perPage() + $loop->iteration}}</th>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->crag->name }}</td>
                        <td>{{ $route->grade }}</td>
                        <td><button class="btn btn-danger btn-sm delete" data-id="{{ $route->id }}">X</button></td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $routes->appends(['crags' => $crags->currentPage()])->links() }}
    </div>
@endsection

@section('javascript')
$(function() {
    $('.delete').click(function() {
        $.ajax({
            method: "DELETE",
            url: "http://127.0.0.1:8000/route_delete/" + $(this).data("id")
        })
        .done(function(response) {
            window.location.reload();
            alert("The route has been removed");
        })
        .fail(function(response) {
            alert("ERROR");
        });
    });
});
    
@endsection
