<?php
include 'partials/header.php';

// getting back form data
$title = $_SESSION['add-category-data']['title'] ?? null ;
$description = $_SESSION['add-category-data']['description'] ?? null ;
unset($_SESSION['add-category-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        <?php if(isset($_SESSION['add-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                         ?>
                </p>
            </div>
        <?php endif ?>
        <form action="add-category-logic.php" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Title of Category">
            <textarea rows="4" name="description" placeholder="Description"><?= $description ?></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>
        </form>
    </div>
</section>

<script src="../js/main.js"></script>
<?php
include '../partials/footer.php';
?>