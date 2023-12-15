<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index () {
        $posts = Post::all();
//        echo "<pre>";
//        print_r($posts);
//        echo "</pre>";
//        exit();
        return view('admin.content.articleManagement.index', ["posts"=> $posts]);
    }
    public function getPostDetails($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $data = [
            'title' => $post['title'],
            'content' => $post['content'],
        ];

        return response()->json($data);
    }

    public function getSeoDetails($id)
    {
        $post = Post::find($id);

        if (!$post || !$post->seo) {
            return response()->json(['error' => 'SEO data not found'], 404);
        }

        $data = [
            'title' => $post->seo["seo_title"],
            'content' => $post->seo["seo_keywords"],
        ];

        return response()->json($data);
    }

    public function create()
    {
        return view('admin.content.articleManagement.create');
    }
    public function store(Request $request) {

        $input = $request->all();

        $post = new Post();
        $post['title'] = $input['title'];
        $post['content'] = $input['content'];
        $post['description'] = $input['description'];
        $post['image'] = $input['image'];
        $post['slug'] = Str::slug($input['title']);
        $post->save();

        $seo = new Seo();
        $seo['seo_keywords']= $input['seo_keywords'];
        $seo['seo_description']= $input['seo_description'];
        $seo['seo_title']= $input['seo_title'];
        $seo['post_id'] = $post['id'];
        $seo->save();


        return redirect()->route("posts.index")->with('success', 'Bài viết đã được tạo thành công!');
    }

    public function edit($id) {
        $post = Post::find($id);
        return view("admin.content.articleManagement.edit",["post"=> $post]);
    }
    public function update(Request $request, $id) {
        $input = $request->all();

        $post = Post::find($id);

        if (!$post) {
            return redirect()->route("posts.index")->with('error', 'Không tìm thấy bài viết!');
        }

        $post->title = $input['title'];
        $post->content = $input['content'];
        $post->description = $input['description'];
        $post->image = $input['image'];
        $post->slug = Str::slug($input['title']);
        $post->save();

        $seo = Seo::where('post_id', $id)->first();

        if (!$seo) {
            $seo = new Seo();
        }

        $seo->seo_keywords = $input['seo_keywords'];
        $seo->seo_description = $input['seo_description'];
        $seo->seo_title = $input['seo_title'];
        $seo->post_id = $post->id;
        $seo->save();

        return redirect()->route("posts.index")->with('success', 'Bài viết đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Không tìm thấy bài viết để xóa!');
        }
        if ($post->seo) {
            $post->seo->delete();
        }
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa thành công!');
    }
}
