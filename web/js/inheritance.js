// 1. Конструктор Animal
function Animal(name) {
    this.name = name;
    this.speed = 0;
}

// 1.1. Методы -- в прототип

Animal.prototype.stop = function() {
    this.speed = 0;
    alert( this.name + ' стоит' );
};

Animal.prototype.run = function(speed) {
    this.speed += speed;
    alert( this.name + ' бежит, скорость ' + this.speed );
};

// 2. Конструктор Rabbit
function Rabbit(name) {
    this.name = name;
    this.speed = 0;
}

// 2.1. Наследование
Rabbit.prototype.__proto__ = Animal.prototype;
// Rabbit.prototype = Object.create(Animal.prototype); // old ie
Rabbit.prototype.constructor = Rabbit;

// 2.2. Методы Rabbit
Rabbit.prototype.jump = function() {
    this.speed++;
    alert( this.name + ' прыгает, скорость ' + this.speed );
};

Rabbit.prototype.run = function () {
    Animal.prototype.run.apply(this, arguments);
    this.jump();
};

var rabbit = new Rabbit('Кроль');

rabbit.run(5);