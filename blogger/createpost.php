<?php 
$title = 'Add Post';
include('components//header.php')
?>

<section class="py-5">
    <div class="container">
        <div class="d-flex align-item-center justify-content-between mb-2">
            <h4 class="text-primary fw-bold">Create New Post</h4>
            <a href="post.php" class="btn btn-light">Go Back</a>
        </div>

        <form action="php/actionpost.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <div class="mb-3">
                <label for="title">Title Post</label>
                <input type="text" name="title" id="title" placeholder="Title Post" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="category">Category</label>
                <input type="text" name="category" id="category" placeholder="Category" class="form-control">
            </div>
            <div class="mb-3">
                <label for="body">Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Body"></textarea>
            </div>
            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary px-4" name="submit">Submit</button>
        </form>
    </div>
</section>
<?php include('components//footer.php')?>