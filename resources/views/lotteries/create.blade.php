@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create <strong>lottery</strong> or <strong>raffle</strong></div>

    <div class="card-body">
        {{-- @include('partials.errors') --}}

        <form action="{{ route('lotteries.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Lottery or raffle name" autofocus>
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Describe this lottery or raffle here..."></textarea>
                
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="" selected>not selected</option>
                    <option value="raffle">Raffle</option>
                    <option value="lottery">Lottery</option>
                </select>
                
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <button class="btn btn-success">
                    Add Lottery or Raffle
                </button>
            </div>        
        </form>

    </div>
</div>   

@endsection