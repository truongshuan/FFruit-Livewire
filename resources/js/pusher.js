// Enable pusher logging - don't include this in production
Pusher.logToConsole = false;
var pusher = new Pusher("b7cede03d4e40abce150", {
    cluster: "ap1",
});
var channel = pusher.subscribe("notifications");
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: "toast-top-center",
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
};
channel.bind("user-register", function (data) {
    toastr.success("Hệ thống vừa ghi nhận 1 tài khoản khách hàng");
});
channel.bind("member-login", function (data) {
    toastr.warning(
        `Quản trị viên ${data.member.name} vừa đăng nhập vào hệ thống`
    );
});
channel.bind("orders", function (data) {
    toastr.info(`Hệ thống ghi nhận đơn hàng mới`);
});
// channel.bind("member-status", function (data) {
//     const userId = data.member.id;
//     const status = data.status;
//     const statusBadge = document.getElementById("status-badge-" + userId);
//     if (status === "online") {
//         statusBadge.innerHTML =
//             '<span class="badge rounded-pill bg-success">Online</span>';
//     } else {
//         statusBadge.innerHTML =
//             '<span class="badge rounded-pill bg-dark">Offline</span>';
//     }
// });
