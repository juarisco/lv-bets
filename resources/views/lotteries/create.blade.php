@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Create <strong>lottery</strong> or <strong>raffle</strong></div>

    <div class="card-body">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Lottery or raffle name" autofocus>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="5" rows="5" class="form-control" placeholder="Describe this lottery or raffle here..."></textarea>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-success">
                Add Lottery or Raffle
            </button>
        </div>        

    </div>
</div>   

@endsection