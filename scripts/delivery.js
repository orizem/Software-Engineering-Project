$(document).ready(function () {
  $("#order").change(function () {
    var selectedOrder = $(this).val();
    $.ajax({
      url: "../php/handleOrder.php",
      type: "get",
      data: { order: selectedOrder },
      success: function (response) {
        document.write("Success handle order.");
        $("#product").html(response);
      },
    });
  });
});

function acceptOrder() {
  window.alert("Order Sent");
}
