@extends('base')

@section('page_title', __('items.cat_index') )

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 style="margin: 20px 0;">{{ __('items.cat_index') }}</h1>
        </div>
        <div class="col-md-8">
            <a href="{{ route('category.create') }}" style="margin: 30px 0;" class="btn btn-primary">Add new category</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Create</th>
                        <th scope="col">Update</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ( $categories as $category )    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->title}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>{{$category->updated_at}}</td>
                    <td>
                        <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-primary">Show</a>
                        <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary">&nbsp;Edit&nbsp;&nbsp;</a>
                        <a href="{{ route('category.delete', [$category->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                    </tr>
                @endforeach</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
