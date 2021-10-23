<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\template;
use App\Models\Media;
use App\Models\Options;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Intervention\Image\Facades\Image as Image;
// use  Barryvdh\DomPDF\Facade as PDF;
class admin_controller extends Controller
{
   function index()
   {
      return redirect('/');
   }
   function showLoginPage()
   {
      if (!session('admin')) {
         return view('admin/login');
      } else {
         return view('admin/dashboard');
      }
   }
   function admin_login(Request  $request)
   {
      $email = $request->post('email');
      $password = md5($request->post('password'));
      $result = admin::where(['email' => $email, 'password' => $password])->get();
      if (isset($result['0']->email)) {
         $request->session()->put('userEmail', $result['0']->email);
         $request->session()->put('admin', $result['0']->id);
         $request->session()->put('admin-name', $result['0']->name);
         $request->session()->put('roleId', $result['0']->roleno); //change to roleid
         return redirect('admin');
      } else {

         return back()->with('fail', 'Please enter  the coreect details.');
      }
   }

   function dashBoard()
   {
      return view('admin/dashboard');
   }
   function getadmindetails(admin $info)
   {

      return view('admin/profile')->with('infoarr', admin::all());
   }
   function deleteadminprofiles(admin $admin, $id)
   {
      admin::destroy(array('id', $id));
      return view('admin/profile')->with('infoarr', admin::all());
   }

   function getloggedindetails(admin $info)
   {

      return view('admin/loggedinprofile')->with('infoarr', admin::all());
   }

   function addnewprofilesform(Request $request)
   {
      return view('admin/loggedinprofile');
   }

   function addnewprofiles(Request $request_add_admin)
   {

      $request_add_admin->validate([
         'name' => 'required',
         'email' => 'required|email|unique:admins',
         'mobileno' => 'required|min:10|max:10',
         'gender' => 'required',
         'password' => 'required|min:7|max:15'
      ]);
      $admin = new Admin;
      $admin->roleno = 0;
      $admin->name = $request_add_admin['name'];
      $admin->email = $request_add_admin['email'];
      $admin->mobileno = $request_add_admin['mobileno'];
      $admin->gender = $request_add_admin['gender'];
      $admin->password = md5($request_add_admin['password']);
      if ($admin->save()) {
         return back()->with('success', 'New admin added successfully');
      } else {
         return back()->with('fail', 'Something went wrong');
      }
   }
   function postSave(Request $postSave)
   {

      $postSave->validate([
         'message' => 'required',
         'title' => 'required',
      ]);
      $updateInfo = new Post;
      $updateInfo->post = $postSave['message'];
      $updateInfo->excerpt = substr($updateInfo->post, 1, 20);
      $updateInfo->title = $postSave['title'];
      $updateInfo->writer = session('admin-name');
      $updateInfo->approved = 0;
      if ($updateInfo->save()) {
         return back()->with('postSubmitted', 'New post added successfully');
      } else {
         return back()->with('postFailed', 'Something went wrong');
      }
   }
   function update(Request $req)
   {
      $req->validate([
         'name' => 'required',
         'email' => 'required|email',
         'gender' => 'required',
         'mobileno' => 'required',
      ]);


      $data = admin::where('id', session('admin'))->update([
         'name' => $req['name'],
         'email' => $req['email'],
         'gender' => $req['gender'],
         'mobileno' => $req['mobileno']
      ]);
      if ($data) {
         return back()->with('postSubmitted', 'New data added successfully');
      } else {
         return back()->with('postFailed', 'Something went wrong');
      }
   }
   function showPostWindow(Request $postinfo)
   {
      return view('admin/posts')->with('postinfo', post::orderBy('id', 'DESC')->get());
   }
   function generalSettings()
   {
      $data = admin::find(session('admin'));
      return view('admin/general', ['data' => $data]);
   }


   // show media view file
   public function showMediaView()
   {

      return view('admin/media')->with(['images' =>  Media::all(), 'settings' => Options::all()]);
   }
   public function UploadMediaFile(Request $req)
   {
      // dd($req->all());
      $req->validate([
         'image' => 'required|mimes:jpg,png,jpeg|max:5048',
         'title' => 'required',
      ]);


      $file = $req->file('image');
      $imgname = $file->getClientOriginalName();
      $namePart = explode('.', $imgname);
      $mediaInfo = new Media;
      $mediaInfo->imgwriter = session('userEmail');
      $mediaInfo->imgtitle = $req['title'];
      $mediaInfo->imgweight = $file->getSize();
      $mediaInfo->imgname = $namePart[0] . '.' . $namePart[1];
      $dest = public_path('\img\\');
      $img_resize = Image::make($file->getRealPath());
      if (!file_exists($dest)) {
         mkdir($dest, 666, true);
      }
      $size = options::all();
      // dd($size);
      for ($i = 0; $i < count($size); $i++) {
         $imgsize = $size[$i];
         $name = $namePart[0] . '_' . $imgsize->height . '_' . $imgsize->width . '.' . $namePart[1];
         $img_resize->resize($imgsize->height, $imgsize->width)->save($dest . $name);
      }
      if ($mediaInfo->save()) {
         return back()->with('success', 'You have successfully uploaded the image.');
      } else {
         return back()->with('failed', 'something went wrong');
      }
   }

   // show templates view
   function showTemplatesView()
   {
      return view('admin.templates');
   }
   // show templates view

   public function showTemplates()
   {

      return view('admin/templates')->with('templates', template::orderBy('status', 'DESC')->get());
   }
   public function activateTemplates(Request $req)
   {
      $data = template::where('status', 1)->update([
         'status' => 0,
      ]);
      $data = template::where('id', $req->id)->update([
         'status' => 1,
      ]);
      if ($data) {
         return back()->with('success', 'Themes activated successfully');
      } else {
         return back()->with('failed', 'something went wrong');
      }
   }
   public function options(Request $req)
   {
      $req->validate([
         'SmallScreenHeight' => 'required',
         'SmallScreenWidth' => 'required',
         'MediumScreenHeight' => 'required',
         'MediumScreenWidth' => 'required',
         'LargeScreenHeight' => 'required',
         'LargeScreenWidth' => 'required',
      ]);
      $data1 = options::where('size', 'small')->update([
         'height' => $req->SmallScreenHeight,
         'width' => $req->SmallScreenWidth,
      ]);
      $data2 = options::where('size', 'medium')->update([
         'height' => $req->MediumScreenHeight,
         'width' => $req->MediumScreenWidth,
      ]);
      $data3 = options::where('size', 'large')->update([
         'height' => $req->LargeScreenHeight,
         'width' => $req->LargeScreenWidth,
      ]);
      if ($data1 && $data2 && $data3) {
         return back()->with('updatesucceed', 'Size Updated Successfully');
      } else {
         return back()->with('updatefailed', 'something went wrong');
      }
   }
   // render the categroies taxonomy page
   function renderCategories(Request $request)
   {
      return view('admin.categories')->with(['categories' => categories::OrderBy('id', 'asc')->get(), "second" => "Vivek"]);
   }
   function insertCategoriesData(Request $req)
   {
      $req->validate([
         'categoryTitle' => 'required',
         'category' => 'required',
         'categoryFields' => 'required',
      ]);
      $cat = new Categories();
      $cat->title = $req->categoryTitle;
      $cat->category = $req->category;
      $cat->fields = $req->categoryFields;
      $cat->discription = $req->categoryDiscriptions;
      $cat->author = session('admin-name');
      if ($cat->save()) {
         return back()->with('success', 'New category added successfully');
      } else {
         return back()->with('fail', 'Something went wrong');
      }
   }
   function deleteTaxonomy(Request $id)
   {

      $data = categories::destroy('id', $id->id);
      if ($data) {
         return back()->with('successToDelete', 'Deleted successfully');
      } else {
         return back()->with('failToDelete', 'Deleted successfully');
      }
   }
   function addNewTaxonomy(Request $req)
   {
      return view('admin/addNew');
   }
}
