<?php
include("header.php");
?>
<?php
include("db.php");


$sql= "SELECT * FROM notice ORDER BY notice . date DESC";
$result = mysqli_query($conn,$sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(isset($_GET['file_id']))
{
  $id = $_GET['file_id'];
  $sql = "SELECT * FROM notice WHERE id=$id";
  $result = mysqli_query($conn,$sql);
  $file = mysqli_fetch_assoc($result);
  $filepath ='uploads_pdf/' . $file['pdf'];
  if (file_exists($filepath))
  {
    header('Content-Type: application/octet-stream');
     header("Content-Type: application/force-download");
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename=' . urlencode(basename($filepath)));
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma:public');
    header('Content-Length:' . filesize( $filepath));
    ob_clean();
    flush();
    readfile($filepath);

    // $newCount = $file['downloads'] + 1;

    // $updatQuery = "UPDATE notice SET downloads=$newCoont WHERE id=$id";

    // mysqli_query($con,$updatQuery);
    exit;
  }
}
?>
<style >
  table tr td .download_sty  {
  background-color: #fff;
  color: #000;
  border: 2px solid green;
  padding: 2px 3px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
table tr td .download_sty,i .fas{
  font-size: 12px;
}
table tr td a:hover, a:active {
  background-color: green;
  color: white;
  text-decoration: none;
}
</style>
<header id="support-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 m-auto text-center text-light">
          <!-- <h1 class="text-light">Need Support?</h1>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, saepe.</p> -->
          <?php
          include("countdown.php");
           ?>
        </div>
      </div>
    </div>
  </header>
  <!-- Contact Section -->
  <section id="support" class="py-5 bg-secondary">
    <div class="container">
      <div class="row pt-5">
        <div class="col-md-8 ">
          <div class="card">
            <div class="card-body">
              <h4 class="mb-4 text-center">All Notice </h4>
              <div class="row">
                <table class="table table-bordered" id="noticeTable">
                  <thead>
                    <tr>
                      <th >SL No</th>
                      <th >Name</th>
                      <th >Date</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $serial=0;
                  foreach($files as $file): $serial++; ?>
                    <tr>
                      <td> <?php echo $serial;?> </td>
                      <td> <?php echo $file['name'];?> </td>
                      <td> <?php echo date('d/m/y h:i a',strtotime($file["date"]));?> </td>
                      <td> <a class="download_sty" href="support.php?file_id=<?php echo $file['id'];?>"><i class="fas fa-download"></i> Download </a></td>
                    </tr>
                    <?php  endforeach ;  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h4>Need Technical Support?</h4>
              <p>Please call Shubha Mandal by phone or send mail by given mail address bellow.</p>
              <h4>Email</h4>
              <p>shubhamandal70@gmail.com</p>
              <h4>Phone</h4>
              <p class="mb-2">01822823912</p>
              <p>01515275159</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
include("footer.php");
 ?>
