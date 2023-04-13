function showPurchaseToast() {
    var toast = $('.toast-purchase')
    toast.toast({ autohide: true, delay: 1000 });
    toast.toast('show');
    document.getElementById('toast-success').play();
}
function showLossToast() {
    var toast = $('.toast-loss')
    toast.toast({ autohide: true, delay: 500 });
    toast.toast('show');
    document.getElementById('toast-warning').play();
}