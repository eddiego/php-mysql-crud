<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save Task">
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
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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

<div class="container-fluid">
  <div class="row">
    <div class="col-3">
      s3 obj (https)<br>
      <img src="//edy-web.s3.ap-northeast-2.amazonaws.com/m.jpg" alt="s3 obj" height="250" width="250">
    </div>
    <div class="col-3">
      s3 static host-route (http)<br>
      <img src="http://s3test.edygo.ml/m.jpg" alt="s3 static" height="250" width="250">
    </div>
    <div class="col-3">
      s3 cdn (https)<br>
      <img src="//r.edygo.ml/m.jpg" alt="s3 cdn" height="250" width="250">
    </div>
    <div class="col-3">
      relative /res<br>
      <img src="res/m.jpg" alt="relative" height="250" width="250">
    </div>
  </div>
  <div class="row mt-4 ml-2">
    <form>
      <input type="text" value="" id="imgurl" size="96">
      <input type="button" onclick="document.getElementById('imgview').src=document.getElementById('imgurl').value" value="Display">
    </form>
  </div>
  <div class="row mt-2 ml-2 mb-4">
    <img id="imgview" height="300">
  </div>
</div>

<?php include('includes/footer.php'); ?>
