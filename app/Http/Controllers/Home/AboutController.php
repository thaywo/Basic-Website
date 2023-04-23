<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
   public function AboutPage()
   {
    $homeabout = About::find(1);
    return view('admin.about_page.about_page_all', compact('homeabout'));
   }

  public function AboutStore(Request $request)
   {
       $aboutID = $request->id;
        if($request->file('image')){
           $image = $request->file('image');
           $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
           Image::make($image)->resize(523,605)->save('upload/admin_images/'.$name_generate);
           $save_url = 'upload/admin_images/'.$name_generate;
           About::findOrFail($aboutID)->update([
               'title' => $request->title,
               'short_title'  => $request->short_title,
               'short_description'  => $request->short_description,
               'long_description'  => $request->long_description,
               'image' => $save_url,

           ]);

           $notification = array(
               'message' => 'About updated successfully',
               'alert-type' => 'success',
           );

           return redirect()->back()->with($notification);

        }

        else
        {
            About::findOrFail($aboutID)->update([
                'title' => $request->title,
                'short_title'  => $request->short_title,
                'short_description'  => $request->short_description,
                'long_description'  => $request->long_description,

            ]);

           $notification = array(
               'message' => 'About updated successfully without image',
               'alert-type' => 'success',
           );

           return redirect()->back()->with($notification);

        }
   }
}
