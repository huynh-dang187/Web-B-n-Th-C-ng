function updatePrice() {
  var priceRange = document.getElementById("price-range");
  var maxPrice = document.getElementById("max-price");
  maxPrice.innerText = new Intl.NumberFormat("vi-VN", {
    style: "currency",
    currency: "VND",
  }).format(priceRange.value);
}
