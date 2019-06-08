@extends('frontend.layouts.main')

@section('title')
    {{ Str::title($lottery->name) }}
@endsection 

@section('content')
    
    <div class="section-result">
        <h2 class="result-title-lottery border-bottom">{{ Str::title($lottery->name) }} Results List</h2>
        <div class="result-lottery-meta">{{ $results->count() . ' ' . Str::plural('result', $results->count()) }} here.</div>
        <div class="row">
            @if ($lottery->is_raffle)
                @foreach ($results->take(2) as $result)
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
                    <div class="section-result-meta">{{ $results->first()->published_at->toFormattedDateString() }}</div>
                    <strong class="d-inline-block section-result-number text-primary">{{ $results->first()->number }}</strong>
                    <strong class="ml-1 text-success">{{ $results->first()->series }}</strong>
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

    {{-- {{ $discussions->appends(['channel'=>request()->query('channel')])->links() }} --}}
    {{ $results->links() }}

    <nav class="blog-pagination" aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>    

    {{-- <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
    </nav> --}}

@endsection