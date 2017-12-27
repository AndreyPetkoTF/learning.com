
var table = document.querySelector('table');
var selectedTd;

function highlight(node) {
    if(selectedTd) {
        selectedTd.classList.remove('highlight');
    }

    selectedTd = node;
    selectedTd.classList.add('highlight');
}

table.addEventListener('click', function(event) {
    var target = event.target;

    // table === this
    // while (target !== this) {
    //     if(target.tagName === 'TD') {
    //         highlight(target);
    //         return;
    //     }
    //
    //     target = target.parentNode;
    // }

    var td = target.closest('td');

    if(!td) return;

    if(!table.contains(td)) return;

    highlight(td);
});

function Menu(elem) {
    this.save = function() {
        console.log('saving');
    };

    this.load = function () {
        console.log('loading');
    };

    var self = this;

    elem.onclick = function(e) {
        var target = e.target;
        var action = target.getAttribute('data-action');

        if(action) {
            self[action]();
        }
    }
}

var menu = document.getElementById('menu');
new Menu(menu);

