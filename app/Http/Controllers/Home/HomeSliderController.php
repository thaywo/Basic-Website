<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
$homeslide = HomeSlide::find(1);

return view('admin.home_slide.home_slide_all', compact('homeslide'));
    }

    public function updateSlider(Request $request)
    {
        $homeID = $request->id;
         if($request->file('home_slide')){
            $image = $request->file('home_slide');
            $name_generate = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(636,852)->save('upload/admin_images/'.$name_generate);
            $save_url = 'upload/admin_images/'.$name_generate;
            HomeSlide::findOrFail($homeID)->update([
                'title' => $request->title,
                'description'  => $request->description,
                'home_slide' => $save_url,
                'video_url' =>  $request->video_url,

            ]);

            $notification = array(
                'message' => 'Slider updated successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

         }

         else
         {
            HomeSlide::findOrFail($homeID)->update([
                'title' => $request->title,
                'description'  => $request->description,
                'home_slide' => $request->home_slide,

            ]);

            $notification = array(
                'message' => 'Slider updated successfully without image',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

         }
    }
}
