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
                                <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}" alt="">
                            </td>

                            <td>{{ $user->name }}</td>
                            
                            <td>{{ $user->email }}</td>

                            <td>
                                @if (!$user->is_admin)
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
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