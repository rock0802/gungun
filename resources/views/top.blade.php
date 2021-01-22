<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Movie List</title>
     <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
     
</head>
<body>
     <div class="header">
         <a href="admin/home" href="https://www.cman.jp" class="head">管理画面</a>
     </div>
     <div class="main">
         <div class="logo">
             <h1 class="blink">
                映画名を入力してくれ大佐。
             </h1>
          </div>
         <div class="serch">
             <form action="movie_list.php" method="post">
                 <input type="text" name="title">
                 <div class="sample3oya" >
                 <input type="submit" value="OK!" class="button">
                 <span class="sample3">OK?</span>
                 </div>
             </form>
         </div>
     </div>
     <div class="footer">
         
     </div>
</body>
</html>