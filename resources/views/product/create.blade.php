@extends('base')

@section('page_title', $page)

@section('content')
<div class="container">
    <h1 style="margin: 20px 0;">{{ $page }}</h1>

    <div class="row">

        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{ route('product.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['title'] }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('products') }}" class="btn btn-primary">Return</a>
            </form>
        </div>
        <div class="col-md-6 offset-md-6">

        </div>
    </div>
</div>
@endsection
