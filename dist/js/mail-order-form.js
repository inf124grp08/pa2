var form = document.getElementById('form-order-form');

var req = new XMLHttpRequest();
req.addEventListener('load', function() {
  var validators = JSON.parse(this.responseText);

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
req.open('GET', 'validators.json');
req.send();

