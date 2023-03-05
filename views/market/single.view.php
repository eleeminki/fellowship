<?php view('header') ?>


<div class="container">
    <div class="container text-center" style="background-color:#7DB2CC;">
        <div class="row justify-content-around">
            <div class="col-4">
                <a href="/markets">Go Back.</a>
                <h1>
                    <?= htmlspecialchars($item['title']) ?>
                </h1>
                <p>
                    <?= htmlspecialchars($item['description']) ?>
                </p>
            </div>
        </div>
    </div>
</div>