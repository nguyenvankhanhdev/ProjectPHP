
function cartPrice() {
    var strikeElement = document.querySelector(".price-strike");
    var strikeText = strikeElement.querySelector("strike").textContent;
    console.log(strikeText);

    var originalPrice = parseInt(strikeText.replace(/\D/g, ""));
    console.log(originalPrice);

    var discountedPrice = originalPrice - 1000000;
    console.log(discountedPrice);

    var saleElement = document.querySelector(".price-sale");
    console.log(saleElement);
    
    saleElement.textContent = discountedPrice.toLocaleString() + " đ";
    console.log(saleElement.textContent);
}
cartPrice();