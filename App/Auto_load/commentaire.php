<?php 
include '../'
foreach($commentaire as $com): ?>
    <div class="msg">
        <div>
            <img src="https://www.tbstat.com/wp/uploads/2019/07/20190724_Blockchain-Gaming.jpg">
            <p><?= $com->pseudo ?></p>
            <p><?= $com->date ?></p>
        </div>
        <div>
            <p><?= $com->comment ?></p>
        </div>
    </div>
<?php endforeach;?>