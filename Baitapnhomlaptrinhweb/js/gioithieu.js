// const content = document.querySelectorAll(".title");
// const button_arows = document.querySelectorAll(".arow_master");
// const overlay = document.querySelector("#overlay");

// // Thêm sự kiện cho từng nút menu
// button_arows.forEach((button, index) => {
//     button.addEventListener('click', () => {
//         // Đóng tất cả menu khác
//         content.forEach((item, i) => {
//             if (i !== index) {
//                 item.classList.remove("content_open"); // Đóng menu khác
//                 button_arows[i].classList.remove('open'); // Đóng mũi tên khác
//             }
//         });
        
//         // Mở hoặc đóng menu hiện tại
//         content[index].classList.toggle("content_open");
//         button.classList.toggle('open');
//         overlay.classList.toggle("show"); // Nếu bạn muốn sử dụng overlay
//     });
// });

// // Bỏ sự kiện cho overlay nếu không cần
// overlay.addEventListener('click', () => {
//     content.forEach((item) => {
//         item.classList.remove("content_open"); // Đóng tất cả
//     });
//     button_arows.forEach((button) => {
//         button.classList.remove('open'); // Đóng mũi tên
//     });
//     overlay.classList.remove("show"); // Nếu bạn muốn sử dụng overlay
// });
