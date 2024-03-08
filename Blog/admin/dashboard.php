<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWAT Blog</title>
    <!-- linking to stylesheet -->
    <link rel="stylesheet" href="style2.css">
    <!-- ------------------- font awesome -----------------  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css">
    <!-- ------------------- GOOGLE FONTS ---------------- -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <!-- ---------------- Navigation Panel ------------------------ -->
    <nav>
        <div class="container nav__container">
            <a href="index2.html" class="nav__logo">S.W.A.T blog</a>
            <ul class="nav__items">
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="service.html">Services</a></li>
                <li><a href="..\index.html#contact" target="_blank">Contact</a></li>
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="images/avatar1.jpg" alt="">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="logout.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close__nav-btn"><i class="fa-solid fa-x"></i></button>
        </div>
    </nav>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-left"></i></button>
        <aside>
            <ul>
                <li><a href="add-post.html"><i class="fa-solid fa-pen-nib"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>
                <li><a href="dashboard.html" class="active"><i class="fa-solid fa-address-card"></i>
                    <h5>Manage posts</h5>
                    </a>
                </li>
                <li><a href="add-user.html"><i class="fa-solid fa-user"></i>
                    <h5>Add User</h5>
                    </a>
                </li>
                <li><a href="manage-users.html" ><i class="fa-solid fa-users"></i>
                    <h5>Manage User</h5>
                    </a>
                </li>
                <li><a href="add-category.html"><i class="fa-solid fa-pen-to-square"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li><a href="manage-categories.html"><i class="fa-solid fa-list"></i>
                    <h5>Manage Categories</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Art </td>
                        <td><a href="edit-post.html" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.html" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Art </td>
                        <td><a href="edit-post.html" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.html" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Art </td>
                        <td><a href="edit-post.html" class="btn sm">Edit</a></td>
                        <td><a href="delete-user.html" class="btn sm danger">Delete</a></td>
                    </tr>
                    
                </tbody>
            </table>
        </main>
    </div>
</section>


<footer>
    <div class="footer__socials">
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-brands fa-square-github"></i></a>
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-solid fa-user"></i></a>
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        <a href="https://www.linkedin.com/in/swatwa-kathane/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <ul>
                <li><a href="">Travel</a></li>
                <li><a href="">Arts</a></li>
                <li><a href="">Food</a></li>
                <li><a href="">Wilf Life</a></li>
                <li><a href="">Tech</a></li>
                <li><a href="">Music</a></li>
            </ul>
        </article>
        <article>
            <h4>Support</h4>
            <ul>
                <li><a href="">Online support</a></li>
                <li><a href="">Emails</a></li>
                <li><a href="">Social Support</a></li>
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
                <li><a href="">Home</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; SWAT Blog - Swatwa Kathane</small>
    </div>
</footer>


<script src="main.js"></script>

</body>
</html>