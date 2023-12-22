@extends("layouts.adminLayoutPage")
@section('content')
    <div class="container">
        <h1>Danh sách bài viết</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('posts.create') }}" type="button" class="btn btn-primary rounded-pill mr-0">Thêm bài viết</a>
        </div>
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
                    @if($post->image)
                        <td><img src="{{ $post->image }}" alt="{{ $post->title }}" style="max-width: 100px;"></td>
                    @else
                       <td></td>
                    @endif
                    <td>{{ $post->description }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPost-{{$post->id}}" data-id="{{ $post->id }}" >
                            Xem nội dung bài viết
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSeo-{{ $post->seo->id }}" data-id="{{ $post->seo->id }}" >
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
                <div class="modal fade" id="exampleModalPost-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">{{$post->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if($post->image)
                                    <img src="{{$post->image}}" alt="{{$post->title}}" style="max-width: 100%; height: auto;">
                                @else
                                    <div></div>
                                @endif
                                <p id="modalContent">{{$post->content}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalSeo-{{$post->seo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">{{$post->seo->seo_title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p >{{$post->seo->seo_keywords}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links('custom.pagination') }}
        </div>
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
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('.btn-primary').on('click', function() {--}}
{{--                var postId = $(this).data('id');--}}
{{--                var dataType = $(this).data('type');--}}
{{--                $.ajax({--}}
{{--                    url: '/admin/posts/' + postId + '/details/' + dataType,--}}
{{--                    type: 'GET',--}}
{{--                    success: function(response) {--}}
{{--                        $('#modalTitle').text(response.title);--}}
{{--                        $('#modalContent').text(response.content);--}}
{{--                        $('#exampleModal').modal('show');--}}
{{--                    },--}}
{{--                    error: function(error) {--}}
{{--                        console.log(error);--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection
