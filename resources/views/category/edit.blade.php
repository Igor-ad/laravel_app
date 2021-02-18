@extends('base')

@section('page_title', __('items.cat_edit'))

@section('content')
<div class="container">
    <h1 style="margin: 20px 0;">{{ __('items.cat_edit') }}</h1>

    <div class="row">

        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{ route('category.update', $category['id']) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $category['title'] }}">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $category['description'] }}">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('categories') }}" class="btn btn-primary">Return</a>
            </form>
        </div>
        <div class="col-md-6 offset-md-6">

        </div>
    </div>
</div>
@endsection
