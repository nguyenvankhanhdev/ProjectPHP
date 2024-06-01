let count = 0;
const value = document.querySelector("#value");
const btns = document.querySelectorAll(".btn");
btns.forEach(function (btn) {
  btn.addEventListener("click", function (e) {
    const styles = e.currentTarget.classList;
    if (styles.contains("decrease")) {
      count--;
    } else if (styles.contains("increase")) {
      count++;
    } else {
      count = 0;
    }
    if (count > 0) {
      value.style.color = "#fff";
    }
    if (count < 0) {
      value.style.color = "red";
    }
    if (count === 0) {
      value.style.color = "#fff";
    }
    value.textContent = count;
  });
});

document.addEventListener("DOMContentLoaded", function () {
  let apiData;
  let selectedBrands = [];
  let selectedPrices = [];
  let currentPage = 0;
  const productsPerPage = 9;
  const productsDiv = document.getElementById("products");

  function fetchNextPage() {
    if (hasNextPage()) {
      const nextPageStartIndex = currentPage * productsPerPage;
      const nextPageEndIndex = nextPageStartIndex + productsPerPage;
      const nextPageData = apiData.slice(nextPageStartIndex, nextPageEndIndex);
      currentPage++;
      displayProducts(nextPageData);
    }
  }

  function hasNextPage() {
    return currentPage * productsPerPage < apiData.length;
  }

  const checkboxAll_Brand = document.getElementById("checkbox_all");
  const checkboxAll_Price = document.getElementById("checkbox_all_price");

  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  const catId = urlParams.get("cat_id");
  const brandId = urlParams.get("brand_id");

  let apiUrl = `http://localhost:8080/Project_php/public/api.php?cat_id=${catId}`;
  if (brandId) {
    apiUrl += `&brand_id=${brandId}`;
  }

  fetch(apiUrl)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      apiData = data;
      fetchNextPage();
    })
    .catch((error) => {
      console.error("There was a problem with your fetch operation:", error);
    });
  const checkboxesBrand = document.querySelectorAll(".checkInput_brand");
  const checkboxesPrice = document.querySelectorAll(".checkInput_price");
  checkboxesBrand.forEach((checkbox) => {
    checkbox.addEventListener("change", filterProducts);
  });
  checkboxesPrice.forEach((checkbox) => {
    checkbox.addEventListener("change", filterProducts);
  });
  function filterProducts() {
    if (Array.from(checkboxesBrand).some((checkbox) => checkbox.checked)) {
      checkboxAll_Brand.checked = false;
    } else {
      checkboxAll_Brand.checked = true;
    }

    if (Array.from(checkboxesPrice).some((checkbox) => checkbox.checked)) {
      checkboxAll_Price.checked = false;
    } else {
      checkboxAll_Price.checked = true;
    }

    selectedBrands = Array.from(checkboxesBrand)
      .filter(
        (checkbox) =>
          checkbox.checked && checkbox.getAttribute("data-value") !== "all"
      )
      .map((checkbox) => parseInt(checkbox.getAttribute("data-value")));

    selectedPrices = Array.from(checkboxesPrice)
      .filter(
        (checkbox) =>
          checkbox.checked && checkbox.getAttribute("data-value") !== "all"
      )
      .map((checkbox) => parseInt(checkbox.getAttribute("data-value")));

    let filteredData = apiData;

    if (selectedBrands.length > 0) {
      filteredData = filteredData.filter((product) =>
        selectedBrands.includes(product.brand_id)
      );
    }

    if (selectedPrices.length > 0) {
      filteredData = filteredData.filter((product) =>
        selectedPrices.includes(getPriceCategory(product.product_price))
      );
    }
    productsDiv.innerHTML = "";

    currentPage = 0;
    displayProducts(filteredData);
  }

  function getPriceCategory(price) {
    if (price < 2000000) {
      return 2;
    } else if (price >= 2000000 && price <= 4000000) {
      return 3;
    } else if (price > 4000000 && price < 7000000) {
      return 4;
    } else if (price >= 7000000 && price < 13000000) {
      return 5;
    } else {
      return 6;
    }
  }

  function displayProducts(data) {
    data.forEach((product) => {
      const discountedPrice = product.product_price + 2000000;
      const html = `
        <div class="cart-item">
            <div class="cart-product-img">
                <a href="./details.php?id=${
                  product.product_id
                }" target="_blank">
                    <img class="cart-img" src="../assets/img/${
                      product.product_image
                    }" alt="">
                </a>
                <div class="cart-product-label">
                    <div class="badge-warning">Trả góp 0%</div>
                    <div class="badge-primary">Giảm 2.000.000đ</div>
                </div>
            </div>
            <div class="cart-product">
                <h3><a href="">${product.product_title}</a></h3>
                <div class="circle-color">
                    <div class="circle-item pink" style="background:#2D2926"></div>
                    <div class="circle-item pink" style="background:#4F5A61"></div>
                    <div class="circle-item pink" style="background:#D5CDC1"></div>
                    <div class="circle-item pink" style="background:#74424F"></div>
                </div>
                <div class="cart-price">
                    <div class="price-sale">${product.product_price.toLocaleString()} đ</div>
                    <div class="price-strike">
                        <strike>${discountedPrice.toLocaleString()}đ</strike>
                    </div>
                </div>
            </div>
            <div class="cart-btn">
                <div class="btn-buynow">
                    <a href="../resources/cart.php?add=${
                      product.product_id
                    }">Mua ngay</a>
                </div>
                <div class="btn-buynow">
                    <a href="./categories.php?cat_id=1&wishlists=${
                      product.product_id
                    }">Yêu Thích</a>
                </div>
            </div>
        </div>
        `;
      productsDiv.insertAdjacentHTML("beforeend", html);
    });
  }

  document
    .getElementById("btn-loadmore")
    .addEventListener("click", function () {
      fetchNextPage();
    });
  checkboxAll_Brand.addEventListener("change", function () {
    if (this.checked) {
      checkboxesBrand.forEach((checkbox) => {
        checkbox.checked = false;
      });
      filterProducts();
    }
  });

  checkboxAll_Price.addEventListener("change", function () {
    if (this.checked) {
      checkboxesPrice.forEach((checkbox) => {
        checkbox.checked = false;
      });
      filterProducts();
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementsByClassName("review")
    .addEventListener("click", function (event) {
      event.preventDefault();
      var contentElement = document.getElementById("well");
      contentElement.scrollIntoView({ behavior: "smooth", block: "start" });
    });
});
const rv = document.getElementsByClassName("review");
console.log(rv);

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("question")
    .addEventListener("click", function (event) {
      event.preventDefault();
      var contentElement = document.getElementById("media");
      contentElement.scrollIntoView({ behavior: "smooth", block: "start" });
    });
});
function detailsPrice() {
  const priceDetailsElement = document.querySelector(".price_details");
  const strikeText = priceDetailsElement.querySelector("strike").textContent;
  const originalPrice = parseInt(strikeText.replace(/\D/g, ""));
  const discountedPrice = originalPrice - 1000000;
  const priceElement = priceDetailsElement.querySelector(".price");
  priceElement.textContent = "Giá: " + discountedPrice.toLocaleString() + "đ";
}

detailsPrice();
