<?php
class InteriorController extends BaseController {
      public function __construct(){
          if (!Auth::check()){
            return Redirect::to('login');
          }
      }

      public function cate_init(){
        $cates=Cate::all();
        foreach($cates as $cate ){
            $cate_array[$cate->id]=$cate->name;
        }
        return $cate_array;
      }

    	public function index(){
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>'室內設計',"main"=>"Home","sub"=>"interior");
          $data["active"] = "interior";
          // $data["post_id"] =  ;
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Interior::orderby("prim","desc")->paginate(20);
    		  return View::make('admin.interior.index',$data);
    	}


      public function update(){

          $id           = Input::get("id");
          $name         = Input::get("name");
          $content      = Input::get("content");
          $fbLink       = Input::get("fbLink");
          $title      = Input::get("title");
          $tag      = Input::get("tag");
          $fb_title  = Input::get('fb_title');
          $category_id  = 1111;
          $prim      =  Input::get('prim');
          $template  =  Input::get('template');
          $flag  =  Input::get('flag');


          $update_array = array(
                  'name'        =>  Input::get('name'),
                  'category_id' =>  Input::get('category_id'),
                  'prim'     =>  Input::get('prim'),
                  'tag'     =>  Input::get('tag'),
                  "fb_title"    =>  Input::get('fb_title'),
                  'title'     =>  Input::get('title'),
                  'fbLink'     =>  Input::get('fbLink'),
                  'template'     =>  Input::get('template'),
                  'flag'     =>  Input::get('flag'),
                  'content'     =>  Input::get('content')
          );

          $validator = Validator::make($update_array, Interior::$rules );
          if ( $validator->fails()) {
              return Redirect::to('/interior/'.$id)->withErrors($validator);
          } else {

              $destinationPath = public_path().'/img';
              $filename = false;
              $filename2 = false;



                $t_people=Interior::find($id);
                $t_people->content = $content;
                $t_people->category_id = $category_id;
                $t_people->fbLink = $fbLink;
                $t_people->tag = $tag;
                $t_people->template = $template;
                $t_people->flag = $flag;

                if (Input::hasFile('image') ){
                  $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","interior");
                  // $file1            = Input::file('image');
                  // $filename        = str_random(6) . '_' . $file1->getClientOriginalName();
                  // $uploadSuccess1   = $file1->move( $destinationPath , $filename );
                  // $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告");
                  $t_people->image = '/img/interior/'.$filename;
                }

                if (Input::hasFile('image2') ){
                  $filename2     = uploadImage(Input::file('image2') , "resize" ,"太形廣告","interior");
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $t_people->image2 = '/img/interior/'.$filename2;
                }

                if (Input::hasFile('image_facebook') ){
                  $filename_facebook    = uploadImage(Input::file('image_facebook') , "resize" ,"太形廣告","interior");
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $t_people->image_facebook = '/img/interior/'.$filename_facebook;
                }

                $t_people->fb_title = $fb_title;
                $t_people->title = $title;
                $t_people->prim = $prim;
                $t_people->name = $name;
                $t_people->save();

                // $this->do_prim($id );

                $posts  =  Interior::whereNotIn('id', array($id) )->get();
                $i=$prim;
                foreach($posts as $post){
                      $i+=1;
                      if($post->prim >= $prim){
                          $post->prim =  $i;
                          $post->save();
                      }

                }

        }
        return Redirect::to('/interiors');
      }

      public function store(){

        $id           =  Input::get("id");
        $name         =  Input::get("name");
        $content      =  Input::get("content");
        $tag          =  Input::get("tag");
        $title        =  Input::get("title");
        $category_id  =  1111;
        $prim      =  Input::get('prim');
        $fbLink       =  Input::get('fbLink');
        $template       =  Input::get('template');

        $insert_data=array( 'name'=>$name,
                            'content'=>Input::get('content'),
                            'fbLink'     =>  Input::get('fbLink'),
                            'category_id'=>$category_id,
                            'prim'=>$prim);

        $validator = Validator::make(Input::all(), Interior::$rules);

        if ( $validator->fails()) {
                return Redirect::to('/interior/create' )->withErrors($validator);
        }else {


          if (Input::hasFile('image') || Input::hasFile('image2') || Input::hasFile('image_facebook') ) {


                $insert_data=array( 'name'=>$name,
                                    'content'=>$content,
                                    'fbLink'     =>  Input::get('fbLink'),
                                    'tag'=>$tag,
                                    'title'=>$title,
                                    'template'=>$template,
                                    "fb_title"    =>  Input::get('fb_title'),
                                    'category_id'=>$category_id,
                                    'prim'=>$prim);
                $t_post=Interior::create($insert_data);

                if (Input::hasFile('image') ){
                  // $file1            = Input::file('image');
                  // $filename        = str_random(6) . '_' . $file1->getClientOriginalName();
                  // $uploadSuccess1   = $file1->move( $destinationPath , $filename );
                  $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","interior");
                  $t_post->image = '/img/interior/'.$filename;
                }

                if (Input::hasFile('image2') ){
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $filename2     = uploadImage(Input::file('image2') , "resize" ,"太形廣告","interior");
                  $t_post->image2 = '/img/interior/'.$filename2;
                }

                if (Input::hasFile('image_facebook') ){
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $image_facebook     = uploadImage(Input::file('image_facebook') , "resize" ,"太形廣告","interior");
                  $t_post->image_facebook = '/img/interior/'.$image_facebook;
                }
                $t_post->save();



                $posts  =  Interior::whereNotIn('id', array($t_post->id) )->get();
                $i=$prim;
                foreach($posts as $post){
                      $i+=1;
                      if($post->prim >= $prim){
                          $post->prim =  $i;
                          $post->save();
                      }

                }


              }else{

                      $insert_data=array( 'name'=>$name,
                                          'content'=>$content,
                                          'tag'=>$tag,
                                          'title'=>$title,
                                          'template'=>$template,
                                          'fbLink'     =>  Input::get('fbLink'),
                                          'category_id'=>$category_id,
                                          "fb_title"    =>  Input::get('fb_title'),
                                          'prim'=>$prim);
                      $t_post=Interior::create($insert_data);
                      // $this->do_prim($t_post->id );
              }
              return Redirect::to('/interiors');
        }

      }
 
      

      public function create(){

          $cate_array=$this->cate_init();
          $data["interior"] = "";
          // $data["category_id"] = $id;
          $data["_title"] = array("top"=>"新增-人室內設計","main"=>"Home","sub"=>"post");
          $data["active"] = '人物觀點';

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.interior.create',$data);

    	}

   

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-室內設計","main"=>"Home","sub"=>"interior");
          $data["active"] = "interior";
          $data["category_id"] = $category_id;
          $data["interior"]=Interior::find($id);
    		  return View::make('admin.interior.edit',$data);

    	}

      public function  del($id){
        Interior::find($id)->delete();
        return Redirect::to('/interiors')->withInput()->with('success','刪除成功');
      }


      public function  delPeopleImg1(){

        $id = Input::get("id");
        $peo=Interior::find($id);
        $peo->image="";
        $peo->save();
        return 1;
      }

      public function  delPeopleImg_facebook(){
        $id = Input::get("id");
        $peo=Interior::find($id);
        $peo->image_facebook="";
        $peo->save();
        return 1;
      }

      public function  delPeopleImg2(){
        $id  = Input::get("id");
        $peo = Interior::find($id);
        $peo->image2="";
        $peo->save();
        return 1;
      }

 }
