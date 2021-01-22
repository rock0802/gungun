@extends('layouts.admin')

@section('title', '銃詳細登録')

@section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                 <h2 style="text-align:center; color: yellow;">【銃名】【説明文】【画像】登録</h2>
                 <form action="{{action('Admin\GunController@insert')}}" method="post" enctype="multipart/form-data">
                     @if(count($errors) > 0)
                         <ul>
                             @foreach($errors->all() as $e)
                                 <li class="blink">{{ $e }}</li>
                             @endforeach
                         </ul>
                     @endif
                     <div class="form-group row">
                         <label class="col-md-2" for="gunName">銃名</label>
                         <div class="col-md-10">
                             <input type="text" class="form-control" name="gunName" value="{{old('gunName')}}">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-md-2" for="body">説明文</label>
                         <div class="col-md-10">
                             <textarea class="form-control" name="body" rows="15" value="{{old('body')}}"></textarea>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-md-2" for="gunName">画像</label>
                         <div class="col-md-10">
                             <input type="file" class="form-control-file" name="image">
                         </div>
                     </div>
                     {{csrf_field()}}
                     <input type="submit" class="btn btn-primary" value="更新">
                 </form>
             </div>
         </div>
     </div>
@endsection