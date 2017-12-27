
function factorial(number) {
    if (number !== 1) {
        return number * factorial(number - 1);
    }

    return 1;
}


var result = factorial(5);
// console.log(result);

// alert( 20e-1['toString'](2) );


// var arr = [1,5,3,10,20, 10, 2];
//
// var sa  =arr.reduce(function(prev, item) { return Math.max(prev, item) });
// console.log(sa);

// "use strict";
//
// var user = {
//     sayHi: function() {
//         alert(this);
//     }
// };
// (user.sayBye = user.sayHi)();

// var f = function g(){ return 23; };
// alert( typeof g() );

// var arr = [1, 2, 3];
// arr.something = 5;
//
// alert(arr.something); // 5


// console.log([] + false - null + true); / NAN

// var arr = [];
// arr[1] = 1;
// arr[3] = 33;
//
// console.log(arr);
// console.log(arr.length); // 4

// function User() { }
// User.prototype = { adminasd: 'sad'};
//
// var user = new User();
// alert(user.adminasd); //sad

// function User() { }
//
// var vasya = new User();
//
// vasya.__proto__.name = "Vasya";
//
// console.log(vasya.__proto__.name); //vas
// // console.log(vasya.prototype.name);
// // console.log(User.__proto__.name);
// console.log(User.prototype.name); //vas

// f.call(f);
//
// function f() {
//     alert( this );
// }

