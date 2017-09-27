$(document).ready(function () {
    $('#dogCheckbox').change(function () {
        if(this.checked){
            $('#incDog').removeClass('hidden');
        }else {
            $('#incDog').addClass('hidden');
        }

    });
});