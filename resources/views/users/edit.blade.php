@extends('layouts.app')

@section('title')
    | Edit User {{ '- ' . Str::title(auth()->user()->name) }}
@endsection

@section('content')

<div class="card">
    <div class="card-header">My Profile - <strong>{{ Str::title(auth()->user()->name) }}</strong></div>

    <div class="card-body">
        <form action="{{ route('users.update-profile', auth()->user()->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', Str::title($user->name) ) }}">
                
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="about">About Me</label>
                <textarea name="about" id="about" cols="5" rows="5" class="form-control @error('about') is-invalid @enderror">{{ old('about', $user->about ) }}</textarea>
                
                @error('about')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update Profile</button>

        </form>
    </div>
</div>  

@endsection
  