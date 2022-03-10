<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = Post::query()->where('active', '1')->orderBy('created_at', 'desc')->get()->all();

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PostFormRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $post = Post::create($data);

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostFormRequest $request
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(PostFormRequest $request, Post $post)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $post->update($data);

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, Post $post)
    {
        $result = $post->delete();

        return response($result)->json($result);
    }
}
