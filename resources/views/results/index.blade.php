@extends('layouts.app')

@section('title')
    | @if (request('lottery')) {{ ucfirst($lottery->name) . '\'s' }} @endif Results 
@endsection

@section('content')

<div class="d-flex justify-content-end mb-2">

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add Result
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="{{ url('results/create', ['lottery']) }}">Add Lottery</a>
            <a class="dropdown-item" href="{{ url('results/create', ['raffle']) }}">Add Rafle</a>
        </div>
    </div> 

</div>

<div class="card">
    <div class="card-header">@if (request('lottery')) {{ ucfirst($lottery->name) . '\'s' }} @endif Results</div>

    <div class="card-body">
        @if ($results->count())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">
                            @if (request('lottery'))
                                {{ $lottery->is_lottery ? 'Lottery' : 'Raffle'}}
                            @else
                                Lottery or Raffle
                            @endif
                        </th>

                        <th scope="col">Number</th>

                        {{-- tal vez aquí no pueda usar directamente $lottery pues no existe si viene del contorlador de Ressults--}}
                        @if (!request('lottery') or $lottery->is_lottery)
                            <th scope="col">Series</th>
                        @endif

                        <th scope="col">Published At</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>
                                <a href="{{ route('lottery.results', $result->lottery->slug) }}">
                                    {{ $result->lottery->name }}
                                    @if ($result->lottery->is_raffle)
                                        {{ ucfirst($result->time->alias) }}
                                    @endif
                                </a>
                            </td>

                            <td>{{ $result->number }}</td>

                            @if (!request('lottery') or $result->lottery->is_lottery)
                                <td>
                                    {{ $result->lottery->is_lottery ? $result->series : 'No series' }}
                                </td>
                            @endif

                            <td>{{ $result->published_at->toFormattedDateString() }}</td>
                            
                            <td>
                                <a href="{{ route('results.edit', $result->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete('{{ $result->id }}')">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <div class="pagination justify-content-center">
                {{ $results->links() }}
            </div>
        @else
            <h3 class="text-center">No Results Yet</h3>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteResultForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Result</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure want to delete this Result ? 
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </div>                        
                </form>
            </div>
        </div>         

    </div>
</div>  

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteResultForm')
            form.action ='/results/' + id
            console.log('deleting.', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection