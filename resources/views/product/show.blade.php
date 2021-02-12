@extends('base')

@section('page_title', $page)

@section('content')
<div class="container">
    <h1 style="margin: 20px 0;">{{  $category['title'] . ': ' . $page }}</h1>

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
@endsection
