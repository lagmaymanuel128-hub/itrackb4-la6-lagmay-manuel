@extends('layouts.app')

@section('title', $origin ? 'Dishes from ' . $origin : 'All Dishes')

@section('content')
    @if ($origin)
        <p>Showing dishes from: {{ $origin }}</p>
    @else
        <p>Showing all dishes</p>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Dish</th>
                <th>Main Ingredient</th>
                <th>Origin</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dishes as $id => $dish)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('dishes.show', $id) }}">{{ $dish['name'] }}</a></td>
                    <td>{{ $dish['main_ingredient'] }}</td>
                    <td>{{ $dish['origin'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No dishes found for this origin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('dishes.index') }}" class="btn btn-primary">Back to list</a>
@endsection