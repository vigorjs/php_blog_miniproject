<?php 
$title = 'Profile';
include('components//header.php')
?>

<section class="py-5">
    <div class="container">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h4 class="text-primary fw-bold">Profile</h4>
            <a href="." class="btn btn-light">Go Dashboard</a>
        </div>

        <form action="php/profile.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= $user_logged['name'] ?>" placeholder="Enter Your Name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $user_logged['email'] ?>" placeholder="Enter Your Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password">Password</label>
                        <span class="form-text text-center">Hanya isi jika ingin mengubah Password</span>
                    </div>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label for="photo">Photo</label>
                            <span class="form-text text-end">Hanya isi jika ingin mengubah Foto</span>
                        </div>
                        <input type="file" name="photo" id="photo" accept="image/*" class="form-control">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-4">Submit</button>
        </form>
    </div>
</section>
<?php include('components//footer.php')?>