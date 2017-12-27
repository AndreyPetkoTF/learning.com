var createHelloFunction = function (name) {
    return function () {
        alert('Hello, ' + name);
    }
};

var sayHelloWorld = createHelloFunction('World');
// sayHelloWorld();

Function.prototype.bind = function (context) {
    var fn = this;
    return function () {
        return fn.apply(context, arguments);
    }
};

var HelloPage = {
    name: 'Name',
    init: function () {
        console.log('Hello, ' + this.name);
    }
};

window.onload = HelloPage.init.bind(HelloPage);

var links = document.getElementsByTagName('a');

for (var i = 0; i < links.length; i++) {
    // i always last item
    // links[i].onclick = function () {
    //     alert(i);
    // }

    (function (i) {
        links[i].onclick = function () {
            alert(i);
        };
    })(i);
}

var MyModule = (function() {
    var name = 'Hello';
    function sayPreved() {
        console.log('PREVED ' + name.toUpperCase());
    }
    return {
        sayPrevedToHabrahabr: function() {
            sayPreved(name);
        }
    }
})();

MyModule.sayPrevedToHabrahabr(); //alerts «PREVED Habrahabr»


var counter = (function () {
  var count = 0;

  return function () {
      return count++;
  }
})();

console.log(counter());
console.log(counter());
console.log(counter());
