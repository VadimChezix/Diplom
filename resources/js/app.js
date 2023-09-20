import './bootstrap';
import IMask from 'imask';

let inputElement = document.getElementById('phone-number');
var maskOptions = {
    mask: '+{7}(000)000-00-00'
  };
  var mask = IMask(inputElement, maskOptions);
  let inputElement1 = document.getElementById('parent-phone');
  var maskOptions1 = {
      mask: '+{7}(000)000-00-00'
    };
    var mask1 = IMask(inputElement1, maskOptions1);
  
