<!-- show-post.blade.php -->

<!-- Modal -->
<div class="modal" id="postModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-body">
            @if($post)
                <!-- Hiển thị nội dung bài đăng -->
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            @endif
        </div>
    </div>
</div>

<!-- Button để mở modal -->
<button onclick="openModal()">Mở Modal</button>

<!-- Script để điều khiển modal -->
<script>
    function openModal() {
        document.getElementById("postModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("postModal").style.display = "none";
    }
</script>
