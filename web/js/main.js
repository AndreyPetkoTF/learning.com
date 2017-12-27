// var arr = [3, 4, 5];
// Array.prototype.each = function() {/*some fancy polyfill*/};
//
// for (var i in arr) {
//     if(arr.hasOwnProperty(i)) {
//         console.log(i);
//     }
// }

// myname = "global";
// function func() {
//     var myname;
//     console.log(myname); // "undefined"
//     myname = "local";
//     console.log(myname); // "local"
// }
// func();


function Person() {
    return 1;
}

var person = Person(); // 1
var person2 = new Person(); // Person {}