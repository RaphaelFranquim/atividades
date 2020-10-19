$(document).ready(() => {
    $('#form-gender').on('submit', e => {
        e.preventDefault();

        const formGenderData = $('#form-gender').serializeArray();
        
        console.log(formGenderData);

        $.ajax({
            url: 'postGender.php',
            method: 'POST',
            data: {
                gender: formGenderData[0].value 
            },
            success: response => {
                console.log(response);
            }
        })
    })
})