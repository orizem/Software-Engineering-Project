$(document).ready(function () {
  $("#order").change(function () {
    var selectedOrder = $(this).val();
    $.ajax({
      url: "../php/handleOrder.php",
      type: "get",
      data: { order: selectedOrder },
      success: function (response) {
        // Update the content of the div with the response
        $("#product").html(response);
      },
    });
  });
});
