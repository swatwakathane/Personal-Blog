<?php
include 'partials/header.php';
?>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-right"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-left"></i></button>
        <aside>
            <ul>
                <li><a href="add-post.php"><i class="fa-solid fa-pen-nib"></i>
                    <h5>Add Post</h5>
                    </a>
                </li>
                <li><a href="index.php"><i class="fa-solid fa-address-card"></i>
                    <h5>Manage posts</h5>
                    </a>
                </li>
                <li><a href="add-user.php"><i class="fa-solid fa-user"></i>
                    <h5>Add User</h5>
                    </a>
                </li>
                <li><a href="manage-users.php"><i class="fa-solid fa-users"></i>
                    <h5>Manage User</h5>
                    </a>
                </li>
                <li><a href="add-category.php"><i class="fa-solid fa-pen-to-square"></i>
                    <h5>Add Category</h5>
                    </a>
                </li>
                <li><a href="manage-categories.php" class="active"><i class="fa-solid fa-list"></i>
                    <h5>Manage Categories</h5>
                    </a>
                </li>
            </ul>
        </aside>
        <main>
            <h2>Manage Categories</h2>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Travel</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Wild Life</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Art</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>


<?php
include '../partials/footer.php';
?>