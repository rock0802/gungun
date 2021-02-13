@extends('layouts.admin')

@section('title','映画の編集')

@section('content')
     <div class="container">
         <div class="row">
             <div class="col-md-8 mx-auto">
                 <h2 style="text-align:center;" class="blink">映画・登場人物の編集</h2>
                 <form action="/admin/movie/edit" method="post" enctype="multipart/form-data">
                     @if(count($errors) > 0)
                         <ul>
                             @foreach($errors->all() as $e)
                                 <li class="blink">{{ $e }}</li>
                             @endforeach
                         </ul>
                     @endif
                      <div class="form-group row">
                           <label class="col-md-2">映画タイトル</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="title" value="{{ $movie->title }}">
                            </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター1</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[0])  {{$characters[0]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[0])  {{$characters[0]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター2</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[1])  {{$characters[1]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[1])  {{$characters[1]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター3</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[2])  {{$characters[2]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[2])  {{$characters[2]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター4</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[3])  {{$characters[3]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[3])  {{$characters[3]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター5</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[4])  {{$characters[4]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[4])  {{$characters[4]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター6</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[5])  {{$characters[5]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[5])  {{$characters[5]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-md-2">キャラクター7</label>
                          <div class="col-md-10">
                              <input type="text" class="form-control" name="character_name[]" value="@isset($characters[6])  {{$characters[6]->character_name}} @endisset">
                              <input type="hidden" class="form-control" name="character_id[]" value="@isset($characters[6])  {{$characters[6]->id}} @endisset">
                          </div>
                      </div>
                      <div class="form-group row">
                          <div class="col-md-10">
                              <input type="hidden" name="id" value="{{ $movie->id }}">
                              
                              {{ csrf_field() }}
                              <input type="submit" class="btn  btn-primary" value="更新">
                          </div>
                          <div>
                              <a href="{{ action('Admin\MovieController@delete', ['id' => $movie->id,]) }}">削除</a>
                          </div>
                      </div>
                 </form>
             </div>
         </div>
     </div>
@endsection