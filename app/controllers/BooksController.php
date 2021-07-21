<?php
class BooksController extends BaseController {
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
          $data["_title"] = array("top"=>'電子書',"main"=>"Home","sub"=>"book");
          $data["active"] = "電子書";
          // $data["post_id"] =  ;
          $cate_array = array();
          $data["cates"] = $cate_array;
          $data["result"] = Book::orderby("prim","desc")->paginate(20);
    		  return View::make('admin.books.index',$data);
      }
      
      public function update(){
          $id           = Input::get("id");
          $name         = Input::get("name");
          $content      = Input::get("content");
          $fbLink       = Input::get("fbLink");
          $title      = Input::get("title");
          $tag      = Input::get("tag");
          $fb_title  = Input::get('fb_title');          
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
                  'cdate' =>  Input::get('cdate'),
                  'content'     =>  Input::get('content')
          );
          $fileInfo = $_FILES['myFile'];  
          $myFile_pic = $_FILES['myFile_pic'];  
           
          if(!empty($fileInfo['name'])){
            
            $book_title   =   Input::get('book_title');            
            $newName      =   $this->uploadFile($fileInfo, 32132123123, true ,'bookUploads', $myFile_pic );            
            
            BookFiles::create([ 'file'=>isset($newName[0])?$newName[0]:"", 
                                'book_id'=>$id,
                                'book_title'=>$book_title , 
                                'file_pic'=>isset($newName[1])?$newName[1]:""]);
          }
          
          

          $validator = Validator::make($update_array, Book::$rules );
          if ( $validator->fails()) {
              return Redirect::to('/book/'.$id)->withErrors($validator);
          } else {

              $destinationPath = public_path().'/img';
              $filename = false;
              $filename2 = false;



                $t_people=Book::find($id);
                $t_people->content = $content;
                // $t_people->category_id = $category_id;
                // $t_people->fbLink = $fbLink;
                // $t_people->tag = $tag;
                // $t_people->template = $template;
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
                $t_people->cdate =  Input::get('cdate');
                $t_people->fb_title = $fb_title;
                $t_people->title = $title;
                $t_people->prim = $prim;
                $t_people->name = $name;
                $t_people->save();

                // $this->do_prim($id );

                $posts  =  Book::whereNotIn('id', array($id) )->get();
                $i=$prim;
                foreach($posts as $post){
                      $i+=1;
                      if($post->prim >= $prim){
                          $post->prim =  $i;
                          $post->save();
                      }

                }

        }
        return Redirect::to('/books');
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

        $validator = Validator::make(Input::all(), Book::$rules);

        if ( $validator->fails()) {
                return Redirect::to('/book/create' )->withErrors($validator);
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
                                    'cdate' =>  Input::get('cdate'),
                                    'prim'=>$prim);
                $t_post=Book::create($insert_data);

                if (Input::hasFile('image') ){
                  // $file1            = Input::file('image');
                  // $filename        = str_random(6) . '_' . $file1->getClientOriginalName();
                  // $uploadSuccess1   = $file1->move( $destinationPath , $filename );
                  $filename     = uploadImage(Input::file('image') , "resize" ,"太形廣告","interior");
                  $t_post->image = '/img/book/'.$filename;
                }

                if (Input::hasFile('image2') ){
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $filename2     = uploadImage(Input::file('image2') , "resize" ,"太形廣告","interior");
                  $t_post->image2 = '/img/book/'.$filename2;
                }

                if (Input::hasFile('image_facebook') ){
                  // $file2            = Input::file('image2');
                  // $filename2        = str_random(6) . '_' . $file2->getClientOriginalName();
                  // $uploadSuccess2   = $file2->move( $destinationPath , $filename2 );
                  $image_facebook     = uploadImage(Input::file('image_facebook') , "resize" ,"太形廣告","interior");
                  $t_post->image_facebook = '/img/book/'.$image_facebook;
                }
                $t_post->save();
                $posts  =  Book::whereNotIn('id', array($t_post->id) )->get();
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
                                      'cdate' =>  Input::get('cdate'),
                                      "fb_title"    =>  Input::get('fb_title'),
                                      'prim'=>$prim);
                  $t_post=Book::create($insert_data);
                  // $this->do_prim($t_post->id );
              }
              return Redirect::to('/books');
        }

      }
 
      public function create(){

          $cate_array=$this->cate_init();
          $data["book"] = "";
          // $data["category_id"] = $id;
          $data["_title"] = array("top"=>"新增-電子書","main"=>"Home","sub"=>"book");
          $data["active"] = '電子書';

          $data["cates"] = Cate::where('type','最新消息')->get()->toArray();
    		  return View::make('admin.books.create',$data);

    	}

      public function edit($id){

          $category_id = Input::get('category_id');
          $cate_array=$this->cate_init();
          $data["_title"] = array("top"=>"編輯-電子書","main"=>"Home","sub"=>"book");
          $data["active"] = "電子書";
          $data["category_id"] = $category_id;
          $data["book"]=Book::find($id);
    		  return View::make('admin.books.edit',$data);

    	}

      public function  del($id){
        Book::find($id)->delete();
        return Redirect::to('/books')->withInput()->with('success','電子書-刪除成功');
      }


      public function  delBookFile(){
        $id = Input::get('id');
        BookFiles::find($id)->delete();                
        return 1;
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

      public function uploadFile($fileInfo, $maxSize = 11111112097152, $flag = true, $uploadPath = 'bookUploads' , $myFile_pic  ) {
        // 存放錯誤訊息
        $mes = '';
     
        // 取得上傳檔案的擴展名
        $ext = pathinfo($fileInfo['name'], PATHINFO_EXTENSION); 
        $ext_pic = pathinfo($myFile_pic['name'], PATHINFO_EXTENSION); 
     
        // 確保檔案名稱唯一，防止重覆名稱產生覆蓋
        $uniName = md5(uniqid(microtime(true), true)) . '.' . $ext;
        $uniName_pic = md5(uniqid(microtime(true), true)) . '.' . $ext_pic;
        $destination = $uploadPath . '/' . $uniName;
        $destination_pic = $uploadPath . '/' . $uniName_pic;
        // print_r($fileInfo); 
        // 判斷是否有錯誤
        if ($fileInfo['error'] > 0) {
            // 匹配的錯誤代碼
            switch ($fileInfo['error']) {
                case 1:
                    $mes = '上傳的檔案超過了 php.ini 中 upload_max_filesize 允許上傳檔案容量的最大值';
                    break;
                case 2:
                    $mes = '上傳檔案的大小超過了 HTML 表單中 MAX_FILE_SIZE 選項指定的值';
                    break;
                case 3:
                    $mes = '檔案只有部分被上傳';
                    break;
                case 4:
                    $mes = '沒有檔案被上傳（沒有選擇上傳檔案就送出表單）';
                    break;
                case 6:
                    $mes = '找不到臨時目錄';
                    break;
                case 7:
                    $mes = '檔案寫入失敗';
                    break;
                case 8:
                    $mes = '上傳的文件被 PHP 擴展程式中斷';
                    break;
            }
     
            exit($mes);
        }
     
        // 檢查檔案是否是通過 HTTP POST 上傳的
        if (!is_uploaded_file($fileInfo['tmp_name']))
            exit('檔案不是通過 HTTP POST 方式上傳的');
         
        // 檢查上傳檔案是否為允許的擴展名
        // if (!is_array($allowExt))  // 判斷參數是否為陣列
        //     exit('檔案類型型態必須為 array');
        // else {
        //     if (!in_array($ext, $allowExt))  // 檢查陣列中是否有允許的擴展名
        //         exit('非法檔案類型');
        // }
     
        // 檢查上傳檔案的容量大小是否符合規範
        if ($fileInfo['size'] > $maxSize)
            exit('上傳檔案容量超過限制');
     
        // 檢查是否為真實的圖片類型
        // if ($flag && !@getimagesize($fileInfo['tmp_name']))
        //     exit('不是真正的圖片類型');
     
        // 檢查指定目錄是否存在，不存在就建立目錄
        if (!file_exists($uploadPath))
            mkdir($uploadPath, 0777, true);  // 建立目錄
        
        if($myFile_pic ){
          if (!@move_uploaded_file($myFile_pic['tmp_name'], $destination_pic))  // 如果移動檔案失敗
          exit('圖片移動失敗');
        }    
        // 將檔案從臨時目錄移至指定目錄
        if (!@move_uploaded_file($fileInfo['tmp_name'], $destination))  // 如果移動檔案失敗
            exit('檔案移動失敗');
     
        return array($destination,$destination_pic);
    }

 }
