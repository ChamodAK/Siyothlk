<?php $page = 'forum_add_topic'; include 'header.php'?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="h4 text-white bg-info mb-3 p-4 rounded">Create new post</h2>
            <form class="mb-3" action="">
                <div class="form-group">
                    <label for="topic">Topic:</label>
                    <input type="text" class="form-control" id="topic" placeholder="Give your topic title." required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" name="" id="comment" cols="30" rows="10" placeholder="Write your comment here." required></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-labek">
                        <input type="checkbox" class="form-check-input" id="checkbox" value="notification">Notify me upon replies.</input>
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Create Topic</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'?>
