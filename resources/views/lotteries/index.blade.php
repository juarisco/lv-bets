@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('lotteries.create') }}" class="btn btn-success">Add Lottery</a>
</div>

<div class="card">
    <div class="card-header">Lotteries</div>

    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Image</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lotteries as $lottery)
                    <tr>
                        <td>{{ $lottery->name }}</td>
                        <td>{{ $lottery->description }}</td>
                        <td>{{ $lottery->type }}</td>
                        {{-- <td>{{ $lottery->image ?? 'No image' }}</td> --}}
                        <td>
                            <img src="{{ Storage::url($lottery->image) }}" alt="" width="60px" height="60px">
                            {{-- <img src="{{ Storage::url($lottery->image) }}" alt=""> --}}
                        </td>
                        <td>
                            <a href="{{ route('lotteries.edit', $lottery->slug) }}" class="btn btn-info btn-sm ml-2">Edit</a>
                            <a href="" class="btn btn-danger btn-sm">Trash</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</div>   

@endsection