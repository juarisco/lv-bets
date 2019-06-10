@extends('layouts.app')

@section('title')
    | Times @if(request()->is('trashed-times')) Trashed @endif
@endsection

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('times.create') }}" class="btn btn-success">Add Time</a>
</div>

<div class="card">
    <div class="card-header">Times @if(request()->is('trashed-times')) Trashed @endif</div>

    <div class="card-body">
        @if ($times->count())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Number Time</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($times as $time)
                        <tr>
                            <td>{{ $time->number_time }}</td>
                            <td>{{ ucfirst($time->alias) }}</td>
                            <td>{!! $time->description !!}</td>
                            <td>
                                @if ($time->trashed())
                                    <form action="{{ route('restore-times', $time->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button> 
                                    </form>
                                @else
                                    <a href="{{ route('times.edit', $time->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                @endif
                                <button class="btn btn-danger btn-sm" onclick="handleDelete('{{ $time->slug }}')">
                                    {{ $time->trashed() ? 'Delete' : 'Trash' }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">No Times Yet</h3>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteTimeForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Time</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure want to delete this Time ? 
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
        function handleDelete(slug) {
            var form = document.getElementById('deleteTimeForm')
            form.action ='/times/' + slug
            console.log('deleting.', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection