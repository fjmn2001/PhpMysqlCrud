<?php
include("db.php");

include("includes/header.php"); ?>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

                <div class="card card-body">

                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control"
                                   placeholder="Task Title" autofocus>
                        </div> <br>
                        <div class="form-group">
                <textarea name="description" rows="2" class="form-control"
                          placeholder="Task Description"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block"
                               name="save_task" value="Save Task" style="marging-top:15px">
                    </form>

                </div>

            </div>

            <div class="col-m-8">

            </div>

        </div>

    </div>

<?php include("includes/footer.php") ?>


