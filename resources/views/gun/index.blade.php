@extends('layouts.admin')

@section('title', '登録済【銃】一覧')

@section('content')
     <div class="container">
         <div style="text-align:center;">
             <h1 style="color:red;">銃一覧</h1>
         </div>
         <div class="row">
             <div class="col-md 8">
                 <form action="{{ action('GunController@index') }}" method="get">
                     <div class="form-group row">
                         <div class="col-md-8" style="padding-left:390px;">
                             <input  type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder='銃名を入力'>
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
             <div class="guest-gun col-md-12 mx-auto">
                 <div class="row" style="text-align:center;">
                     <table class="table table-dark">
                         <thead>
                             <tr>
                                 <th width="80%">銃名</th>
                                 <th width="20%">操作</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($posts as $gun)
                                 <tr>
                                     <td>
                                         {{ str_limit($gun->gunName, 100) }}
                                     </td>
                                     <td>
                                         <a href="{{ action('GunController@detail', ['id' => $gun->id]) }}">OK!!</a>
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
             <a href="../movie" class="index">映画一覧へ</a>
         </div>
     </div>
@endsection