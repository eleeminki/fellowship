<?php view('header') ?>

<div class="container">
    <div class="container text-center" style="background-color:#7DB2CC;">
        <div class="row justify-content-around">
            <div class="col-4">
                <a href="/market/post">
                    <h1>Post Item</h1>
                </a>
            </div>
            <!--------------- MARKET LIST ----------------------------------->
            <div class="col-4">
                <h1>Market View</h1>
                <?php foreach ($marketItems as $item) { ?>
                <ul>
                    <li>
                        <a href="/market?id=<?= $item['id'] ?>&user=<?= $item['user_id'] ?>">View item</a>
                            <?= htmlspecialchars($item['user_id']); ?>
                            <?= htmlspecialchars($item['title']); ?>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>