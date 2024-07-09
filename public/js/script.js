$(document).ready(function() {
    $("#memberForm").submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            url: "add_member.php",
            type: "POST",
            data: formData,
            success: function(response) {
                alert(response); // Display success/error message
                // You can reset the form here if needed
            }
        });
    });
});
