<?php   foreach ($posts as $post)    {  ?>
                    <div class="col">
                        <div class="card">
                            <form action="/posts/update" method="post" id="update_form">
                                <div class="card-header bg-transparent border-warning">
                                    <input type="text" id="update_title" name="title" value="<?=$post['title']?>">
                                </div>
                                <div class="card-body">
                                    <textarea name="description" id="update_desc" ><?=$post['description']?></textarea>
                                </div>
                            <div class="card-footer bg-transparent border-warning d-grid gap-2 d-md-flex justify-content-md-end">
                                        <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Update">
                            </form>    
                                <form action="/posts/delete" method="post" id="delete">
                                        <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Delete">
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
<?php   }                               ?>