<div class="container d-flex justify-content-center p-3">
    <div class="col-12 col-md-6 col-lg-5 card-result rounded-3 py-5 px-3 px-lg-5 text-center">
        <div class="h3 text-main text-uppercase mb-3">
            Đánh giá / Feedback
        </div>
        <form action="" method="post">
            <label for="range" class="form-label">Mức điểm / Score</label>
            <input 
                style="width : 100% "
                id="range"
                min="0" 
                max="4" 
                value="4" 
                type="range" 
                name="point" 
                oninput="emoji.innerText = [
                    '⭐ Rất tệ / Very Bad',
                    '⭐⭐ Tệ / Bad',
                    '⭐⭐⭐ Hài lòng / Satisfied',
                    '⭐⭐⭐⭐ Tốt / Good',
                    '⭐⭐⭐⭐⭐ Tuyệt vời / Great'
                    ][this.value]"
            >
            <p class="text-main" id="emoji">⭐⭐⭐⭐⭐ Tuyệt vời / Great</p>
            <div class="my-3">
            <label for="content" class="form-label">Nội dung / Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" placeholder="Viết nội dung đánh giá" oninput="toggleButton()"></textarea>
            </div>
            <button disabled class="btn bg-main shadow" id="sendBtn" name="sendBtn" type="submit">Gửi đi / Send</button>
        </form>
    </div>
</div>

<script>
    function toggleButton() {
        const textarea = document.getElementById('content');
        const button = document.getElementById('sendBtn');
        
        // Kiểm tra nếu textarea có nội dung
        if (textarea.value.trim() !== '') {
            button.disabled = false; // Bật nút
        } else {
            button.disabled = true; // Tắt nút
        }
    }
</script>