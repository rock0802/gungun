<!DOCTYPE html>
<html>
     <head>
         <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width,initial-scale=1">
         <title>管理ホーム</title>
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
         <script src="https://kit.fontawesome.com/79902dc938.js" crossorigin="anonymous"></script>
     </head>
     <body>
         <header>
             <div class="container">
                 <div class="header-left">
                     <p>ウムプラ</p>
                 </div>
             </div>
         </header>
         <div class="main">
             <div class="container">
                 <div class="top-wrapper">
                     <div class="container">
                         <i class="fas fa-user-secret fa-5x">管理者専用</i>
                     </div>
                 </div>
                 <div class="masters">
                     <div class="master">
                         <div class="master-icon">
                             <span class="fa-stack my-big">
                                 <span class="fas fa-archive  fa-stack-2x"></span>
                                 <a href="/" class="fa fa-stack-1x">MOVIES</a>
                             </span>
                         </div>
                     </div>
                     <div class="master">
                          <div class="master-icon">
                             <span class="fa-stack my-big">
                                 <span class="fas fa-archive  fa-stack-2x"></span>
                                 <a href="/" class="fa fa-stack-1x">GUNS</a>
                             </span>
                         </div>
                     </div>
                 </div>
                 
             </div>
         </div>
         <footer>
             
         </footer>
     </body>
</html>