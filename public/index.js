
// function cartPrice() {
//     var strikeElement = document.querySelector(".price-strike");
//     var strikeText = strikeElement.querySelector("strike").textContent;
//     var originalPrice = parseInt(strikeText.replace(/\D/g, ""));
//     var discountedPrice = originalPrice - 1000000;
//     var saleElement = document.querySelector(".price-sale");
//     saleElement.textContent = discountedPrice.toLocaleString() + " đ";
// }
// cartPrice();

document.addEventListener('DOMContentLoaded', function () {
  const checkboxAll = document.querySelector('.check-cart-all input');
  const checkItems = document.querySelectorAll('.check-cart input');
  const totalPriceElement = document.querySelector('.total-price');
  const totalQuantityElement = document.querySelector('.total-quantity');

  checkboxAll.addEventListener('change', function () {
    checkItems.forEach(item => {
      item.checked = checkboxAll.checked;
    });
    updateTotal();
  });

  checkItems.forEach(item => {
    item.addEventListener('change', function () {
      updateTotal();
    });
  });

  function updateTotal() {
    let totalQuantity = 0;
    let totalPrice = 0;

    checkItems.forEach(item => {
      if (item.checked) {
        const productInfo = item.parentElement.parentElement;
        const quantityElement = productInfo.querySelector('#value');
        const priceElement = productInfo.querySelectorAll('.button-container span')[1];
        const quantity = parseInt(quantityElement.textContent);
        const price = parseInt(priceElement.textContent.replace(/\D/g, ''));
        totalQuantity += quantity;
        totalPrice += price;
      }
    });
    totalQuantityElement.textContent = `Số lượng: ${totalQuantity}`;
    totalPriceElement.textContent = `Đơn giá: ${totalPrice.toLocaleString()}đ`;
  }

  function checkout() {
    const checkedItems = [];
    const address = [];
    let cartEmpty = true;
    let cartChecked = false;

    checkItems.forEach(item => {
      if (item.checked) {
        const productInfo = item.parentElement.parentElement;
        const productPrice = parseInt(productInfo.querySelectorAll('.button-container span')[1].textContent.replace(/\D/g, ''));
        const quantity = parseInt(productInfo.querySelector('#value').textContent);
        const id = productInfo.querySelector('input[name="id_item"]').value;
        checkedItems.push({ productPrice, quantity,id });
        // itemsToRemove.push();
        cartEmpty = false;
        cartChecked = true;
      }
    });

    // if (cartEmpty) {
    //   const h1 = document.createElement('h1');
    //   h1.textContent = 'Chưa có sản phẩm nào trong giỏ hàng';
    //   document.body.appendChild(h1);
    //   const cartFooter = document.querySelector('.cart-footer');
    //   if (cartFooter) {
    //     cartFooter.style.display = 'none';
    //   }
    //   return; 
    // }
    if (!cartChecked) {
      alert('Vui lòng chọn ít nhất một sản phẩm');
      return;
    }
    const username = document.querySelector('input[name="order_username"]').value;
    const phoneNumber = document.querySelector('input[name="phone_checkout"]').value;
    const province = document.getElementById('province').value;
    const district = document.getElementById('district').value;
    const ward = document.getElementById('wards').value;
    const streetName = document.querySelector('input[name="tenduong"]').value;

    if (!province || !district || !ward || !streetName) {
      alert('Vui lòng nhập đầy đủ thông tin địa chỉ.');
      return;
    }
    const fullAddress = `${province}, ${district}, ${ward}, ${streetName}`;
    address.push(fullAddress);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://localhost:8080/Project_php/public/checkout.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          alert('Đã thanh toán thành công!');
          location.reload();
        } else {
          alert('Có lỗi xảy ra khi thanh toán', xhr.responseText);
        }
      }
    };
    xhr.send(JSON.stringify({ username, phoneNumber, address, checkedItems }));
    console.log(JSON.stringify({ username, phoneNumber, address, checkedItems }));
  }

  document.querySelector('.btn-primary').addEventListener('click', function () {
    checkout();
  });
});

///// tỉnh thành
$(document).ready(function () {
  $('#province').on('change', function () {
    var province_id = $(this).val();
    if (province_id) {
      $.ajax({
        url: '../public/ajax_get_district.php',
        method: 'GET',
        dataType: "json",
        data: {
          province_id: province_id
        },
        success: function (data) {
          $('#district').empty();

          $.each(data, function (i, district) {
            $('#district').append($('<option>', {
              value: district.id,
              text: district.name
            }));
          });
          $('#wards').empty();
        },
        error: function (xhr, textStatus, errorThrown) {
          console.log('Error: ' + errorThrown);
        }
      });
      $('#wards').empty();
    } else {
      $('#district').empty();
    }
  });

  $('#district').on('change', function () {
    var district_id = $(this).val();
    if (district_id) {
      $.ajax({
        url: '../public/ajax_get_wards.php',
        method: 'GET',
        dataType: "json",
        data: {
          district_id: district_id
        },
        success: function (data) {
          $('#wards').empty();
          $.each(data, function (i, wards) {
            $('#wards').append($('<option>', {
              value: wards.id,
              text: wards.name
            }));
          });
        },
        error: function (xhr, textStatus, errorThrown) {
          console.log('Error: ' + errorThrown);
        }
      });
    } else {
      $('#wards').empty();
    }
  });
});













