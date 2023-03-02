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
                        <?php if (!isset($_POST['itemTitle'])) { ?>
                            <input type="text" class="form-control" id="itemTitle" name="itemTitle" aria-label="Item Title"
                                value="" placeholder="Enter Title" required>
                        <?php } elseif (isset($_POST['itemTitle']) && !$errors['itemTitle']) { ?>
                            <input type="text" class="form-control" id="itemTitle" name="itemTitle" aria-label="Item Title"
                                value="<?= htmlspecialchars($_POST['itemTitle']); ?>" placeholder="Enter Title" required>
                        <?php } elseif ($errors['itemTitle']) { ?>
                            <input type="text" class="form-control" id="itemTitle" name="itemTitle" aria-label="Item Title"
                                value="<?= $_SESSION['inputs']['itemTitle']; ?>" placeholder="Enter Title" required>
                        <?php } ?>
                        <small>
                            <?= $errors['itemTitle'] ?? '' ?>
                        </small>
                    </div>
                    <div class="col-12">
                        <label for="itemDescription" class="form-label">Description</label>
                        <?php if (!isset($_POST['itemDescription'])) { ?>
                            <textarea class="form-control" id="itemDescription" name="itemDescription"
                                aria-label="Item Description" value="" placeholder="Enter Description" rows="5" cols="33"
                                required></textarea>
                        <?php } elseif (isset($_POST['itemDescription']) && !$errors['itemDescription']) { ?>
                            <textarea class="form-control" id="itemDescription" name="itemDescription"
                                aria-label="Item Description" value="<?= htmlspecialchars($_POST['itemDescription']); ?>"
                                placeholder="Enter Description" rows="5" cols="33" required></textarea>
                        <?php } elseif ($errors['itemDescription']) { ?>
                            <textarea class="form-control" id="itemDescription" name="itemDescription"
                                aria-label="Item Description" placeholder="Enter Description" rows="5" cols="33"
                                required><?= $_SESSION['inputs']['itemDescription']; ?></textarea>
                        <?php } ?>
                        <small>
                            <?= $errors['itemDescription'] ?? '' ?>
                        </small>
                    </div>

                    <div class="col-md-4 form-check">
                        <label class="form-check-label" for="itemUserId">itemUserId foreign_key</label>
                        <input type="text" name="itemUserId" class="form-check-input" id="itemUserId" required>
                        <small>
                            <?= $errors['itemUserId'] ?? '' ?>
                        </small>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </form>
            </div>

            <!--------------- END MARKET POST --------------------------->

            <!--------------- MARKET LIST ----------------------------------->
            <div class="col-4">
                <h1>Your Items Dashboard</h1>
                <?php if (isset($userPost)) { ?>
                    <?php foreach ($userPost as $post) { ?>
                        <ul>
                            <li>
                                <a href="/fellowship/market?id=<?= $post['id'] ?>&user=<?= $post['user_id'] ?>">View item</a>
                                <h2>
                                    <?= htmlspecialchars($post['title']); ?>
                                </h2>
                                <p>
                                    <?= htmlspecialchars($post['description']); ?>
                                </p>
                            </li>
                        </ul>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>