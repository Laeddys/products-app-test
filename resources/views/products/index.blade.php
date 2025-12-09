<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<style>
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
    }
    .pagination li {
        margin: 0 3px;
    }
    .pagination li a, .pagination li span {
        display: block;
        padding: 5px 10px;
        border: 1px solid #ccc;
        text-decoration: none;
        color: #333;
    }
    .pagination li.active span {
        background-color: #333;
        color: #fff;
        border-color: #333;
    }
    .pagination li.disabled span {
        color: #999;
        border-color: #ccc;
    }
</style>
<body>

<h2>Products</h2>

{{-- Add products form --}}
<h3>Add product</h3>
<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <input type="text" name="title" placeholder="Title" value="{{ old('title') }}" required>
    <br><br>

    <textarea name="description" placeholder="Description">{{ old('description') }}</textarea>
    <br><br>

    <button type="submit">Add product</button>
</form>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<hr>

{{-- Search and sorting --}}
<form method="GET" action="{{ route('products.index') }}">
    <input type="text" name="search" placeholder="Search by title" value="{{ request('search') }}">

    <select name="sort">
        <option value="desc" {{ request('sort') === 'desc' ? 'selected' : '' }}>Newest first</option>
        <option value="asc"  {{ request('sort') === 'asc' ? 'selected' : '' }}>Oldest first</option>
    </select>

    <button type="submit">Apply</button>

    <button type="button" onclick="window.location='{{ route('products.index') }}'">Clear</button>
</form>

<br>

{{-- Product Table --}}
<table border="1" cellspacing="0" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Created at</th>
    </tr>

    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->created_at }}</td>
        </tr>
    @endforeach
</table>

<br>
{{ $products->links('pagination::bootstrap-4') }}

</body>
</html>
