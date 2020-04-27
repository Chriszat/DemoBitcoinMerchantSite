<div class="row">
    <div class="col-md-10 col-12  order-2">
        <div id="accordion" class="collapse-icon accordion-icon-rotate left">
           <div class="card">
               <div class="card-body text-center">
                   <h4 style="color:gray">Click to load content</h4>
                   <div>
                       <img src="81744546ec70b93f065c7321407215727ea39750f52b909dcb/content.png" alt="">
                   </div>
               </div>
           </div>
        </div>
    </div>
    <div class="col-md-2 col-12 order-1">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php $i = 0;
            foreach ($object_list as $topic) : $i++; ?>
                <a class="nav-link <?php if ($i == 1) : echo 'active';
                                    endif; ?> show" id="v-pills-home-tab" data-toggle="pill" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="loadQuestions(<?php echo $topic['id']; ?>)"><?php echo $topic['topic'] ?></a>
            <?php endforeach; ?>

        </div>
    </div>
</div>
</div>
</div>
</div>