let promise = new Promise((resolve, reject) => {
    setTimeout(() => {
        resolve("result");
    }, 1000);
});


promise
    .then(result => {
            alert('Fulfilled: ' + result);
        },
        error => {
            alert('Rejected:' + error);
        }
    );