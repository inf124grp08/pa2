var form = document.getElementById('form-order-form');


var validatorsReq = new XMLHttpRequest();
validatorsReq.addEventListener('load', function() {
  var validators = JSON.parse(this.responseText);

  // zip autofill
  var zipInput = document.getElementById("zip");
  var vZip = validators.find(i=>i.name==="zip");
  var vZipRegex = new RegExp(vZip.regex);
  zipInput.addEventListener('keyup', function() {
    if (vZipRegex.test(zipInput.value)) {
      console.log('valid');
      var getPlaceXHR = new XMLHttpRequest();
      getPlaceXHR.addEventListener('load', function() {
        var place = JSON.parse(this.responseText);
        console.log('!!!', place);
        //place.taxrate;
        //place.city;
        //place.state;
      });
      getPlaceXHR.open('GET', `get-place.php?zip=${zipInput.value}`);
      getPlaceXHR.send();
    }
  });


  // submission 
  form.addEventListener('submit', (e)=>{
    e.preventDefault();
    var data = new FormData(form);

    function validate() {
      var errors = [];
      validators.forEach(vfield => {
        var regex = new RegExp(vfield.regex);
        var val = data.get(vfield.name);
        if (!regex.test(val)) {
          if ( vfield.message ) {
            errors.push(vfield.message);
          } else {
            errors.push(`${vfield.name} is not valid`);
          }
        }
      })
      return errors;
    }

    var errors = validate();
    if ( errors.length === 0 ) {
      form.submit();
    } else {
      alert(errors.join('\n'));
    }
  });
});
validatorsReq.open('GET', 'validators.json');
validatorsReq.send();

