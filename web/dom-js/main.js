
document.addEventListener('DOMContentLoaded', function () {
    var div = document.getElementById('div');
    // console.log(div.style);

    var top = getComputedStyle(div).marginTop;
    console.log(top);
});


window.onload = function () {
   // document.write('123asd'); //replace all
};

//
// document.onclick = function(event) {
//     alert(event.type);
// };
//
// document.body.dispatchEvent(new CustomEvent('click'));

// document.forms.myform // form
// document.body.children[0]
// document.forms[0]


var input = document.getElementById('input');

// input.value = 'asd';
input.setAttribute('value', 'asd');
