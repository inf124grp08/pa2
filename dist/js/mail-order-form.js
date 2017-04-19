$(function() {
  var form = $('form');
  form.on('submit', (e)=>{
    e.preventDefault();
    var data = form.serialize();
    var subject = data[0].value;
    var body = data[1].value;
    var addr = form.attr('action');
    console.log(data);
    window.open(addr+"?"+data, '_self')
  });
})
