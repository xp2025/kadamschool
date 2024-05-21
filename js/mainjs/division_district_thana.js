$('#division').on('change', function() {
  var division_id = this.value;
  // console.log(division_id);
  $.ajax({
    url: 'ajax/district.php',
    type: 'POST',
    data: {
        division_data: division_id
    },
      success: function(result) {
      $('#district').html(result);

      // console.log(result);
    }
  })
});

// Thana Start
$('#district').on('change', function() {
  var district_id = this.value;
  // console.log(district_id);
  $.ajax({
    url: 'ajax/thana.php',
    type: 'POST',
    data: {
        district_data: district_id
    },
      success: function(result) {
      $('#thana').html(result);

      // console.log(result);
    }
  })
});

// parmanent address Start
$('#pdivision').on('change', function() {
var pdivision_id = this.value;
// console.log(division_id);
$.ajax({
  url: 'ajax/pdistrict.php',
  type: 'POST',
  data: {
      pdivision_data: pdivision_id
  },
    success: function(result) {
    $('#pdistrict').html(result);

    // console.log(result);
  }
})
});

// Thana Start
$('#pdistrict').on('change', function() {
var pthana_id = this.value;
// console.log(division_id);
$.ajax({
  url: 'ajax/pthana.php',
  type: 'POST',
  data: {
      pthana_data: pthana_id
  },
    success: function(result) {
    $('#pthana').html(result);

    // console.log(result);
  }
})
});
