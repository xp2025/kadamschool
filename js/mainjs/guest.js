

    function test() {
      let selectedSize;
      const radioButtons = document.querySelectorAll('input[name="guest"]');
      for (const radioButton of radioButtons) {
        if (radioButton.checked) {
          selectedSize = radioButton.value;
          break;
        }
      }

      if (selectedSize == 1) {
        document.getElementById("extraOption").style.display = "inline"
      } else {
        document.getElementById("extraOption").style.display = "none"
      }
    }


    function child_check() {
      const checked_Child_Options = document.getElementById('child')

      if (checked_Child_Options.checked) {
        document.getElementById("childRelation").style.display = "inline"
        document.getElementById('other').checked = false
        document.getElementById("otherRelation").style.display = "none";
      } else {
        document.getElementById("childRelation").style.display = "none"
      }
      console.log(checked_Child_Options.checked)
    }

    function other_check() {
      const checkedOptions = document.getElementById('other')

      if (checkedOptions.checked) {
        document.getElementById("otherRelation").style.display = "inline";
        document.getElementById("husband").checked = false;
        document.getElementById("wife").checked = false;
        document.getElementById("child").checked = false;
        document.getElementById("childRelation").style.display = "none"
      } else {
        document.getElementById("otherRelation").style.display = "none";
      }
    }

    function husband_check() {
      const checkedOptions = document.getElementById('husband')

      if (checkedOptions.checked) {
        document.getElementById("otherRelation").style.display = "none";
        document.getElementById("other").checked = false;
        document.getElementById("wife").checked = false;
        // document.getElementById("child").checked = false;
        // document.getElementById("childRelation").style.display = "none"
      }
    }

    function wife_check() {
      const checkedOptions = document.getElementById('wife')

      if (checkedOptions.checked) {
        document.getElementById("otherRelation").style.display = "none";
        document.getElementById("other").checked = false;
        document.getElementById("husband").checked = false;
        // document.getElementById("child").checked = false;
        // document.getElementById("childRelation").style.display = "none"
      }
    }
