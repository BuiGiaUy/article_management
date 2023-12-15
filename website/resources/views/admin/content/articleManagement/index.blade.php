@extends("layouts.adminLayoutPage")
@section('content')
    <div class="container">
        <h1>Danh sách bài viết</h1>
        <div class="flex flex-col-reverse"><a href="{{ route('posts.create') }}" type="button" class="btn btn-primary rounded-pill mb-3  mr-0">ADD POST</a></div>
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên bài viết</th>
                <th>Hình ảnh</th>
                <th>Miêu tả ngắn</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as  $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ $post->image }}" alt="{{ $post->title }}" style="max-width: 100px;"></td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="{{ $post->id }}" data-type="post">
                            Xem nội dung bài viết
                        </button>
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal" data-id="{{ $post->seo->id }}" data-type="seo">
                            Xem nội dung SEO
                        </button>

                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Sửa bài viết</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này chứ?')">Xóa bài viết</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="modalContent"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle displaying data in the modal -->
    <script>
        $(document).ready(function() {
            $('.btn-primary').on('click', function() {
                var postId = $(this).data('id');
                var dataType = $(this).data('type'); // Loại dữ liệu: 'post' hoặc 'seo'

                $.ajax({
                    url: '/admin/posts/' + postId + '/details/' + dataType,
                    type: 'GET',
                    success: function(response) {
                        $('#modalTitle').text(response.title);
                        $('#modalContent').text(response.content);
                        $('#exampleModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection

