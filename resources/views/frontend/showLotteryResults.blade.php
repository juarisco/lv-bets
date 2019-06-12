@extends('frontend.layouts.main')

@section('title')
    {{ Str::title($lottery->name) }}
@endsection 

@section('content')
    
    <div class="section-result">
        <h2 class="result-title-lottery border-bottom">{{ Str::title($lottery->name) }} Results List</h2>
        <div class="d-flex justify-content-end">
            <form class="form-inline" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="search..." value="{{ request()->query('search') }}" aria-label="search" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    
                </div>
            </form>              
        </div>
        <div class="result-lottery-meta">
            {{ $results->count() . ' ' . Str::plural('result', $results->count()) }} here.
        </div>

        <div class="row">
            @if ($lottery->is_raffle)
                {{-- @foreach ($results->take(2) as $result) --}}
                @foreach ($recentResult as $result)
                    <div class="col-md-6">
                        <h3 class="mb-0">
                            {{ Str::title($result->lottery->name . ' ' . Str::title($result->time->alias)) }}
                        </h3>
                        <div class="section-result-meta">{{ $result->published_at->toFormattedDateString() }}</div>
                        <strong class="d-inline-block section-result-number text-primary">{{ $result->number }}</strong>
                    </div>
                @endforeach
            @else
                <div class="col-md-6">
                    <h3 class="mb-0">{{ Str::title($lottery->name) }}</h3>
                    <div class="section-result-meta">{{ $recentResult->published_at->toFormattedDateString() }}</div>
                    <strong class="d-inline-block section-result-number text-primary">{{ $recentResult->number }}</strong>
                    <strong class="ml-1 text-success">{{ $recentResult->series }}</strong>
                </div>            
            @endif
        </div><!-- /.row -->
        <table class="table">
            <thead>
                <tr class="bg-primary">
                    <th scope="col"></th>
                    <th class="th" scope="col">Number</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>
                            {{ Str::title($result->lottery->name) }}
                            @if ($result->lottery->is_raffle)
                                {{ Str::title($result->time->alias) }}
                            @endif
                        </td>
                        <td>{{ $result->number }}</td>
                        <td>{{ $result->published_at->toFormattedDateString() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div><!-- /.section-result -->

    <div class="row justify-content-center">
        {{ $results->appends(['search' => request()->query('search')])->links() }}
    </div>

@endsection