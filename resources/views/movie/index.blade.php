@extends('layouts.guest')

@section('title','映画一覧')

@section('content')
     <div class="container">
         <div style="text-align:center;">
             <h1 style="color:red;">映画一覧</h1>
         </div>
         <div class="row">
             <div class="col-md 8">
                 <form action="{{ action('MovieController@index') }}" method ="get">
                     <div class="form-group row">
                         <div class="col-md-8" style="padding-left:390px;">
                             <input  type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder='映画名を入力'>
                         </div>
                         <div class="col-md-2">
                             {{ csrf_field() }}
                             <input type="submit" class="btn btn-primary" value="検索">
                         </div>
                     </div>
                 </form>
             </div>
         </div>
         <div class="row">
             <div class="list-movies col-md-12 mx-auto">
                 <div class="row" style="text-align:center;">
                     <table class="table table-dark">
                         <thead>
                             <tr>
                                 <th width="80%">タイトル</th>
                                 <th width="20%">OK?</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($posts as $movie)
                                 <tr>
                                     <td>
                                         {{ str_limit($movie->title, 100) }}
                                     </td>
                                     <td>
                                         <div>
                                             <a href="{{ action('MovieController@detail', ['id' => $movie->id]) }}">OK!!</a>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                     {{ $posts->links() }}
                 </div>
             </div>
         </div>
         <div>
             <a href="../gun" class="index">銃一覧へ</a>
         </div>
     </div>
@endsection