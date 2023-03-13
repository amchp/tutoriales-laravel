@extends('layouts.app')
@section('title', $viewData['product']->getName().' - Online Store')
@section('subtitle', $viewData['product']->getName().' - Product information')
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
        </h5>
        @if ($viewData["product"]->getPrice() >= 100)
          <p class="card-text red">Price: {{ $viewData["product"]->getPrice() }}</p>
        @else
          <p class="card-text">Price: {{ $viewData["product"]->getPrice() }}</p>
        @endif
        @foreach($viewData["product"]->comments as $comment)
          - {{ $comment->getDescription() }}<br />
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection
