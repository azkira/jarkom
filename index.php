<?php
include_once 'includes/connect.php';
include_once 'includes/header.inc.php';
?>

<!doctype html>
<html lang="en">

<head>
  <title>Sensor Pintu</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <div class="container my-3">
        </div>
      </div>
      <div class="col-4">
        <?php
        $query = "SELECT * FROM stat;";
        $query_run = mysqli_query($conn, $query);
        ?>


        <div class="container-sm my-3">

          <h2 style="text-align: center;">Activities</h2>
          <table class="table table-sm table-hover table-success table-striped table-bordered border-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Date and Time</th>
              </tr>
            </thead>
            <?php
            $i = 1;
            if ($query_run) {
              foreach ($query_run as $row) {
            ?>
                <tbody>
                  <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td> Detected at <?php echo $row['status_time']; ?></td>
                </tbody>
            <?php
              }
            } else {
              echo "No Record Found";
            }
            ?>
          </table>
        </div>
      </div>
      <div class="col-4">
        <div class="container my-3">
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>