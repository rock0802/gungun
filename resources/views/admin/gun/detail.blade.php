@extends('layouts.admin')

@section('title','銃詳細')

@section('content')
     <script src="{{ mix('js/hoge.js') }}"></script>
     <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto" style="text-align:center; color: red;">
                 <h1>{{ $gun->gunName }}</h1>
                 <div class="image">
                     @if ($gun->image_path)
                     <img src="{{ $gun->image_path }}" style="text-align:center;">
                     @endif
                 </div>
                 <div class="gunBody">
                     <h4 style="text-align:center; color: white;">〜説明〜</h4>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="nextReadBox" id="area01">
                 <input type="checkbox" id="ck01" onclick="docOpen('01')">
                 <label for="ck01"></label>
                 <div id="doc01">
                     <p class="gunBody">{{ $gun->body }}</p>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="list-characters col-md-12 mx-auto">
                 <table class="table table-dark">
                     <thead>
                         <tr>
                             <th width="30%">作品名</th>
                             <th width="70%">使用キャラクター</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($movies as $movie)
                             <tr>
                                 <td>
                                     {{optional($movie)->title}}
                                 </td>
                                 <td>
                                     @foreach($characters as $character)
                                         【　{{$character->character_name}}　】
                                     @endforeach
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
@endsection