@extends('app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Route') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('route_store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" maxlength="200" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="crag" class="col-md-4 col-form-label text-md-end">{{ __('Crag') }}</label>

                            <div class="col-md-6">
                                <select id="crag_id" class="form-control @error('crag_id') is-invalid @enderror" name="crag_id">
                                    
                                    @foreach($crags as $crag)
                                        <option value="{{ $crag->id }}">{{ $crag->name }}</option>
                                    @endforeach
                                </select>

                                @error('crag_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="grade" class="col-md-4 col-form-label text-md-end">{{ __('Grade') }}</label>

                            <div class="col-md-6">
                                <input id="grade" type="text" maxlength="3" class="form-control @error('grade') is-invalid @enderror" name="grade" required autocomplete="grade" autofocus>

                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection