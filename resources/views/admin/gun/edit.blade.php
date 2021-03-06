@extends('layouts.admin')

@section('title','銃編集画面')

@section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                 <h2 style="text-align:center;" class="blink">【銃】編集画面</h2>
                 <form action="{{ action('Admin\GunController@update') }}" method="post" enctype="multipart/form-data">
                     @if(count($errors) > 0 )
                         <ul>
                             @foreach( $errors->all() as $e)
                                 <li>{{ $e }}</li>
                             @endforeach
                         </ul>
                     @endif
                     <div class="form-group row">
                         <label class="col-md-2" for="gunName">銃名</label>
                         <div class="col-md-10">
                             <input type="text" class="form-control" name="gunName" value="{{ $gun_form->gunName }}">
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-md-2" for="body">説明文</label>
                         <div class="col-md-10">
                             <textarea class="form-control" name="body" rows="25">{{ $gun_form->body }}</textarea>
                         </div>
                     </div>
                     <div class="form-group row">
                         <label class="col-md-2" for="image">画像</label>
                         <div class="col-md-10">
                             <input type="file" class="form-control-file" name="image">
                             <div class="form-text text-info">
                                 設定中: {{ $gun_form->image_path }}
                             </div>
                             <div class="form-check">
                                 <label class="form-check-label">
                                     <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                 </label>
                             </div>
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-md-10">
                             <input type="hidden" name="id" value="{{ $gun_form->id }}">
                             {{ csrf_field() }}
                             <input type="submit" class="btn btn-primary" value="更新">
                         </div>
                     </div>
                 </form>
                 <div>
                     <a href="." class="index">一覧へ</a>
                 </div>
             </div>
         </div>
     </div>
@endsection