@extends('base')

@section('page_title', __('items.prod_index'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 style="margin: 20px 0;">{{ __('items.prod_index') }}</h1>
            </div>
            <div class="col-md-8">
                <a href="{{ route('product.create') }}" style="margin: 30px 0;" class="btn btn-primary">Add new
                    product</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ( $products as $product )

                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{ isset($product->category) ? $product->category->title : 'No category' }}</td>
                            <td>
                                <a href="{{ route('product.show', [$product->id]) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-primary">&nbsp;Edit&nbsp;&nbsp;</a>
                                <a href="{{ route('product.delete', [$product->id]) }}" class="btn btn-danger"
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach</tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
