<?php

class IgController extends BaseController
{
    public function __construct()
    {
        if (!Auth::check()) {
            return Redirect::to('login');
        }
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $name = Input::get('name');
        $data["_title"] = array("top" => 'IG貼文', "main" => "Home", "sub" => "ig");
        $data["active"] = "igs";
        if ($name && !empty($name)) {
            $data["result"] = Ig::where("name", 'like', "%" . $name . "%")
                ->orderby("pr", "asc")
                ->paginate(10);
        } else {
            $data["result"] = Ig::whereNotIn('id', array(7))
                ->orderby("pr", "asc")
                ->paginate(10);
        }
        return View::make('admin.igs.index', $data);
    }

    public function store()
    {
        $insert_array = array(
            'name' => Input::get('name'),
            'url' => Input::get('url'),
            'pr' => Input::get('pr'),
        );
        $validator = Validator::make($insert_array, Ig::$rules);
        if ($validator->fails()) {
            return Redirect::to('/ig/create')->withErrors($validator);
        } else {
            $t_post = Ig::create($insert_array);
            if (Input::hasFile('image')) {
                $filename = uploadImage(Input::file('image'), "resize", "太形廣告", "post");
                $t_post->image = '/img/post/' . $filename;
            }
            $t_post->save();
            return Redirect::to('igs');
        }
    }

    public function update()
    {
        $id = Input::get("id");
        $post = Ig::find($id);
        $post->name = Input::get('name');
        $post->pr = Input::get('pr');
        $post->url = Input::get('url');
        if (Input::hasFile('image')) {
            $filename = uploadImage(Input::file('image'), "resize", "太形廣告", "post");
            $post->image = '/img/post/' . $filename;
        }
        $post->save();
        $validator = Validator::make(Input::all(), Ig::$rules);
        if ($validator->passes()) {
            return Redirect::to('/igs');
        } else {
            return Redirect::to('/igs/' . $id)->withErrors($validator);
        }
    }

    public function delUser($id)
    {
        User::find($id)->delete();
        return Redirect::to('users')->withInput()->with('error', '使用者刪除成功');
    }

    public function create()
    {
        $data["post"] = "";
        $data["_title"] = array("top" => "新增-IG貼文", "main" => "Home", "sub" => "post");
        $data["active"] = "igs";
        $data["cates"] = Cate::where('type', '最新消息')->get()->toArray();
        return View::make('admin.igs.create', $data);
    }


    public function edit($id)
    {
        $category_id = Input::get('category_id');
        $data["_title"] = array("top" => "編輯-IG貼文", "main" => "Home", "sub" => "ig");
        $data["active"] = "igs";
        $data["category_id"] = $category_id;
        $data["post"] = Ig::find($id);
        return View::make('admin.igs.edit', $data);
    }

    public function del($id)
    {
        Ig::find($id)->delete();
        return Redirect::to('/igs')->withInput()->with('success', '刪除成功');
    }


    public function delIgImage($id)
    {
        $post = Ig::find($id);
        if (File::exists(public_path() . $post->image)) {
            File::delete(public_path() . $post->image);
        }
        $post->image = "";
        $post->save();
        return Redirect::to('/ig/' . $id);
    }

    public function delPostImage_facebook($id)
    {
        $post = Ig::find($id);
        if (File::exists(public_path() . $post->image_facebook)) {
            File::delete(public_path() . $post->image_facebook);
        }
        $post->image_facebook = "";
        $post->save();
        return Redirect::to('/post/' . $id);
    }
}
