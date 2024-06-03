function showToastify(msg,classname,duration='3000'){
    Toastify({
        newWindow: true,
        text: msg,
        gravity: "top",
        position: "right",
        className: classname,
        stopOnFocus: true,
        duration: duration,
        close:true,
    }).showToast();
}

function triggerSuccess(msg,duration='3000'){
    showToastify(msg,'bg-success',duration)
}
function triggerError(msg,duration='3000'){
    showToastify(msg,'bg-danger',duration)
}
function triggerWarning(msg,duration='3000'){
    showToastify(msg,'bg-warning',duration)
}
