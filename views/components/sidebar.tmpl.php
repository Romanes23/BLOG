                <div class=" col-2">
                    <h3>Hot post</h3>
                    <div class="card">
                        <ul class="list-group list-group-flush">
                           <? foreach ($posts as $post1): ?>
                              <a href="#"class="list-group-item"><?=$post1['title']?></a> <!-- исправил $post на $post1, иначе 5-й элемент -->
                             <? endforeach;?>                           
                        </ul>
                    </div>
                </div>
