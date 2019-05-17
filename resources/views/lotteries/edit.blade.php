@extends('layouts.app')

@section('title')
    - Editing {{ ucfirst($lottery->type) }} {{$lottery->name}}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Edit lottery or raffle <strong>{{ ucfirst($lottery->name) }}</strong>
    </div>

    <div class="card-body">

        <form action="{{ route('lotteries.update', $lottery->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $lottery->name) }}">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $lottery->description) }}</textarea>
                
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                    <option value="raffle" {{ old('type', $lottery->type) == 'raffle' ? 'selected' : ''}}>Raffle</option>
                    <option value="lottery" {{ old('type', $lottery->type) == 'lottery' ? 'selected' : ''}}>Lottery</option>
                </select>
                
                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group text-center">
                @if ($lottery->image)
                    <img src="{{ Storage::url($lottery->image) }}" alt="" class="img-thumbnail mx-auto">
                @else
                    No image
                @endif
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
                    Edit Lottery or Raffle
                </button>
            </div>        
        </form>

    </div>
</div>   

@endsection