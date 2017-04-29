var form = document.getElementById('form-order-form');

form.addEventListener('submit', (e)=>{
  e.preventDefault();
  var data = new FormData(form);
  var productID = data.get('product-id');
  var quantity = data.get('quantity');
  var firstname = data.get('firstname');
  var lastname = data.get('lastname');
  var phone = data.get('phone-number');
  var address = data.get('address');
  var shipping = data.get('shipping');
  var cc1 = data.get('creditCard1');
  var cc2 = data.get('creditCard2');
  var cc3 = data.get('creditCard3');
  var cc4 = data.get('creditCard4');
  var expiry = data.get('expiry');

  function validate() {
    var errors = [];
    if(!phone.match(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/)){
      errors.push("invalid phone number!");
    }
    var validAddress = address.trim().length > 0;
    if(!validAddress){
      errors.push("shipping address can't be blank!");
    }
    if(!expiry.match(/^20(1[89]|[2-9][0-9])-\d\d$/)){
      errors.push("credit card expiration dates must be in the future");
    }
    return errors;
  }

  var errors = validate();
  if ( errors.length === 0 ) {
    form.submit();
  } else {
    alert(errors.join('\n'));
  }
});
