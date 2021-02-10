<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $page }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

</head>
<div class="container">
    <h1 style="margin: 20px 0;">{{ $page }}</h1>

    <div class="row">

        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    {{ $product['title'] . ' - $ ' . $product['price'] }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text">{{ $product['description'] }}</p>
                    <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn-primary">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                    <a href="{{ route('products') }}" class="btn btn-primary">Return</a>

                </div>
            </div>

        </div>
        <div class="col-md-6 offset-md-6">

        </div>
    </div>
</div>
