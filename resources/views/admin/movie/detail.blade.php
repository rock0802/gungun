@extends('layouts.admin')

@section('title','映画詳細')

@section('content')
     <div class="container">
         <div  class="row">
             <div class="col-md-8 mx-auto">
                 <h1 style="text-align:center; color: red;">{{ str_limit($movie->title, 100) }}</h1>
             </div>
         </div>
     </div>
     <div>
         <a href="." class="index">一覧へ</a>
     </div>
@endsection