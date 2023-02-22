<?php view('header') ?>


<div class="container">
    <div class="container text-center" style="background-color:#7DB2CC;">
        <div class="row justify-content-around">
            <div class="col-4">
                <h1>Market View</h1>
                <?php foreach ($markets as $post) { ?>
                    <ul>
                        <li>
                            <a href="/fellowship/market?id=<?= $post['id'] ?>&user=<?= $post['user_id'] ?>">View Post</a>
                            <?php echo $post['user_id'] ?>
                            <?php echo $post['title'] ?>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>