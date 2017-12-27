
var Person, person;

Person = function (name) {
    this.name = name;
};

Person.prototype.greet = function () {
    console.log("Hi " + this.name);
};

Person.prototype.toString = function () {
    return this.name;
};

Person.prototype.valueOf = function () {
    return 100;
};

person = new Person("Jack");
console.log(person.name);
console.log(person instanceof Person);
console.log(Person.prototype.isPrototypeOf(person));

Developer = function(name, skills) {
    Person.apply(this, arguments);
    this.skills = skills || [];
};

Developer.prototype = Object.create(Person.prototype);
Developer.prototype.constructor = Developer;

developer = new Developer("John", ["ruby", "mysql"]);

console.log(developer.skills);

console.log(developer.toString());

console.log("The name is: " + developer);
console.log([1, 2, 3].toString());
console.log(+developer);


console.log(Object.prototype.toString.call([]));
console.log(Object.prototype.toString.call(function(){}));

console.log(Object.prototype.toString.call("gdf"));
console.log(Object.prototype.toString.call(false));

var classof = function (object) {
    return Object.prototype.toString.call(object).slice(8, -1);
};

console.log(classof(""));
console.log(classof(person));