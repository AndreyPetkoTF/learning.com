var person = {
    name: "Andrey",
    _age: 21,
    get age() {
        return this._age;
    },
    set age(value) {
        this._age = value < 0 ? 0 : value > 122 ? 122 : value;
    }
};

person.age = 150;
console.log(person.age);

var descriptor = Object.getOwnPropertyDescriptor(person, "name");
console.log(descriptor);

Object.defineProperty(person, "gender", {
    value: "male",
    writable: false,
    enumerable: false,
    configurable: false
});

console.log(person.gender);
person.gender = "female";
console.log(person.gender);


// no gender because enumerable = false
for (var property in person) {
    console.log(property);
}

Object.keys(person);
console.log(person.propertyIsEnumerable("gender"));

var obj = {};
Object.preventExtensions(obj); // no new properties
console.log(Object.isExtensible(obj));

obj.x = 123;
console.log(obj.x);

Object.seal(obj); // all conf to false and preventExtensions
Object.isSealed(obj);

Object.freeze(obj); // read only
Object.isFrozen(obj);