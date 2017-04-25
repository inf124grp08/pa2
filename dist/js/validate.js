function validate() {
  var form = $('form');
  var data = form.serializeArray();
  console.log(data);
  var productID = data[1].value;
  var quantity = data[2].value;
  var firstname = data[3].value;
  var lastname = data[4].value;
  var phone = data[5].value;
  if(!phone.match(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/)){
    alert("invalid phone number!");
    return false;
  }
  var address = data[6].value;
  var validAddress = new RegExp('\\s*\\d{1,10}\\s.{3,30}[\\n\\r]\\s*.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)(\\s|,\\s)(\\d{5}|\\d{5}[-\\s]\\d{4})\\s*$');
  if(!validAddress.test(address)){
    console.log(validAddress);
    alert("invalid shipping address!");
    return false;
  }
  var shipping = data[7].value;
  var cc1 = data[8].value;
  var cc2 = data[9].value;
  var cc3 = data[10].value;
  var cc4 = data[11].value;
  var expiry = data[12].value;
  //return false;
}
