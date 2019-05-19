@extends('layouts.app')

@section('title')
    | Creating Time
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Create <strong>Time</strong>
    </div>

    <div class="card-body">

        <form action="{{ route('times.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="number_time">Number Time</label>
                <input type="text" name="number_time" id="number_time" class="form-control @error('number_time') is-invalid @enderror" placeholder="Number time" value="{{ old('number_time') }}" autofocus>
                
                @error('number_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="alias">Alias</label>
                <input type="text" name="alias" id="alias" class="form-control @error('alias') is-invalid @enderror" placeholder="Alias" value="{{ old('alias') }}">
                
                @error('alias')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <input id="description" type="hidden" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                <trix-editor input="description" placeholder="Describe this time here..."></trix-editor>
                
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <button class="btn btn-success">
                    Add Time
                </button>
            </div>        
        </form>

    </div>
</div>   

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
@endsection