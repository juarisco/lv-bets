@extends('layouts.app')

@section('title')
    | Edit Result {{ ucfirst(request('type')) }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Edit Result {{ ucfirst(request('type')) }}</div>
        <div class="card-body">
        <form action="{{ route('results.update', $result->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="lottery_id">Lottery</label>
                <select name="lottery_id" id="lottery_id" class="form-control @error('lottery_id') is-invalid @enderror">
                    <option value="" selected>Not selected</option>
                    @foreach ($lotteries as $lottery)
                        <option value="{{ $lottery->id }}" {{ old('lottery_id', $result->lottery_id) == $lottery->id ? 'selected' : '' }}>
                            {{ $lottery->name }}
                        </option>                        
                    @endforeach
                </select>
                
                @error('lottery_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if ($result->lottery->type == 'raffle')
                <div class="form-group">
                    <label for="time_id">Time</label>
                    <select name="time_id" id="time_id" class="form-control @error('time_id') is-invalid @enderror">
                        <option value="" selected>Not selected</option>
                        @foreach ($times as $time)
                            <option value="{{ $time->id }}" {{ old('time_id', $result->time_id) == $time->id ? 'selected' : '' }}>
                                {{ $time->alias }}
                            </option>                        
                        @endforeach
                    </select>
                    
                    @error('time_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endif

            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" name="number" id="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number', $result->number ) }}">
                
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if ($result->lottery->type == 'lottery')
                <div class="form-group">
                    <label for="series">Series</label>
                    <input type="text" name="series" id="series" class="form-control @error('series') is-invalid @enderror" value="{{ old('series', $result->series) }}">
                    
                    @error('series')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endif

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at', $result->published_at) }}">
                
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
    
            <div class="form-group">
                <button class="btn btn-success">
                    Edit Result
                </button>
            </div>        
        </form>            
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at', {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection