<?php
include("db.php");

include("includes/header.php"); ?>

    <div class="container p-4">

        <div class="row">

            <div class="col-md-4">

                <?php if (isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION["message_type"];?> alert-dismissible fade show" role="alert">
                    <?=   $_SESSION["message"]   ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php   session_unset(); }   ?>


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

            <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                $stmt = Connection::conectar()->prepare("SELECT id, title, description, created_at FROM crud");
                $stmt->execute();
                $results=$stmt->fetchAll(PDO::FETCH_OBJ);

                if($stmt -> rowCount() > 0)   {
                    foreach($results as $result) {
                    echo "<tr>

                    <td>".$result -> title."</td>
                    <td>".$result -> description."</td>
                    <td>".$result -> created_at."</td>
                    <td>
                                        
                    <a href='edit.php?id=".$result->id."' class='btn btn-secondary'><i class='fas fa-marker'> </i>
                    </a>
                    <a href='delete_task.php?id=".$result->id."' class='btn btn-danger'><i class='far fa-trash-alt'> </i>
                    </a>
                    </td>
                    </tr>";


                    }
                }?>

                </tbody>
            </table>


            </div>

        </div>

    </div>

<?php include("includes/footer.php") ?>


