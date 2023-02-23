<?php view('header') ?>


<div class="container">
    <div class="container text-center" style="background-color:#7DB2CC;">
        <div class="row justify-content-around">

            <!--------------- CREATE MARKET POST ---------------->

            <div class="col-4">
                <h1>New Item</h1>
                <form class="row g-3" method="post">
                    <div class="col-12">
                        <label for="itemTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="itemTitle" name="itemTitle" aria-label="Item Title"
                            value="<?php isset($_POST['itemTitle']) ? htmlspecialchars($_POST['itemTitle'], ENT_QUOTES) : '' ?>"
                            placeholder="Enter Title" required>
                        <small>
                            <?= $errors['itemTitle'] ?? '' ?>
                        </small>
                    </div>
                    <div class="col-12">
                        <label for="itemDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="itemDescription" name="itemDescription"
                            aria-label="Item Description" placeholder="Enter Description" rows="5" cols="33"
                            required></textarea>
                        <small>
                            <?= $errors['itemDescription'] ?? '' ?>
                        </small>
                    </div>

                    <div class="col-md-4 form-check">
                        <label class="form-check-label" for="itemUserId">itemUserId foreign_key</label>
                        <input type="text" name="itemUserId" class="form-check-input" id="itemUserId" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>

            <!--------------- END MARKET POST --------------------------->

            <!--------------- MARKET LIST ----------------------------------->
            <div class="col-4">
                <h1>Your Items DashBoard</h1>
                <?php
                echo 'yor posted items list'; ?>
                <ul>
                    <li>
                        <a href="#">View item</a>
                        <?php echo 'Item info'; ?>

                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>