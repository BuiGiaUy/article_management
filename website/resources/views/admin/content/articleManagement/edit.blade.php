@extends("layouts.adminLayoutPage")
@section('content')

    <div class="container-fluid">

        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Bài viết đính kèm</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <form action="{{route('posts.update', $post->id  )}}" method="POST" class="needs-validation was-validated" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group" >
                                <label for="validationCustom01">Title</label>
                                <input type="text" class="form-control" id="validationCustom01" name="title"  value="{{$post->title}}">
                                <div class="invalid-feedback">
                                    Please provide a title.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input class="form-control" id="description" name="description" value="{{$post->description}}" />
                                <div class="invalid-feedback">
                                    Please provide a description.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Image URL</label>
                                <input type="text" class="form-control" id="image_label"  value="{{$post->image}}" name="image" aria-label="Image" aria-describedby="button-image">
                                <div class="input-group-append mt-2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
                                </div>

                                <div class="invalid-feedback">
                                    Please provide an image URL.
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                            <!-- SEO Fields -->
                            <div class="form-group">
                                <label for="seo_keywords">SEO Keywords</label>
                                <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="{{$post->seo->seo_keywords}}"/>
                                <div class="invalid-feedback">
                                    Please provide SEO keywords.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO Description</label>
                                <input class="form-control" id="seo_description" name="seo_description" value="{{$post->seo->seo_description}}"/>
                                <div class="invalid-feedback">
                                    Please provide SEO description.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seo_title">SEO Title</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$post->seo->seo_title}}">
                                <div class="invalid-feedback">
                                    Please provide SEO title.
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="">Nội dung bài viết</h4>

                    <div class="form-group">
                        <textarea class="form-control" id="content" name="content" style="height: 700px" >{{$post->content}}</textarea>
                        <div class="invalid-feedback">
                            Please provide content.
                        </div>
                    </div>
                    <!-- Hidden Field for post_id -->
                    <input type="hidden" name="post_id" id="post_id" value="">
                    <button class="btn btn-primary" type="submit">Edit Post {{$post->id}}</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink(url) {
            //console.log(url)
            url = url.replace(/^.*\/\/[^\/]+/, ''); // remove domain
            console.log(url)
            document.getElementById('image_label').value = url;
            document.getElementById("icon_preview").src = url;
        }
    </script>
@endsection

