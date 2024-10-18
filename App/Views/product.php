<div class="row mt-3">
    <div class="col-12">
        <a href="addProduct" class="btn btn-outline-primary">Add Book</a>
        <a href="api" class="btn btn-outline-primary">API ga kelgan ma'lumot</a>
    </div>
    <div class="col-12 mt-3">

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AUTHOR</th>
                <th>GENRE</th>
                <th>TITLE</th>
                <th>PHOTO</th>
                <th>SETTINGS</th>
            </tr>
            <?php
            foreach($models as $model){?>
            <tr>
                <td><?= $model->id?></td>
                <td><?= $model->name?></td>
                <td><?= $model->author?></td>
                <td><?= $model->genre?></td>
                <td><?= $model->title?></td>
                <td><img src="App/<?= $model->photo?>" width="100px"></td>
                <td>
                    <form action="updateProduct" method="POST">
                        <input type="hidden" name="id" value="<?= $model->id?>">
                        <button type="submit" name="ok" class="btn btn-outline-primary" style="width: 100px;">Update</button>
                    </form>
                    <form action="showUpdateApi" method="POST">
                        <input type="hidden" name="id" value="<?= $model->id?>">
                        <button type="submit" name="ok" class="btn btn-outline-primary" style="width: 100px;">Show Update Api</button>
                    </form>
                    <form action="deleteProduct" method="POST">
                        <input type="hidden" name="id" value="<?= $model->id?>">
                        <button type="submit" name="ok" class="btn btn-outline-warning" style="width: 100px;">Delete</button>
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>

    </div>
</div>