<?php
include 'partials/header.php';
?>

<section class="form__section poster" >
    <div class="container form__section-container">
        <h2>Edit User</h2>
        <form action="" enctype="multipart/form-data" >
            <input type="text" placeholder="First Name">
            <input type="text" placeholder="Last Name">
            <label for="user_role">User Role</label>
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</section>



<?php
include '../partials/footer.php';
?>