<div class="row mt-3">
    <div class="col-12">
        <a href="/" class="btn btn-outline-primary" style="width: 100px;">Back</a>
    </div>
    <div class="col-8 offset-2 mt-3">
        <form action="update" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="id" value="<?= $models->id?>">
                <input type="hidden" name="old_photo" value="<?= $models->photo?>">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= $models->name?>">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="author" placeholder="Author" value="<?= $models->author?>">
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" placeholder="Genre" value="<?= $models->genre?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <textarea name="title" id="title" placeholder="Title" class="form-control" rows="3"><?= $models->title?></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" value="<?= $models->photo?>" name="photo" id="photo" class="form-control">
                <img src="App/Views/Main/Uploads/<?= $models->photo?>" style="width: 100px;" alt="">
            </div>
            <div class="col-2 offset-5">
                <button type="submit" name="ok" class="btn btn-outline-warning" style="width: 100px;">Save</button>
            </div>
        </form>
    </div>
</div>