<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $page }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>
<body class="antialiased">
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h1 style="margin: 20px 0;">{{ $page }}</h1>
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
</body>
</html>
