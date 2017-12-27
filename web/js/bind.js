
function bind(func, context) {
    return function() {
        return func.apply(context, arguments);
    }
}

function f(a, b) {
    console.log('______');
    console.log(this);
    console.log(a + b);
}

var g = bind(f, "Context");
g(1, 2);


var user = {
    firstName: "Вася",
    sayHi: function () {
        console.log(this.firstName);
    },
    sayHiWho: function (who) {
        console.log(this.firstName + ": Привет, " + who);
    }
};

// setTimeout(bind(user.sayHi, user), 100);

var sayHi = bind(user.sayHiWho, user);

sayHi("Петя");
sayHi("Маша");


// built in method bind

var g = f.bind("Context");
g(1, 2);

// Если указаны аргументы arg1, arg2... – они будут прибавлены к каждому вызову новой функции,
// причем встанут перед теми, которые указаны при вызове.
var wrapper = f.bind("Context", 1, 2);
wrapper();
