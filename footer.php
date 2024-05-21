
<!-- copy-wright section start -->
<section id="copy-wright" class="bg-dark py-4">
<div class="container">
<div class="row">
<div class="col-md text-light py-4">
    <p><span>&#9400; </span>Copywright 2020 - <?php echo date('Y'); ?>. All Rights Reserved </p>
</div>
<div class="col-md text-light py-4">
     <p>Powered By<a class="ml-2 text-light" href="http://shubhamandal.com/">shubhamandal.com</a></p>
</div>
<div class="col-md text-light py-4">
    <p>Developed By<a class="ml-2 text-light" href="https://www.facebook.com/shubha.mandal2">SHUBHA MANDAL</a></p>
</div>
</div>
</div>
</section>
<!-- copy-wright section end -->

<!-- scriptsection -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/popper.js"></script>
  <script type="text/javascript" src="js/responsive.bootstrap4.min.js"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js.map"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/mainjs/copyaddress.js"></script>
<script type="text/javascript" src="js/mainjs/division_district_thana.js"></script>
<script type="text/javascript" src="js/mainjs/formvalidation.js"></script>
<script type="text/javascript" src="js/mainjs/guest.js"></script>
  <script>
    $(document).ready( function () {
    $('#noticeTable').DataTable();
} );
    </script>
<!-- prevent Inspect Element (disabale right click on the page)-->

<!-- <script type="text/javascript">
document.addEventListener("contextmenu", function(i){
  i.preventDefault();
});
</script> -->



<!-- Ctrl + u disabale code -->
<script type="text/javascript">
document.onkeydown = function(e) {
      if (e.ctrlKey &&
          (e.keyCode === 67 ||
           e.keyCode === 86 ||
           e.keyCode === 85 ||
           e.keyCode === 117)) {
          alert("Don't Try This Again");
          return false;
      } else {
          return true;
      }
};
</script>
</body>
</html>
