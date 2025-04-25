document.addEventListener("DOMContentLoaded", () => {
  // Cập nhật ngày hiện tại cho trường chọn ngày
  const dateInput = document.getElementById("appointment-date");
  const today = new Date().toISOString().split("T")[0];
  dateInput.setAttribute("min", today);

  // Xử lý khi người dùng chọn ngày, cập nhật giờ cho trường chọn giờ
  const timeSelect = document.getElementById("appointment-time");

  dateInput.addEventListener("change", () => {
    const selectedDate = new Date(dateInput.value);
    const currentDate = new Date();

    // Xóa các option giờ cũ
    timeSelect.innerHTML = "";

    // Nếu chọn ngày là ngày hiện tại, chỉ cho phép các giờ sau giờ hiện tại
    if (
      selectedDate.getFullYear() === currentDate.getFullYear() &&
      selectedDate.getMonth() === currentDate.getMonth() &&
      selectedDate.getDate() === currentDate.getDate()
    ) {
      const currentHour = currentDate.getHours() + 1;
      for (let hour = currentHour; hour <= 18; hour++) {
        const option = document.createElement("option");
        option.value = `${hour}:00`;
        option.textContent = `${hour}:00`;
        timeSelect.appendChild(option);
      }
    } else {
      // Nếu ngày chọn không phải ngày hiện tại, cho phép chọn từ 9:00 đến 18:00
      for (let hour = 9; hour <= 18; hour++) {
        const option = document.createElement("option");
        option.value = `${hour}:00`;
        option.textContent = `${hour}:00`;
        timeSelect.appendChild(option);
      }
    }
  });

//   // Xử lý khi người dùng nhấn nút "Xác Nhận Đặt Lịch"
//   const submitButton = document.querySelector(".submit-button");

//   submitButton.addEventListener("click", (event) => {
//     event.preventDefault();

//     // Lấy thông tin từ form
//     const petType = document.getElementById("pet-type").value;
//     const location = document.getElementById("coso-type").value;
//     const selectedServices = Array.from(
//       document.querySelectorAll("input[name='dichvuspa']:checked")
//     ).map((service) => service.value);
//     const date = document.getElementById("appointment-date").value;
//     const time = document.getElementById("appointment-time").value;
//     const name = document.getElementById("customer-name").value.trim();
//     const email = document.getElementById("customer-name").value.trim();
//     const phone = document.getElementById("customer-phone").value.trim();
//     const description = document.getElementById("description").value.trim();

//     // Kiểm tra các trường thông tin
//     if (
//       !petType ||
//       !location ||
//       selectedServices.length === 0 ||
//       !date ||
//       !time ||
//       !name ||
//       !email ||
//       !phone
//     ) {
//       alert("Vui lòng điền đầy đủ thông tin.");
//       return;
//     }

//     const appointmentData = {
//       petType,
//       location,
//       selectedServices,
//       date,
//       time,
//       name,
//       email,
//       phone,
//       description,
//     };

//     console.log("Dữ liệu đặt lịch:", appointmentData);
//     alert("Đặt lịch thành công!");

//     // Reset form sau khi đặt lịch thành công
//     document.querySelector("form").reset();
//   });
});
