@extends('layouts.admin')

@section('title','管理ホーム')

@section('content')
     <div class="main">
         <div class="container">
             <div class="top-wrapper">
                 <div class="container">
                      <i class="fas fa-user-secret fa-5x" style="color:teal">管理者専用</i>
                 </div>
             </div>
             <div class="masters">
                 <div class="master">
                     <div class="master-icon">
                         <span class="fa-stack my-big">
                             <span class="fas fa-archive  fa-stack-2x"></span>
                             <a href="movie" class="fa fa-stack-1x" style="color:teal">MOVIES</a>
                         </span>
                     </div>
                 </div>
                 <div class="master">
                     <div class="master-icon">
                         <span class="fa-stack my-big">
                             <span class="fas fa-archive  fa-stack-2x"></span>
                             <a href="gun" class="fa fa-stack-1x" style="color:teal">GUNS</a>
                         </span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection