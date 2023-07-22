<?php include('components/header.php')?>

<section class="autentikasi py-5">
    <div class="container">
        <h2 class="text-primary text-center mb-4">Login</h2>
        
        <form action="php/login.php" method="post">
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
            <p class="mt-3 text-secondary text-center">Don't have an account? <a href="register.php" class="text-primary">Register</a></p>
        </form>
    </div>
</section>