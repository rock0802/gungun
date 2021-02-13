@extends('layouts.admin')

@section('title','映画詳細')

@section('content')
     <div class="container">
         <div class="row">
             <h1>{{ str_limit($movie->title, 100) }}</h1>
         </div>
     </div>
@endsection