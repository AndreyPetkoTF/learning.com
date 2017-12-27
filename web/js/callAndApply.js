
// call

function showFullNameEasy() {
    console.log(this.firstName + " " + this.lastName);
}

function showFullName(firstPart, lastPart) {
    console.log(this[firstPart] + " " + this[lastPart]);
}

var user = {
    firstName: "Василий",
    lastName: "Петров",
    patronym: "Иванович"
};

showFullNameEasy.call(user);
showFullName.call(user, 'firstName', 'lastName');
showFullName.call(user, 'firstName', 'patronym');


function printArgs() {
    arguments.join = [].join;
    var argStr = arguments.join(':');

    console.log(argStr);
}

printArgs(1, 2, 3);


var obj = {
    0: 'A',
    1: 'B',
    2: 'C',
    3: 'D',
    length: 4
};

//copy method to object
obj.join = [].join;
console.log(obj.join(';'));


//only call other method
console.log([].join.call(obj, ':'));

function printSliceArgs() {
    var args = [].slice.call(arguments);

    console.log(args.join(', '));
}

printSliceArgs('Привет', 'как', 'дела');


// apply

showFullName.apply(user, ['firstName', 'lastName']);


function f() {
    "use strict";
    console.log( this ); // null
}

function f2() {
    console.log( this ); // window
}

f.call(null);
f2.call(null);



function Person() {
    return 1;
}

var person = Person();
var person2 = new Person();

console.log(person);
console.log(person2);


function sumArgs() {
    var args = [].slice.call(arguments);

    var result =  args.reduce(function(a, b) {
        return a + b;
    });

    console.log(result);
}

sumArgs(1, 2, 3);