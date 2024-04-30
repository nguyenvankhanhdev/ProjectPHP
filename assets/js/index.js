document.addEventListener("DOMContentLoaded", function () {
  const checkboxAll = document.querySelector(".check-cart-all input");
  const checkItems = document.querySelectorAll(".check-cart input");
  const totalPriceElement = document.querySelector(".total-price");
  const totalQuantityElement = document.querySelector(".total-quantity");

  checkboxAll.addEventListener("change", function () {
    checkItems.forEach((item) => {
      item.checked = checkboxAll.checked;
    });
    updateTotal();
  });
  checkItems.forEach((item) => {
    item.addEventListener("change", function () {
      updateTotal();
    });
  });

  function updateTotal() {
    let totalQuantity = 0;
    let totalPrice = 0;

    checkItems.forEach((item) => {
      if (item.checked) {
        const productInfo = item.parentElement.parentElement;
        const quantityElement = productInfo.querySelector("#value");
        const priceElement = productInfo.querySelectorAll(
          ".button-container span"
        )[1];
        const quantity = parseInt(quantityElement.textContent);
        const price = parseInt(priceElement.textContent.replace(/\D/g, ""));
        totalQuantity += quantity;
        totalPrice += price;
      }
    });
    totalQuantityElement.textContent = `Số lượng: ${totalQuantity}`;
    totalPriceElement.textContent = `Đơn giá: ${totalPrice.toLocaleString()}đ`;
  }
  function checkCart() {
    const cartFooter = document.querySelector(".checkout");
    const emptyCart = document.querySelector(".empty-cart");
    const cartItems = document.querySelectorAll(".cart-product");
    const count = document.querySelector(".count-cart");

    if (cartItems.length === 0) {
      emptyCart.style.display = "";
      cartFooter.style.display = "none";
    
    } else {
      emptyCart.style.display = "none";
      cartFooter.style.display = "";
    }
  }

  checkCart();

  const valueElements = document.querySelectorAll("#value");
  const plusButtons = document.querySelectorAll(".plus");
  const minusButtons = document.querySelectorAll(".minus");
  const cart_ids = document.querySelectorAll('input[name="cart_id"]');
  const salePrices = document.querySelectorAll(".sale-price");
  const productPrice = document.querySelectorAll(".product_price");

  plusButtons.forEach((plusButton, index) => {
    plusButton.addEventListener("click", function (e) {
      e.preventDefault();
      let value = parseInt(valueElements[index].textContent);
      value++;
      valueElements[index].textContent = value;
      const salePrice = parseFloat(
        salePrices[index].textContent.replace(/[^\d.-]/g, "")
      );
      const sum = salePrice * value;
      productPrice[index].textContent = `${sum.toLocaleString()}đ`;
      const cartId = cart_ids[index].value;
      updateCartQuantity(cartId, value);
    });
  });

  minusButtons.forEach((minusButton, index) => {
    minusButton.addEventListener("click", function (e) {
      e.preventDefault();
      let value = parseInt(valueElements[index].textContent);
      if (value > 0) {
        value--;
        valueElements[index].textContent = value;
        const cartId = cart_ids[index].value;
        const salePrice = parseFloat(
          salePrices[index].textContent.replace(/[^\d.-]/g, "")
        );
        const sum = salePrice * value;
        productPrice[index].textContent = `${sum.toLocaleString()}đ`;
        updateCartQuantity(cartId, value);
      }
    });
  });

  function updateCartQuantity(cartId, quantity) {
    $.ajax({
      url: "http://localhost:8080/Project_php/resources/cart.php",
      type: "POST",
      contentType: "application/json",
      data: JSON.stringify({ cart_id: cartId, quantity: quantity }),
      success: function (response) {
        console.log(response);
        const responseData = JSON.parse(response);
        
        if (responseData.success) {
          if (quantity === 0) {
            const productToRemove = document.querySelector(
              '[data-cart-id="' + cartId + '"]'
            );
            if (productToRemove) {
              productToRemove.parentNode.removeChild(productToRemove);
              checkCart(); 
            }
          }
          console.log("Đã cập nhật thành công!");
        } else {
          console.log("Có lỗi xảy ra khi cập nhật giỏ hàng");
        }
      },
      error: function (xhr, status, error) {
        console.error("Có lỗi xảy ra khi gửi yêu cầu:", error);
      },
    });
  }
});

function checkout() {
  const checkedItems = [];
  const address = [];
  const username = document.querySelector('input[name="order_username"]').value;
  const phoneNumber = document.querySelector(
    'input[name="phone_checkout"]'
  ).value;
  const province = document.getElementById("province").value;
  const district = document.getElementById("district").value;
  const ward = document.getElementById("wards").value;
  const streetName = document.querySelector('input[name="tenduong"]').value;

  const checkItems = document.querySelectorAll(
    '.check-cart input[type="checkbox"]'
  );

  checkItems.forEach((item) => {
    if (item.checked) {
      const productInfo = item.parentElement.parentElement;
      const productPrice = parseInt(
        productInfo
          .querySelectorAll(".button-container span")[1]
          .textContent.replace(/\D/g, "")
      );
      const quantity = parseInt(
        productInfo.querySelector("#value").textContent
      );
      const id = productInfo.querySelector('input[name="id_item"]').value;
      checkedItems.push({ productPrice, quantity, id });
    }
  });

  if (!province || !district || !ward || !streetName) {
    alert("Vui lòng nhập đầy đủ thông tin địa chỉ.");
    return;
  }
  const fullAddress = `${province}, ${district}, ${ward}, ${streetName}`;
  address.push(fullAddress);

  $.ajax({
    url: "http://localhost:8080/Project_php/public/checkout.php",
    type: "POST",
    contentType: "application/json",
    data: JSON.stringify({ username, phoneNumber, address, checkedItems }),
    success: function (response) {
      var $responseHtml = $(response);
      var order_id = $responseHtml.find(".order_id").text().trim();
      if (order_id) {
        var redirectURL =
          "http://localhost:8080/Project_php/public/thank_you.php?order_id=" +
          order_id;
        window.location.href = redirectURL;
      } else {
        console.error("Không tìm thấy giá trị order_id trong response HTML.");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error:", error, " trạng thái", status);
    },
  });
}

document.querySelector(".btn-primary").addEventListener("click", function (e) {
  e.preventDefault();
  const checkedItems = document.querySelectorAll(
    '.check-cart input[type="checkbox"]'
  );
  let cartChecked = false;
  checkedItems.forEach((item) => {
    if (item.checked) {
      cartChecked = true;
    }
  });

  if (!cartChecked) {
    alert("Vui lòng chọn ít nhất một sản phẩm");
    return;
  }
  checkout();
});

/// Hiển thị số lượng sp cart

/// tỉnh thành
$(document).ready(function () {
  $("#province").on("change", function () {
    var province_id = $(this).val();
    if (province_id) {
      $.ajax({
        url: "../public/ajax_get_district.php",
        method: "GET",
        dataType: "json",
        data: {
          province_id: province_id,
        },
        success: function (data) {
          $("#district").empty();

          $.each(data, function (i, district) {
            $("#district").append(
              $("<option>", {
                value: district.id,
                text: district.name,
              })
            );
          });
          $("#wards").empty();
        },
        error: function (xhr, textStatus, errorThrown) {
          console.log("Error: " + errorThrown);
        },
      });
      $("#wards").empty();
    } else {
      $("#district").empty();
    }
  });

  $("#district").on("change", function () {
    var district_id = $(this).val();
    if (district_id) {
      $.ajax({
        url: "../public/ajax_get_wards.php",
        method: "GET",
        dataType: "json",
        data: {
          district_id: district_id,
        },
        success: function (data) {
          $("#wards").empty();
          $.each(data, function (i, wards) {
            $("#wards").append(
              $("<option>", {
                value: wards.id,
                text: wards.name,
              })
            );
          });
        },
        error: function (xhr, textStatus, errorThrown) {
          console.log("Error: " + errorThrown);
        },
      });
    } else {
      $("#wards").empty();
    }
  });
});
