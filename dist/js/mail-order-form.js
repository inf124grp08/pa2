$(function() {
  var form = $('form');
  form.on('submit', (e)=>{
    e.preventDefault();
    var data = form.serialize();
    var productID = data[1].value;
    var quantity = data[2].value;
    var firstname = data[3].value;
    var lastname = data[4].value;
    var phone = data[5].value;
    var address = data[6].value;
    var shipping = data[7].value;
    var cc1 = data[8].value;
    var cc2 = data[9].value;
    var cc3 = data[10].value;
    var cc4 = data[11].value;
    var expiry = data[12].value;
    //FIXME fuck man, I don't know how to get these variables to come out right
    var subject = 'Order From ' + firstname + ' ' + lastname;
    var body = 'Order For: ' + firstname + ' ' + lastname + '\n' +
      'Product ID: ' + productID + '\n' +
      'Quantity: ' + quantity + '\n' +
      'Phone Number: ' + phone + '\n' +
      'Shipping Address:\n' +  firstname + ' ' +  lastname + '\n'
      + address + '\n' +
      'Credit Card: '  + cc1 + '-' + cc2 + '-' + cc3 + '-' + cc4 + '\n' +
      'Expiration Date: ' + expiry + '\n';
    var addr = form.attr('action');
    console.log(body)
    window.open(addr+"?"+data, '_self')
  });
})
