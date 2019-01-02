<?php $page = 'forum_full_topic'; include 'header.php'?>

<style type="text/css">
    .post-col{
        min-width: 20em;
    }

    .author-col{
        min-width: 12em;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="h4 text-white bg-info mb-0 p-4 rounded-top">Forum Post</h2>
            <table class="table table-striped table-bordered table-responsive-lg">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Author</th>
                    <th scope="col">Message</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="author-col">
                        <div><a href="#">Author name</a></div>
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <div><span class="font-weight-bold">Post subject:</span> Forum Topic</div>
                        <div><span class="font-weight-bold">Posted:</span> 01 jan 2019, 15:43</div>
                    </td>
                </tr>
                <tr>
                    <td class="author-col">
                        <div><span class="font-weight-bold">Joined:</span> <br>01 jan 2019, 15:43</div>
                        <div><span class="font-weight-bold">Posts:</span> <br>123</div>
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Ab, accusantium ad assumenda aut consectetur cumque deserunt
                            doloremque esse eveniet impedit ipsum perspiciatis placeat
                            praesentium quasi, quo repellendus repudiandae sed tenetur?</p>
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered table-responsive-lg">
                <tbody>
                <tr>
                    <td class="author-col">
                        <div><a href="#">Author name</a></div>
                    </td>
                    <td class="post-col d-lg-flex justify-content-lg-between">
                        <div><span class="font-weight-bold">Post subject:</span> Forum Topic</div>
                        <div><span class="font-weight-bold">Posted:</span> 01 jan 2019, 15:43</div>
                    </td>
                </tr>
                <tr>
                    <td class="author-col">
                        <div><span class="font-weight-bold">Joined:</span> <br>01 jan 2019, 15:43</div>
                        <div><span class="font-weight-bold">Posts:</span> <br>123</div>
                    </td>
                    <td class="post-col">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Ab, accusantium ad assumenda aut consectetur cumque deserunt
                            doloremque esse eveniet impedit ipsum perspiciatis placeat
                            praesentium quasi, quo repellendus repudiandae sed tenetur?</p>

                        <img src="https://placehold.it/600x400" class="img-fluid" alt="">
                        
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Ab, accusantium ad assumenda aut consectetur cumque deserunt
                            doloremque esse eveniet impedit ipsum perspiciatis placeat
                            praesentium quasi, quo repellendus repudiandae sed tenetur?</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mb-3 clearfix">
        <nav aria-label="Navigate post pages" class="float-lg-right">
            <ul class="pagination pagination-sm mb-lg-0">
                <li class="page-item active"><a href="#" class="page-link">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">&hellip;31</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </nav>
    </div>
    <form class="mb-3" action="">
        <div class="form-group">
            <label for="comment">Reply to this post:</label>
            <textarea class="form-control" name="" id="comment" cols="30" rows="10" placeholder="Write your comment here." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Reply</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
</div>


<?php include 'footer.php';?>
