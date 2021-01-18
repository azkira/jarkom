<?php
include_once 'includes/connect.php';
include_once 'includes/header.inc.php';
?>

<html>

<head>
  <title>Manual Input</title>
</head>

<body>
  <div class="container">
    <div class="row my-3">
      <div class="col-4">
      </div>
      <div class="col-4">
        <form method="post" action="includes/input.inc.php">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Data</label>
            <input type="text" class="form-control" name="data">
            <div id="emailHelp" class="form-text">Masukkan data berupa data integer</div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-4">
      </div>
    </div>
  </div>
</body>

</html>