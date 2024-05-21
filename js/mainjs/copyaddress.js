$(document).ready(function(){
  $('#parmanent_address').click(function(){
  if ($('#parmanent_address').is(":checked")) {
   $('#pvillage').val($('#village').val());

   var division = $('#division option:selected').val();
   $('#pdivision option[value="' + division + '"]').prop('selected',true);

   // console.log("manto",pdivision);
   // console.log("sarker",$('#pdivision option:selected').val());
//district Start
var pdivision_id = $('#pdivision option:selected').val();
// console.log(division_id);
$.ajax({
url: 'ajax/district.php',
type: 'POST',
data: {
   division_data: pdivision_id
},
 success: function(result) {
 $('#pdistrict').html(result);

 var district = $('#district option:selected').val();
 console.log("joy", district)
  $('#pdistrict option[value="' + district + '"]').prop('selected',true);

  // console.log("joyeee",$('#pdistrict option:selected').val());
  // Thana start
  var district_id = $('#pdistrict option:selected').val();
  $.ajax({
    url: 'ajax/thana.php',
    type: 'POST',
    data: {
        district_data: district_id
    },
      success: function(result) {
      $('#pthana').html(result);

      var thana = $('#thana option:selected').val();

       $('#pthana option[value="' + thana + '"]').prop('selected',true);

      // console.log("shipan",result);
    }
  })
}
});
} else { //Clear on uncheck
   $('#pvillage').val("");

   $('#pdivision option:eq(0)').prop('selected', true);

   $('#pdistrict option:eq(0)').prop('selected', true);

   $('#pthana option:eq(0)').prop('selected', true);
  };

 });

});
