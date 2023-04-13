function showPurchaseToast() {
    var toast = $('.toast-purchase')
    toast.toast({ autohide: true, delay: 1000 });
    toast.toast('show');
    document.getElementById('toast-purchase').play();
}
function showEquippedToast() {
    var toast = $('.toast-equipped')
    toast.toast({ autohide: true, delay: 1000 });
    toast.toast('show');
    document.getElementById('toast-equip').play();
}
function showFeedToast() {
    var toast = $('.toast-feeding')
    toast.toast({ autohide: true, delay: 1000 });
    toast.toast('show');
    document.getElementById('toast-feed').play();
}
function showTaskToast(){
    var toast = $('.toast-task')
    toast.toast({ autohide: true, delay: 1000 });
    toast.toast('show');
    document.getElementById('toast-task').play();
}