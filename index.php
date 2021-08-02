<?php include("db.php")?>
<?php include("includes/header.php")?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->
<?php if(isset($_SESSION["message"])){?>
        
    <div class="alert alert-<?=$_SESSION["message-type"] ?> alert-dismissible fade show" role="alert">
  <?= $_SESSION["message"] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

    <?php session_unset();} ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save-task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autocomplete="off" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description" autocomplete="off"></textarea>
          </div>
          <input type="submit" name="save-task" class="btn btn-success btn-block" value="Save Task">
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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php 
$query= "SELECT * FROM task";
$resultTasks = mysqli_query($conn,$query);

while($row = mysqli_fetch_array($resultTasks)){?>
<tr>
            <td><?php echo $row["title"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <td><?php echo $row["created-at"] ?></td>
            <td>
                <a class="btn btn-primary" href="edit-task.php?id=<?php echo $row["id"]?>">
                  <i class="fas fa-marker"></i>
                </a>
                <a class="btn btn-danger" href="delete-task.php?id=<?php echo $row["id"]?>">
                <i class="far fa-trash-alt"></i>
                </a>
           
            </td>
</tr>
<?php } ?>
                  
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include("includes/footer.php")?>