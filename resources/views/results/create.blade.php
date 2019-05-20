@extends('layouts.app')

@section('title')
    | Create Result
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Create Result</div>
        <div class="card-body">
        <form action="{{ route('results.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="number">Number</label>
                <input type="text" name="number" id="number" class="form-control @error('number') is-invalid @enderror" placeholder="Number" value="{{ old('number') }}" autofocus>
                
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="series">Series</label>
                <input type="text" name="series" id="series" class="form-control @error('series') is-invalid @enderror" placeholder="series" value="{{ old('series') }}">
                
                @error('series')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="time_id">Time</label>
                <select name="time_id" id="time_id" class="form-control @error('time_id') is-invalid @enderror">
                    <option value="" selected>Not selected</option>
                    @foreach ($times as $time)
                        <option value="{{ $time->id }}">
                            {{ $time->alias }}
                        </option>                        
                    @endforeach
                    <option value="lottery" {{-- old('time_id') == 'lottery' ? 'selected' : ''--}}>Option 1</option>
                </select>
                
                @error('time_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="lottery_id">Lottery</label>
                <select name="lottery_id" id="lottery_id" class="form-control @error('lottery_id') is-invalid @enderror">
                    <option value="" selected>Not selected</option>
                    @foreach ($lotteries as $lottery)
                        <option value="{{ $lottery->id }}">
                            {{ $lottery->name }}
                        </option>                        
                    @endforeach
                    <option value="lottery" {{-- old('type') == 'lottery' ? 'selected' : ''--}}>Option 1</option>
                </select>
                
                @error('lottery_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="published_at">Published At</label>
                <input type="text" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" placeholder="Published at" value="{{ old('published_at') }}">
                
                @error('published_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
    
            <div class="form-group">
                <button class="btn btn-success">
                    Add Result
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