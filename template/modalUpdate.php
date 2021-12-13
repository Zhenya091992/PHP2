<div class="modal fade" id="exampleModal<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update news №<?php echo $value->id; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index.php?action=update&id=<?php echo $value->id; ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="validationText" class="form-label">Title</label>
                        <input type="text" class="form-control" name="newTitle" value="<?php echo $value->title; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Short description</label>
                        <textarea class="form-control" name="newShortDescription"><?php echo $value->shortDescription; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">News</label>
                        <textarea class="form-control" name="newText"><?php echo $value->text; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="validationText" class="form-label">Author</label>
                        <input type="text" class="form-control" name="newAuthor" <?php echo !empty($value->author_id) ?: 'value="' . $value->author . '">' ?>
                    </div>
                    <div class="mb-3">
                        <select name="author_id" class="form-select" aria-label="Default select example">
                            <option selected>Select author</option>
                            <?php
                            foreach ($authors as $author) {
                                echo '<option ';
                                if ($author->id == $value->author_id) {
                                    echo 'selected ';
                                }
                                echo 'value="' . $author->id . '">' . $author->nameAuthor . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>