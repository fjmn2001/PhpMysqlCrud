<?php

include ("db.php");

if (isset($_GET['id'])){

    $id= $_GET['id'];

    $stmt = Connection::conectar()->prepare("SELECT * FROM crud WHERE id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_OBJ);

    if ($result === FALSE){
        echo "NO EXISTE";
        exit();
    }

    }

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];


        $stmt = Connection::conectar()->prepare("UPDATE crud SET title = :title, description = :description WHERE id = :id");
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":description",$description);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $_SESSION['message'] = 'Updated succesfully';
        $_SESSION['message_type'] = 'primary';

        header("Location: index.php");

        }
?>

<?php include("includes/header.php"); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $result->title?>"
                            class="form-control" placeholder="Update Title">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2"
                             class="form-control" placeholder="Update Description"><?php echo $result->description?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>