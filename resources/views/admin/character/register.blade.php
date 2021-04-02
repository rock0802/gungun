@extends('layouts.admin')

@section('title','キャラクター⇄銃　リレーション')

@section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto" >
                 <h1 style="text-align:center; color: red;">{{ $character->character_name }}</h1>
                 <h2 style="text-align:center;" class="blink">【キャラクター】⇄【銃】　リレーション登録</h2>
                 <form action="{{ action('Admin\MovieController@store') }}" method="post" enctype="multipart/form-data">
                     @if(count($errors) > 0 )
                         <ul>
                             @foreach( $errors->all() as $e )
                                 <li>{{ $e }}</li>
                             @endforeach
                         </ul>
                     @endif
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【1】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【2】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【3】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【4】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【5】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【6】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【7】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【8】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【9】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="gun-form-group" style="text-align:center">
                         <label class="">銃・登録【10】</label>
                         <div class="">
                             <select name="gun_id[]">
                                 <option value="">銃を選択してください</option>
                                 @foreach( $guns as $gun)
                                     <option value="{{ $gun->id }}">{{ $gun->gunName }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                     <div class="form-group row">
                         <div class="col-md-10">
                             <input type="hidden" name="character_id" value="{{ $character->id }}">
                             {{ csrf_field() }}
                             <input type="submit" class="btn  btn-primary" value="更新">
                         </div>
                     </div>
                 </form>
                 <div>
                     <a href="../movie" class="index">一覧へ</a>
                 </div>
             </div>
         </div>
     </div>
@endsection