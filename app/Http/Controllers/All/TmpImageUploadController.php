<?php

namespace App\Http\Controllers\All;

use App\Models\All\TmpImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;

class TmpImageUploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('image') || $request->hasFile('avatar') || $request->hasFile('ads')) 
        {
            // if its an array of images
            if(is_array($request->image)) 
            {
                $images = $request->image;

                foreach($images as $img): 
                    
                    $img_file_name = $img->hashName(); // get the unique hashname
    
                    $img->storeAs('tmp', $img_file_name , 'public');  // store on the default disk ( storage > app > public)
    
                    TmpImage::create(['filename' => $img_file_name]); // store temporarily on the server
    
                    return $img_file_name; // every requested images ; return 
    
                endforeach;
      
            }

            else if(is_array($request->ads))
            {
                    $ads = $request->ads;

                    foreach($ads as $ad): 
                        
                        $ad_file_name = $ad->hashName(); // get the unique hashname
        
                        $ad->storeAs('tmp', $ad_file_name , 'public');  // store on the default disk ( storage > app > public)
        
                        TmpImage::create(['filename' => $ad_file_name]); // store temporarily on the server
        
                        return $ad_file_name; // every requested documents ; return 
        
                    endforeach;
            }
            
            else
            {
                $image = $request->image ?? $request->avatar;

                $image_name = $image->hashName(); // hashed name of an image ( Unique)
    
                $image->storeAs('tmp', $image_name, 'public'); // store to the default storage driver temporarily
    
                TmpImage::create(['filename' => $image_name]);
    
                return $image_name;
            }

        }

        return 'not found';
    }

    public function revert(Request $request)
    {
        $image = $request->getContent();

        Storage::disk('public')->delete("tmp/$image"); // remove from the tmp folder
        TmpImage::where('filename', $image)->delete(); // remove from the tmp db tbl

        return;
    }

   
}