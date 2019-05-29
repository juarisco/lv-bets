@extends('layouts.app')

@section('title')
    | Users 
@endsection

@section('content')

<div class="card">
    <div class="card-header">Users</div>

    <div class="card-body">
        @if ($users->count())
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                            </td>

                            <td>{{ $user->name }}</td>
                            
                            <td>{{ $user->email }}</td>

                            <td>
                                @if (!$user->is_admin)
                                    <button class="btn btn-success btn-sm">Make Admin</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h3 class="text-center">No users Yet</h3>
        @endif

    </div>
</div>  

@endsection

@section('scripts')

@endsection