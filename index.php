<?php 
    $title = 'Homepage';
    include('components/header.php');
    $last_post = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM post INNER JOIN user ON post.user_id=user.id ORDER BY post.id DESC LIMIT 1"));
    $img_post = mysqli_fetch_array(mysqli_query($connect, "SELECT photo FROM post WHERE '$last_post[user_id]'='$last_post[id]' ORDER BY post.id DESC LIMIT 1"));
?>

    <header class="py-5 mx-auto">
        <div class="container">
            <h1 class="header-title text-primary text-center text-capitalize">Discover Nice Articles here</h1>
            <p class="text-secondary text-capitalize text-center">Lorem ipsum, dolor sit amet consectetur adipisicing
                elit. Voluptatum laudantium explicabo sapiente non mollitia? Optio repellendus id exercitationem dolores
                eveniet porro animi nobis voluptatibus. Illum officia sapiente ullam odit facere.</p>
            <form action="#" method="get" class="d-flex align-items-center gap-2 bg-light rounded p-2">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </span>
                    <input type="search" name="search" id="search" placeholder="Search"
                        class="form-control bg-transparent border-0">
                </div>
                <button type="submit" class="btn btn-primary">Go</button>
            </form>
        </div>
    </header>

    <main>
        <section class="py-5">
            <div class="container">
                <a href="detail.php?slug=<?= $last_post['slug'] ?>" class="row align-items-center hero-post">
                    <div class="col-md-6 text-center">
                        <img src="assets/img/post/<?= $img_post['photo'] ?>" alt="" class="rounded-3 mb-3 hero-post-img">
                    </div>
                    <div class="col-md-6">
                        <span class="bg-light rounded p-2 fw-bold text-primary category">The Newest</span>
                        <h2 class="hero-post-title text-primary text-capitalize mt-3">
                            <?= $last_post['title'] ?>
                        </h2>
                        <p class="text-secondary">
                            <?= (str_word_count($last_post['body']) > 60 ? substr($last_post['body'], 0, 200) . "......." : $last_post['body']) ?>
                        </p>
                        <div class="d-flex align-items-center gap-3">
                            <img src="assets/img/user/<?= $last_post['photo'] ?>" alt="" class="avatar rounded-circle">
                            <div class="profile">
                                <div class="m-0 text-primary"><?= $last_post['name'] ?></div>
                                <div class="m-0 text-secondary" style="font-size:14px;"><?= $last_post['email'] ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    </main>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php
                
                $query = mysqli_query($connect, "SELECT * FROM post INNER JOIN user ON post.user_id=user.id ORDER BY post.id DESC");
                $query2 = mysqli_query($connect, "SELECT photo FROM post WHERE '$last_post[user_id]'='$last_post[id]' ORDER BY post.id DESC");
                while($data = mysqli_fetch_array($query)){
                    $data_img = mysqli_fetch_array($query2);
                ?>
                <div class="col md-4">
                    <a href="detail.php?slug=<?=  $data['slug'] ?>" class="card card-post border-0 rounded-3 mb-3">
                        <img src="assets/img/post/<?=  $data_img['photo'] ?>" alt="" class="card-img-top">

                        <div class="card-body">
                            <span class="bg-light rounded p-2 fw-bold text-primary category">The Newest</span>
                            <h2 class="card-post-title text-primary text-capitalize mt-3"><?=  $data['title'] ?></h2>
                            <p class="text-secondary"><?= (str_word_count($data['body']) > 60 ? substr($data['body'], 0, 200) . "......." : $data['body']) ?>
                            </p>
                            <div class="d-flex align-items-center gap-3">
                            <img src="assets/img/user/<?= $data['photo'] ?>" alt="" class="avatar rounded-circle">
                            <div class="profile">
                                <div class="m-0 text-primary"><?= $data['name'] ?></div>
                                <div class="m-0 text-secondary" style="font-size:14px;"><?= $data['email'] ?></div>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
                <?php }?>
            </div>
        </div>
    </section>

    <div class="container">
            <div class="row align-items-center" style="background-color: #122D5A;">
                <div class="col-md-6 p-5">
                    <h2 class="fw-bolder fs-2 text-capitalize mb-1" style="color:white;">Subscribe for new content</h2>
                    <p class="text-secondary text-capitalize mb-0">by becoming a member of our blog, you have access
                        articles and content</p>
                </div>
                <div class="col-md-6 p-5">
                    <div class="container">
                        <form action="#" method="get" class="d-flex align-items-center gap-2 bg-light rounded p-2">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </span>
                                <input type="email" name="subscribe" id="subscribe" placeholder="Enter your email"
                                    class="form-control bg-transparent border-0">
                                </div>
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php include('components/footer.php') ?>