<?php

namespace App\Http\Controllers;

use App\Models\BannerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerImageController extends Controller
{
    public function index()
    {
        $banners = BannerImage::all();
        return view('admin.banners.index', compact('banners'));
        
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'screen_type' => 'required|in:desktop,mobile',
            'status' => 'required|in:active,inactive',
            'image_path.*' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        if ($request->hasFile('image_path')) {
            $folder = 'banner_images/' . $request->screen_type;

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            foreach ($request->file('image_path') as $file) {
                $path = $file->store($folder, 'public');

                BannerImage::create([
                    'image_path' => $path,
                    'screen_type' => $request->screen_type,
                    'status' => $request->status,
                    'section' => $request->section,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Banner images uploaded successfully.');
    }

    public function destroy(BannerImage $banner)
    {
        Storage::disk('public')->delete($banner->image_path);
        $banner->delete();

        return redirect()->back()->with('success', 'Banner deleted.');
    }

    public function update(Request $request, BannerImage $banner)
    {
        $data = [];
    
        if ($request->has('status')) {
            $request->validate([
                'status' => 'in:active,inactive',
            ]);
            $data['status'] = $request->status;
        }
    
        if ($request->has('screen_type')) {
            $request->validate([
                'screen_type' => 'in:desktop,mobile',
            ]);
            $data['screen_type'] = $request->screen_type;
        }
    
        $banner->update($data);
    
        return redirect()->back()->with('success', 'Banner updated successfully.');
    }
    

}
