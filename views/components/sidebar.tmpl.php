                <div class=" col-2">
                    <h3>Hot post</h3>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                           <? foreach ($posts as $post): ?>
                             <a href="#"class="list-group-item"><?=$post['title']?></a> 
                             <? endforeach;?>                           
                        </ul>
                    </div>
                </div>
