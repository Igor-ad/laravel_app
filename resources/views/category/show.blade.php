@extends('base')

@section('page_title', __('items.cat_show'))

@section('content')
<div class="container">
    <h1 style="margin: 20px 0;">{{ __('items.cat_show') }}</h1>

    <div class="row">

        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">

            <div class="card">
                <div class="card-header">
                    {{ $category['title'] }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text">{{ $category['description'] }}</p>
                    <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
                    <a href="{{ route('categories') }}" class="btn btn-primary">Return</a>

                </div>
            </div>

        </div>
        <div class="col-md-6 offset-md-6">

        </div>
    </div>
</div>
@endsection
