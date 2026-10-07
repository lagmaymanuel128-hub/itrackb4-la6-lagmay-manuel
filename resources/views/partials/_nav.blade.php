<nav class="nav bg-light px-3">
    <a class="nav-link" href="{{ route('dishes.index') }}">All Dishes</a>
    <a class="nav-link" href="{{ route('dishes.featured') }}">Featured</a>
    <a class="nav-link" href="{{ route('dishes.filter', 'Camarines Sur') }}">Camarines Sur</a>
    <a class="nav-link" href="{{ route('dishes.show', 1) }}">Bicol Express</a>
</nav>