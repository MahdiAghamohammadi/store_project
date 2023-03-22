<?php

namespace Modules\Post\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Illuminate\Routing\Controller;
use App\Http\Services\Image\ImageService;
use Modules\Post\Http\Requests\PostRequest;
use Illuminate\Contracts\Support\Renderable;
use Modules\ContentCategory\Entities\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->simplePaginate(15);
        return view('post::index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $postCategories = PostCategory::all();
        return view('post::create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        /**
         * image upload
         */
        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            /**
             * if upload with error, redirect and return this message
             */
            if ($result === false) {
                return redirect()->route('admin.content.post.index')->with('swal-success', 'آپلود عکس با خطا مواجه شد.');
            }
            /**
             * make image
             */
            $inputs['image'] = $result;
        }
        $inputs['author_id'] = auth()->user()->id;
        $post = Post::create($inputs);
        return redirect(route('admin.content.post.index'))->with('swal-success', 'پست مورد نظر با موفقیت اضافه شد.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post)
    {
        $postCategories = PostCategory::all();
        return view('post::edit', compact('post', 'postCategories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService)
    {
        $inputs = $request->all();
        // date fixed => remove 000 of last timestamp
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int) $realTimestampStart);
        if ($request->hasFile('image')) {
            if (!empty($post->image)) {
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.content.category.index')->with('swal-success', 'آپلود عکس با خطا مواجه شد.');
            }
            $inputs['image'] = $result;
        } else {
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }
        $post->update($inputs);
        return redirect(route('admin.content.post.index'))->with('swal-success', 'پست مورد نظر با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.content.post.index')->with('swal-success', 'پست مورد نظر با موفقیت حذف شد.');
    }

    public function status(Post $post)
    {
        $post->status = $post->status == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->status == 0) {
                return response()->json(['status' => true, 'checked' => false]);
            } else {
                return response()->json(['status' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function commentable(Post $post)
    {
        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable == 0) {
                return response()->json(['commentable' => true, 'checked' => false]);
            } else {
                return response()->json(['commentable' => true, 'checked' => true]);
            }
        } else {
            return response()->json(['commentable' => false]);
        }
    }
}
