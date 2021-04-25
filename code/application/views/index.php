<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script>
        $(document).ready(function(){
            $.get('/Posts/index_html', function(res) {
            $('#posts').html(res);
            });
            $('#add_form').submit(function(){
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#posts').html(res);
                });
            return false;
            });
            $(document).on("submit","#delete", function(evt) {
                evt.preventDefault();
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#posts').html(res);
                });
                return false;
            });
            $(document).on("click","#update_form", function(evt) {
                evt.preventDefault();
                console.log( $( this ).serialize() );
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#posts').html(res);
                });
                return false;
            });
            $(document).on("click","#update_title", function(evt) {
                evt.preventDefault();
                console.log( $( this ).serialize() );
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('#posts').html(res);
                });
                return false;
            });
        });
    </script>
    <style>
        #update_title{
            border: none;
        }
        #update_desc{
            border:none;
            resize: none;
            width: 100%;
        }
    </style>
</head>
<body>
<!-- Main CONTAINER -->
    <div class="container-fluid">
        <!-- content container -->
        <div class="container p-2">
            <h1 class="display-4">Notes</h1>
            <a href="/posts/json" class="btn btn-outline-primary m-3">View JSON</a>
            <div class="row row-cols-1 row-cols-md-4 g-3" id="posts">

            </div>
            <!-- container form -->
            <div class="container w-50">
                <form action="/posts/post" method="post" id="add_form">
                    <div><?=$this->session->flashdata('input_errors');?></div>
                    <div class="form-floating my-3">
                        <textarea class="form-control" placeholder="Leave a comment here" name="note" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Enter description here</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Insert title note here</span>
                        <input type="text" name="title" aria-label="First name" class="form-control">
                    </div>
                    <input  class="btn btn-primary my-3" type="submit" value="Add Note">
                </form>
            </div>
            <!-- end container form -->
        </div>
        <!-- end content container -->
    </div>
<!-- END Main CONTAINER -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>