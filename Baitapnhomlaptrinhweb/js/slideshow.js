let currentIndex = 0;
const images = document.querySelector(".list_images");
const ABCleft = document.querySelector(".ABC.left");
const ABCright = document.querySelector(".ABC.right");
const totalImages = images.children.length;

//  di chuyen đen anh tiep theo
function showNextImage() {
  currentIndex = (currentIndex + 1) % totalImages;
  updateSlidePosition();
}

// Chuyen anh den trc do
function showPreviousImage() {
  currentIndex = (currentIndex - 1 + totalImages) % totalImages; // Quay nguoc
  updateSlidePosition();
}

// Ccap nhat vi tri anh
function updateSlidePosition() {
  images.style.transform = `translateX(-${currentIndex * 100}%)`;
  images.style.transition = "transform 0.5s ease-in-out"; // Thêm hiệu ứng chuyển đổi
}
setInterval(showNextImage, 3000);

// nút bấm qua lại ảnh
ABCright.addEventListener("click", showNextImage);
ABCleft.addEventListener("click", showPreviousImage);
