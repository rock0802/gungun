@extends('layouts.admin')

@section('title', '映画名＋キャラ登録')

@section('content')
    　<div class="container">
        　<div class="row">
            　<div class="col-md-8 mx-auto">
                　<h2 style="text-align:center; color: teal;">映画タイトルと登場人物を登録</h2>
                　<form action="{{action('Admin\MovieController@insert')}}" method="post"enctype="multipart/form-data">
                　    @if (count($errors) > 0)
                　        <ul>
                　            @foreach($errors->all() as $e)
                                 <li>{{ $e }}</li>
                             @endforeach
                　        </ul>
                　    @endif
                　    <div class="form-group row">
                　        <label class="col-md-2">映画タイトル</label>
                　        <div class="col-md-10">
                　            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター1</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター2</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター3</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター4</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター5</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター6</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    <div class="form-group row">
                　        <label class="col-md-2">キャラクター7</label>
                　        <div class="col-md-10">
                　             <input type="text" class="form-control" name="character_name[]" value="{{ old('character_name') }}">
                　        </div>
                　    </div>
                　    {{ csrf_field() }}
                　    <input type="submit" class="btn btn-primary" value="更新">
                　</form>
        　　　　　</div>
        </div>
    </div>
@endsection
