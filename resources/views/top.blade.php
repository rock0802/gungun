<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Movie List</title>
     <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
     <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
     <script src="https://kit.fontawesome.com/79902dc938.js" crossorigin="anonymous"></script>
</head>
<body>
     <div class="header">
         
     </div>
     
     <div class="main">
         <div class="logo">
             <h2>
                映画名で検索＾ー＾
             </h2>
          </div>
         <div class="serch">
             <i class="fas fa-serch"></i>
             <form action="movie_list.php" method="post">
                 <input type="text" name="movie_name"><br>
                 <input type="submit">
             </form>
          </div>
         <div class="button">
          
          </div>
     </div>
     
     <div class="footer">
        
     </div>
     
</body>
</html>