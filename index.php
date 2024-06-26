<?php
include 'partials/header.php';

// fetch featured blog
$featured_query = "SELECT * FROM posts WHERE is_featured=1";
$freatured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($freatured_result);

// fetch 9 blogs for homepage
$query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
$posts = mysqli_query($connection, $query);
?>

<!-- ----------------------- FEATURED POST ---------------------------- -->
<?php if (mysqli_num_rows($freatured_result) == 1) : ?>

    <section class="featured">
        <div class="container featured__container">
            <div class="post__thumbnail">
                <img src="images/<?= $featured['thumbnail'] ?>">
            </div>
            <div class="post__info">
                <?php
                $cateogry_id = $featured['category_id'];
                $category_query = "SELECT * FROM categories WHERE id=$cateogry_id";
                $category_result = mysqli_query($connection, $category_query);
                $category = mysqli_fetch_assoc($category_result);
                ?>
                <a href="category-posts.php?id=<?= $featured['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                <h2 class="post__title"><a href="post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="post__body"><?= substr($featured['body'], 0, 300) ?>. . . </p>
                <div class="post__author">
                    <?php
                    $author_id = $featured['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                    ?>
                    <div class="post__author-avatar">
                        <img src="./images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                        <small>
                            <?= date("M d, Y - H:i", strtotime($featured['date_time'])) ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>">
                </div>
                <div class="post__info">
                    <?php
                    $cateogry_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$cateogry_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                    <h3 class="post__title"><a href="post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>
                    <p class="post__body"><?= substr($post['body'], 0, 200) ?>. . . </p>
                    <div class="post__author">
                        <?php
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post__author-avatar">
                            <img src="./images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post__author-info">
                            <h5>By: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                            <small><?= date("M d, Y - H:i", strtotime($post['date_time'])) ?> </small>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile ?>
    </div>
</section>

<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
        $all_categories = "SELECT * FROM categories ORDER BY title";
        $result = mysqli_query($connection, $all_categories);
        ?>
        <?php while ($list_category = mysqli_fetch_assoc($result)) : ?>
            <a href="category-posts.php?id=<?= $list_category['id'] ?>" class="category__button"><?= $list_category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>

<?php
include 'partials/footer.php';
?>