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



<script src="main.js"></script>

</body>
</html>