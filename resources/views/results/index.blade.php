@extends('layouts.app')

@section('title')
    | Results
@endsection

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('results.create') }}" class="btn btn-success">Add Result</a>
</div>

<div class="card">
<div class="card-header">Results</div>

    <div class="card-body">
        @if ($results->count())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Series</th>
                        <th scope="col">Lottery</th>
                        <th scope="col">Time</th>
                        <th scope="col">Published At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->number }}</td>
                            <td>{{ $result->series }}</td>
                            <td>{{ $result->lottery }}</td>
                            <td>{{ $result->time }}</td>
                            <td>{{ $result->published_at }}</td>
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