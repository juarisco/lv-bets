@extends('frontend.layouts.main')

@section('title')
    Index Frontend
@endsection 

@section('content')
    <p><small>{{ $resultsTotal->count() .' '. Str::plural('result', $resultsTotal->count()) }}.</small></p>

    @if ($resultsLottery->isNotEmpty())
        <div class="section-result">
            <h3 class="pb-2 mb-2 border-bottom section-result-title">
                Resultados de la Lotería
            </h3>
            <p><small>{{ $resultsLottery->count() .' '. Str::plural('result', $resultsLottery->count()) }} here.</small></p>
            
            <div class="row">
                @foreach ($resultsLottery as $lottery)

                    <div class="col-md-6">
                        <h3 class="mb-0">{{ Str::title($lottery->lottery->name) }}</h3>
                        {{-- <div class="mb-1 text-muted">{{ $lottery->published_at->toFormattedDateString() }}</div> --}}
                        <div class="section-result-meta">{{ $lottery->published_at->toFormattedDateString() }}</div>
                        <strong class="d-inline-block section-result-number text-primary">{{ $lottery->number }}</strong>
                        <strong class="ml-1 text-success">{{ $lottery->series }}</strong>
                    </div>

                @endforeach
            </div><!-- /.row -->
        </div>
    @endif
    
    @if ($resultsRaffle->isNotEmpty())
        <div class="section-result">
            <h3 class="pb-2 mb-2 border-bottom section-result-title">
                Resultados de los Sorteos
            </h3>
            <p><small>{{ $resultsRaffle->count() .' '. Str::plural('result', $resultsRaffle->count()) }} here.</small></p>
            
            <div class="row">
                @foreach ($resultsRaffle as $lottery)

                    <div class="col-md-6">
                        <h3 class="mb-0">{{ Str::title($lottery->lottery->name) . ' ' . ucfirst($lottery->time->alias) }}</h3>
                        <div class="section-result-meta">{{ $lottery->published_at->toFormattedDateString() }}</div>
                        <strong class="d-inline-block section-result-number text-primary">{{ $lottery->number }}</strong>
                    </div>

                @endforeach
            </div><!-- /.row -->
        </div>
    @endif

@endsection