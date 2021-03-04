@extends('layouts.admin')

@section('title','映画詳細')

@section('content')
     <div class="container">
         <div  class="row">
             <div class="col-md-8 mx-auto">
                 <h1 style="text-align:center; color: red;">{{ str_limit($movie->title, 100) }}</h1>
             </div>
         </div>
         <div class="row">
             <div class="list-characters col-md-12 mx-auto" >
                 <table class="table table-dark" style="text-align:center;">
                     <thead>
                         <tr>
                             <th width="10%">character_id</th>
                             <th width="20%">キャラクター</th>
                             <th width="70%">使用銃</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($characters as $character)
                             <tr>
                                 <td>{{ $character->id }}</td>
                                 <td>
                                     <a href="{{ action('Admin\MovieController@register', ['id' => $character->id]) }}">{{ $character->character_name }}</a>
                                 </td>
                                 <td>
                                     @foreach($character->guns as $gun)
                                     <a href="{{ action('Admin\GunController@detail', ['id' => $gun->id]) }}">【{{$gun->gunName}}】</a>
                                     @endforeach
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
     <div>
         <a href="." class="index">一覧へ</a>
     </div>
@endsection