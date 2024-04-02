<?php
include 'partials/header.php';

// fetch categories from database
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

//fetch blog data from database
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . 'index.php');
    die();
}
?>

<section class="form__section poster">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" value="<?= $post['id'] ?>" name="id">
            <input type="hidden" value="<?= $post['thumbnail'] ?>" name="previous_thumbnail_name">
            <input type="text" value="<?= $post['title'] ?>" name="title" placeholder="Title">
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
            </select>
            <textarea rows="10" placeholder=" Post Body" name="body"><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <label for="is_featured" >Featured</label>
                <input type="checkbox" id="is_featured" name="is_featured" value="1">
            </div>
            <div class="form__control">
                <label for="thumbnail">Edit Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>
        </form>
    </div>
</section>

<script src="../js/main.js"></script>
<?php
include '../partials/footer.php';
?>