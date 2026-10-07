@extends('layouts.app')

@section('title', $dish['name'])

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $dish['name'] }}</h2>
            <table class="table table-bordered mb-0">
                <tr><th>Main Ingredient</th><td>{{ $dish['main_ingredient'] }}</td></tr>
                <tr><th>Origin</th><td>{{ $dish['origin'] }}</td></tr>
            </table>
        </div>
    </div>

    <a href="{{ route('dishes.index') }}" class="btn btn-primary mt-3">Back to list</a>
@endsection