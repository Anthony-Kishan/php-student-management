let content = document.querySelector('.message');

setTimeout(() => {
    content.classList.add('d-none');
}, 3000);


// AJAX REQUEST TO FETCH DATA AND SHOW ON A MODAL
$(document).ready(function () {
    $('.view-data').click(function (e){
        e.preventDefault();

        var studentId = $(this).data('id');

        $.ajax({
            url: './student/info_modal.php',
            method: 'GET',
            data: { sl: studentId },
            success: function (response){
                $('#info_modal .modal-body').html(response);

                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('info_modal'));
                myModal.show();
            },
            error: function(){
                alert('An error occured while fetching student data.');
            }

        })

    })
})