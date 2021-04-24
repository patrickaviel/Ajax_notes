<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#get_all_button').click(function(){
          $.get('/posts/index_json', function(res) {
            var htmlStr = "";
            for(var i = 0; i < res['posts'].length; i++) {
              htmlStr += "<div class='quote'>";
              htmlStr += "<h1>" + res.posts[i].description + "</h1>";
              htmlStr += "</div>";
            
            }
            console.log(res);
            $('#quotes').html(htmlStr);
          }, 'json');
        });
      });
    </script>
</head>
<body>
<!-- Main CONTAINER -->
    <div class="container-fluid">
        <button id="get_all_button"></button>
        <div id="quotes">
        </div>
    </div>
<!-- END Main CONTAINER -->
</body>
</html>