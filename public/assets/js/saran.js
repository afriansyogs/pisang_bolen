const delayTime = 2500; 

const alertElement = document.getElementById('closeAlert');
setTimeout(function () {
    alertElement.classList.add('hide');
    setTimeout(function () {
        alertElement.remove();
    }, 1000);
}, delayTime);