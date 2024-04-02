<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // fetch category from database
    $query = "SELECT * FROM categories WHERE id=$id";
    $category = mysqli_query($connection, $query);
    if (mysqli_num_rows($category) == 1) {
        $result = mysqli_fetch_assoc($category);
    }
} else {
    header('location: ' . 'manage-categories.php');
    die();
}
?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Category</h2>

        <form action="edit-category-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <input type="text" name="title" value="<?= $result['title'] ?>" placeholder="Title of Category">
            <textarea rows="4" name="description" placeholder="Description"><?= $result['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Update Category</button>
        </form>
    </div>
</section>

<script src="../js/main.js"></script>
<?php
include '../partials/footer.php';
?>