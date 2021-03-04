@extends('layouts.admin')

@section('title', '登録済映画タイトル一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2 style="color: red;">映画一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\MovieController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\MovieController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">作品名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
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
                                <th width="10%">ID</th>
                                <th width="80%">タイトル</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $movie)
                                <tr>
                                    <th>{{ $movie->id }}</th>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\MovieController@detail', ['id' => $movie->id]) }}">{{ str_limit($movie->title, 100) }}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\MovieController@edit', ['id' => $movie->id]) }}">編集</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
                <div>
                    <a href="../home" class="index">管理マスタ</a>
                </div>
            </div>
        </div>
    </div>
@endsection