
<? require_once COMPONENTS."/header.tmpl.php";?>
        <main class="conteiner py-3">
            <div class="row">
<? require_once COMPONENTS."/sidebar.tmpl.php";?>
                <div class="col-10">
                    <h3><?= $header ?? 'TEST' ?></h3>
                    <p><?= $post['content'] ?></p>
                      <!-- ======================= AJAX ============================ -->
                    <div id="rate-container" class="row col-3">                            
                        <button id="up_btn" class="btn btn-link col" data-post-id="<?= $post['post_id'] ?>">Up</button>      
                        <p id="rate_p" class="col" ><?= isset($post['rate']) ? $post['rate'] : "0" ?></p>
                        <button id="down_btn" class="btn btn-link col" data-post-id="<?= $post['post_id'] ?>">Down</button>    
                     </div>


                    <form action="posts/edit" method="GET">
                        <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>">  <!-- передачяа id через скрытое поле input -->
                        <button type="submit" class = "btn btn-primary">Edit</button>
                    </form>
                    <form action="posts" method="POST">
                         <input type="hidden" name="post_id" value= "<?= $post['post_id'] ?>"> 
                         <input type="hidden" name="_method" value= "DELETE">       <!--    передача чз API -->
                        <button type="submit" class = "btn btn-danger">Delite</button>
                    </form>
                   
                </div>
            </div>
        </main>
<? require_once COMPONENTS."/footer.tmpl.php";?>

//
