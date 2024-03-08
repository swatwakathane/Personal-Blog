<?php
include 'partials/header.php';
?>

<section class="form__section poster" >
    <div class="container form__section-container">
        <h2>Add User</h2>
        <div class="alert__message error">
            <p>Error Occured</p>
        </div>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <input type="text" placeholder="Username">
            <input type="email" placeholder="Email Address">
            <input type="password" placeholder="Create Password">
            <input type="password" placeholder="Confirm Password">
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">User Avatar</label>
            </div>
            <input type="file" id="avatar">
            <button type="submit" class="btn">Add User</button>
        </form>
    </div>
</section>



<script src="<?= ROOT_URL ?>js/main.js"></script>

</body>
</html>