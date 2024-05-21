
<?php
include("db.php");

// $sql= "SELECT * FROM countdowns";
$sql= "SELECT * FROM countdowns ORDER BY countdowns . date DESC";
$result = mysqli_query($conn,$sql);
// $date_input = mysqli_fetch_array($result, MYSQL_ARRAY);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Count Down</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,800&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        font-family: "Open Sans", sans-serif;

      }

      .main_content {
        height :100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        flex-wrap: wrap;
      }

      .main_content > h2 {
        font-size: 1.3rem;
        text-transform: uppercase;

      }
      .countdown {
        display: flex;
        text-align: center;
      }

      .countdown > div {
        width: 70px;

        background-color: rgb(0, 0, 0, 0.5);
        margin: 4px;
        box-shadow: 2px 3px 5px rgb(0, 0, 0, 0.25);
        font-size: 1.5rem;
        font-weight: bold;
        color: #fff;
        border-radius: 5%;
      }

      .countdown > div > span {
        font-size: 0.8rem;
      }
    </style>
  </head>
  <body>
    <div class="main_content">
      <?php

      while($row = mysqli_fetch_assoc($result)) {
        ?>
       <h2> <?php echo $row['title'];?> </h2>
       <input type="hidden" name="end_date" id="end-date" value="<?php echo $row['end_date']; ?>">
      <?php } ?>

      <div class="countdown">
        <div>
          <span>Days</span>
          <div id="days"></div>
        </div>
        <div>
          <span>Hours</span>
          <div id="hours"></div>
        </div>
        <div>
          <span>Minites</span>
          <div id="minutes"></div>
        </div>
        <div>
          <span>secounds</span>
          <div id="secounds"></div>
        </div>
      </div>
    </div>

    <script>
      const final_date = document.getElementById('end-date').value;
      const daysdiv = document.getElementById("days");
      const hoursdiv = document.getElementById("hours");
      const minutesdiv = document.getElementById("minutes");
      const secoundsdiv = document.getElementById("secounds");

      function countdown() {
        const expect_date = new Date(final_date);
        const currentdate = new Date();

        const time_count = (expect_date - currentdate) / 1000;
        let days = Math.floor(time_count / 3600 / 24);
        let hours = Math.floor((time_count / 3600) % 24);
        let minutes = Math.floor((time_count / 60) % 60);
        let seconds = Math.floor(time_count) % 60;
          console.log(time_count);
          if (time_count <=0) {

            daysdiv.innerHTML = "0 0";
            hoursdiv.innerHTML = "0 0";
            minutesdiv.innerHTML = "0 0";
            secoundsdiv.innerHTML = "0 0";
              clearInterval(time);

          return;
        }

        console.log(days, hours, minutes, secounds);

        daysdiv.innerHTML = days;
        hoursdiv.innerHTML = hours;
        minutesdiv.innerHTML = minutes;
        secoundsdiv.innerHTML = seconds;

      }

      countdown();
     var time = setInterval(countdown, 1000);

    </script>
  </body>
</html>
