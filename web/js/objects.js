
var Person = {
    constructor: function (name, age, gender) {
        this.name = name;
        this.age = age;
        this.gender = gender;
        return this;
    },
    greet: function () {
        console.log("Hi " + this.name);
    }
};

var person, anotherPerson, thirdPerson;

person = Object.create(Person).constructor("John", 35, "male");
anotherPerson = Object.create(Person).constructor("Joh", 33, "male");
thirdPerson = Object.create(Person).constructor("Bruce", 31, "female");

// console.log(person.name);
// console.log(person.greet());
//
// console.log(anotherPerson.name);
// console.log(anotherPerson.greet());
//
// console.log(Person.isPrototypeOf(person));


var WebDeveloper = Object.create(Person);

WebDeveloper.constructor = function (name, age, gender, skills) {
    Person.constructor.apply(this, arguments);
    this.skills = skills || [];
    return this;
};

WebDeveloper.develop = function () {
    console.log("Working...");
};

var developer = Object.create(WebDeveloper).constructor("Jack", 21, "Male", [
   "html", "css"
]);

console.log(developer.skills);
developer.develop();