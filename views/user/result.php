<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện click
        document.getElementById('continue').addEventListener('click', function() {
            // Cuộn xuống 100vh
            window.scrollBy({
                top: window.innerHeight, // Cuộn xuống 1 khoảng 100vh
                behavior: 'smooth' // Hiệu ứng cuộn mượt mà
            });
        });

        // Lắng nghe sự kiện cuộn
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY; // Lấy vị trí cuộn hiện tại
            const threshold = window.innerHeight * 0.3; // Tính 20vh

            // Kiểm tra nếu vị trí cuộn lớn hơn 40vh
            if (scrollPosition > threshold) {
                document.getElementById('continue').style.opacity = '0'; // Đặt opacity thành 0
            } else {
                document.getElementById('continue').style.opacity = '1'; // Đặt opacity trở lại 1
            }
        });
    });
</script>

<div class="container d-flex justify-content-center mt-5">
    <div class="col-12 col-md-8 col-lg-6 d-flex flex-column gap-3 gap-lg-0 card-result p-3 rounded-4 mb-lg-0 shadow">
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Họ và tên<span class="mx-1">/</span>Full Name
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][0] ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Ngày sinh<span class="mx-1">/</span>Date of birth
            </div>
            <div class="fw-info fs-4">
            <?= $_SESSION['temp']['result'][2] ?? '<span class="small text-muted fst-italic">(trống)</span>' ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Số phòng<span class="mx-1">/</span>No. room
            </div>
            <div class="fw-info fs-4">
            <?= $_SESSION['temp']['result'][4] ?? '<span class="small text-muted fst-italic">(trống)</span>' ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Loại phòng<span class="mx-1">/</span>Type
            </div>
            <div class="fw-info fs-4">
                <?= $_SESSION['temp']['result'][5] ?? '<span class="small text-muted fst-italic">(trống)</span>' ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-lg-between">
            <div class="fw-bold">
                Người ở cùng<span class="mx-1">/</span>Together
            </div>
            <div class="fw-info fs-4 text-end">
                <?php
                if(!empty($_SESSION['temp']['roomate'])) {
                    foreach ($_SESSION['temp']['roomate'] as $person) {
                        echo $person[0].'<br>';
                    }
                }
                else{ ?>
                    <span class="small text-muted fst-italic">không có / none</span>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="col-12 text-center mt-4">
    <div id="continue" class="fw-bold fs-6 text-main text-uppercase">
        <i class="bi bi-chevron-down me-2"></i>Nhấn để xem hoạt động chi tiết
        <div class="">Click to view</div>
    </div>
</div>

<div class="col-12 col-md-8 col-lg-4 position-relative mb-4 px-2">
    <img class="w-100" src="<?= URL_STORAGE ?>system/timeline.jpg" alt="timeline.jpg">
    <div class="w-100 position-absolute bottom-0 start-25 text-center">
        <a id="feedback" href="/feedback" class="bg-main fs-6 px-4 fw-bold btn mb-5">
            Đánh giá dịch vụ
        </a>
    </div>
</div>