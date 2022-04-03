var tinh = [];
var huyen = [];
fetch("https://provinces.open-api.vn/api/").then(function(e){return e.json()})
.then(function(e){
  var value = `<option value="" selected disabled hidden>--Chọn--</option>`;
  e.forEach(ele => {
    value+= `<option value='${ele.name}'>${ele.name}</option>`
  });
  tinh = e;
  $('#provinces').html(value);
})
// ;for(var n=document.getElementById("provinces"),t=0;t<e.length;t++){var o=document.createElement("option");o.value=`{id:${e[t].code},name: '${e[t].name}'}`,o.innerHTML=e[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)}),document.getElementById("provinces").addEventListener("change",function(){var e=this.value;
//   fetch("https://provinces.open-api.vn/api/p/"+e+"?depth=2").then(function(e){return e.json()}).then(function(e){console.log(e.districts);for(var n=document.getElementById("districts"),t=0;t<e.districts.length;t++){var o=document.createElement("option");o.value=e.districts[t].code,o.innerHTML=e.districts[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)})}),document.getElementById("districts").addEventListener("change",function(){var e=this.value;
//   fetch("https://provinces.open-api.vn/api/d/"+e+"?depth=2").then(function(e){return e.json()}).then(function(e){console.log(e.wards);for(var n=document.getElementById("wards"),t=0;t<e.wards.length;t++){var o=document.createElement("option");o.value=e.wards[t].code,o.innerHTML=e.wards[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)})});

function gettinh(sel) {
    
    let code = (tinh[sel.selectedIndex-1]?.code);
    fetch("https://provinces.open-api.vn/api/p/"+code+"?depth=2").then(function(e){return e.json()}).then(function(e)
    {
      var value = `<option value="" selected disabled hidden>--Chọn--</option>`;
      e.districts.forEach(ele => {
        value+= `<option value='${ele.name}'>${ele.name}</option>`
      });
      huyen = e.districts;
      document.getElementById("districts").disabled = false
      $('#districts').html(value);
    })
}

function gethuyen(sel) {
  let code = (huyen[sel.selectedIndex-1]?.code);
    fetch("https://provinces.open-api.vn/api/d/"+code+"?depth=2").then(function(e){return e.json()}).then(function(e)
    {
      console.log(e);
      var value = `<option value="" selected disabled hidden>--Chọn--</option>`;
      e.wards.forEach(ele => {
        value+= `<option value='${ele.name}'>${ele.name}</option>`
      });
      document.getElementById("wards").disabled = false
      $('#wards').html(value);
    })
}


var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;

document.getElementById("startdateId").value = today;




var dataTable = document.getElementById('data-table');
var checkItAll = dataTable.querySelector('input[name="select_all"]');
var inputs = dataTable.querySelectorAll('tbody>tr>td>input');

checkItAll.addEventListener('change', function() {
  if (checkItAll.checked) {
    inputs.forEach(function(input) {
      input.checked = true;
    });  
  }
});

jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});