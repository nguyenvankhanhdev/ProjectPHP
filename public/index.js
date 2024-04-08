
function cartPrice() {
    var strikeElement = document.querySelector(".price-strike");
    var strikeText = strikeElement.querySelector("strike").textContent;
    var originalPrice = parseInt(strikeText.replace(/\D/g, ""));
    var discountedPrice = originalPrice - 1000000;
    var saleElement = document.querySelector(".price-sale");
    saleElement.textContent = discountedPrice.toLocaleString() + " đ";
}
cartPrice();



