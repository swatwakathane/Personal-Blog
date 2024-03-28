<footer>
    <div class="footer__socials">
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://github.com/swatwakathane" target="_blank"><i class="fa-brands fa-square-github"></i></a>
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-solid fa-user"></i></a>
        <a href="https://twitter.com/swatwakathane/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.leetcode.com/swatwakathane/" target="_blank"><i class="fa-solid fa-code"></i></a>
    </div>

    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <?php
            $all_categories = "SELECT * FROM categories ORDER BY title";
            $result = mysqli_query($connection, $all_categories);
            ?>
            <ul>
                <?php while ($list_category = mysqli_fetch_assoc($result)) : ?>
                    <li><a href="<?= ROOT_URL ?>category-posts.php?id=<?= $list_category['id'] ?>"><?= $list_category['title'] ?></a></li>
                <?php endwhile ?>
            </ul>
        </article>

        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="mailto:swatwakathane@gmail.com">Online support</a></li>
                <li><a href="mailto:swatwakathane@gmail.com">Email</a></li>
                <li><a href="https://www.linkedin.com/in/swatwa-kathane/">Social Support</a></li>
                <li><a href="">Location</a></li>
                <li><a href="">Custom Message</a></li>
            </ul>
        </article>

        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">Safety</a></li>
                <li><a href="">Repair</a></li>
                <li><a href="">Categories</a></li>
                <li><a href="">Services</a></li>
            </ul>
        </article>

        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./about.php">About</a></li>
                <li><a href="./service.php">Services</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; SWATWA Blog - Swatwa Kathane</small>
    </div>
</footer>


<script src="<?= ROOT_URL ?>js/main.js"></script>

</body>

</html>