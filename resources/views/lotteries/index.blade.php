@extends('layouts.app')

@section('title')
    | Lotteries and Raffles @if(request()->is('trashed-lotteries')) Trashed @endif
@endsection

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('lotteries.create') }}" class="btn btn-success">Add Lottery</a>
</div>

<div class="card">
    <div class="card-header">Lotteries @if(request()->is('trashed-lotteries')) Trashed @endif</div>

    <div class="card-body">
        @if ($lotteries->count())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Results</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lotteries as $lottery)
                        <tr>
                            <td>{{ Str::title($lottery->name) }}</td>
                            <td>{!! $lottery->description !!}</td>
                            <td>{{ Str::title($lottery->type) }}</td>
                            <td>
                                @if (!$lottery->image)
                                    No image
                                @else
                                    <img src="{{ $lottery->image }}" class="img-thumbnail" alt="">
                                @endif
                            </td>
                            <td>{{ $lottery->results->count() }}</td>
                            <td>
                                @if ($lottery->trashed())
                                    <form action="{{ route('restore-lotteries', $lottery->slug) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-info btn-sm">Restore</button> 
                                    </form>
                                @else
                                    <a href="{{ route('lotteries.edit', $lottery->slug) }}" class="btn btn-info btn-sm">Edit</a>
                                @endif
                                <button class="btn btn-danger btn-sm" onclick="handleDelete('{{ $lottery->slug }}')">
                                    {{ $lottery->trashed() ? 'Delete' : 'Trash' }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">No Lotteries Yet</h3>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deleteLotteryForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Lottery</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                Are you sure want to delete this lottery or raffle ? 
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
            var form = document.getElementById('deleteLotteryForm')
            form.action ='/admin/lotteries/' + slug
            console.log('deleting.', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection