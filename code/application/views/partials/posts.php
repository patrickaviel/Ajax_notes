<?php   foreach ($posts as $post)    {  ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-header bg-transparent border-warning">
                                <?=$post['title']?>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?=$post['description']?></p>
                            </div>
                            <div class="card-footer bg-transparent border-warning d-grid gap-2 d-md-flex justify-content-md-end">
                                <form action="/posts/delete" method="post" id="delete">
                                        <input type="hidden" name="post_id" value="<?=$post['id']?>">
                                        <input class="btn btn-outline-danger btn-sm" type="submit" value="Delete">
               
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                
<?php   }                               ?>