<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service_Feature;
use App\Models\SubCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Gd\Shapes\CircleShape;

class ServiceController extends Controller
{

    public function index()
    {
        $service = Service::where('status', 'a')->latest()->get();
        return view('admin.service.index', compact('service'));
    }

    // public function getSubcategory($id)
    // {
    //     $subCategories = SubCategory::where('category_id', $id)->where('status', 'a')->get();

    //     if ($subCategories->count() > 0) {
    //         return response()->json($subCategories, 200);
    //     } else {
    //         return response()->json(['message' => 'No subcategories found'], 404);
    //     }
    // }



    public function store(Request $request)
{
    // Validate the request input
    $this->validate($request, [
        'title' => 'required|string|max:100',
        'slug' => 'nullable|string|unique:services,slug|max:255',
        'image' => 'required|image|mimes:jpg,png,jpeg,bmp,webp|max:1024', // Max 1MB
        'short_details' => 'nullable|string',
        'description' => 'nullable|string',
        'features' => 'nullable|array',
        'feature_images.*' => 'nullable|image|mimes:jpg,png,jpeg,bmp,webp|max:1024', // Each image max 1MB
    ]);

    try {
        // Image upload and resize for service
        $image = $request->file('image');
        $imageName = 'service_' . time() . '.' . $image->getClientOriginalExtension();
        $imagePath = 'uploads/service/' . $imageName;
        Image::make($image)->resize(760, 450)->save(public_path($imagePath));

        // Create new Service instance
        $service = new Service();
        $service->title = $request->title;
        $service->slug = $request->slug ?? Str::slug($request->title);
        $service->short_details = $request->short_details;
        $service->description = $request->description;
        $service->image = $imagePath;
        $service->status = 'a';
        $service->save_by = auth()->id() ?? 1;
        $service->ip_address = $request->ip();
        $service->save();

        // Handle features and their images
        if ($request->has('features')) {
            foreach ($request->features as $index => $featureName) {
                $featureImagePath = null;

                // Check if a corresponding feature image was uploaded
                if ($request->hasFile("feature_images.$index")) {
                    $featureImage = $request->file("feature_images.$index");
                    $featureImageName = 'feature_' . time() . '_' . $index . '.' . $featureImage->getClientOriginalExtension();
                    $featureImagePath = 'uploads/features/' . $featureImageName;
                    Image::make($featureImage)->resize(740, 450)->save(public_path($featureImagePath));
                }

                // Create new Service Feature
                $serviceFeature = new Service_Feature();
                $serviceFeature->service_id = $service->id;
                $serviceFeature->feature_name = $featureName;
                $serviceFeature->feature_image = $featureImagePath;
                $serviceFeature->save();
            }
        }

        return back()->with('success', 'Service created successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
    }
}




    public function edit($id)
    {

        $service = Service::with('features')->where('status', 'a')->findOrFail($id);

        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'short_details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'features' => 'nullable|array',
            'feature_images.*' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Each image max 2MB
        ]);
    
        $service = Service::findOrFail($id);
    
        $service->title = $request->title;
        $service->slug = $request->slug ?? Str::slug($request->title);
        $service->short_details = $request->short_details;
        $service->description = $request->description;
        if ($request->hasFile('image')) {
            $serviceImage = $request->file('image');
            $serviceImageName = 'service_' . time() . '.' . $serviceImage->getClientOriginalExtension();
            $serviceImagePath = 'uploads/services/' . $serviceImageName;
    
            Image::make($serviceImage)->resize(760, 450)->save(public_path($serviceImagePath));
            $service->image = $serviceImagePath; 
        }
    
        $service->save(); 
    
        $existingFeatureIds = $service->features->pluck('id')->toArray();
        $newFeatures = $request->input('features', []);
    
        // Update or create features
        foreach ($newFeatures as $id => $featureName) {
            $featureImagePath = null;
    
            if ($request->hasFile("feature_images.$id")) {
                $featureImage = $request->file("feature_images.$id");
                $featureImageName = 'feature_' . time() . '_' . $id . '.' . $featureImage->getClientOriginalExtension();
                $featureImagePath = 'uploads/features/' . $featureImageName;
    
                Image::make($featureImage)->resize(740, 450)->save(public_path($featureImagePath));
            }
    
            if (is_numeric($id) && in_array($id, $existingFeatureIds)) {
                $feature = Service_Feature::find($id);
                $feature->feature_name = $featureName;
                $feature->feature_image = $featureImagePath ?? $feature->feature_image; 
                $feature->save();
            } elseif (!empty($featureName)) {
                $service->features()->create([
                    'feature_name' => $featureName,
                    'feature_image' => $featureImagePath,
                ]);
            }
        }
    
        // Remove features not in the new request
        $featuresToRemove = array_diff($existingFeatureIds, array_keys($newFeatures));
        Service_Feature::destroy($featuresToRemove);
    
        return redirect()->route('service.index')->with('success', 'Service updated successfully!');
    }
    


    public function destroy($id)
    {
        $service = Service::where('id', $id)->first();
    
        if ($service) {
            if ($service->image) {
                @unlink(public_path($service->image)); 
            }
    
            $service->status = 'd';
            $service->save(); 
        }
        return redirect()->route('service.index')->with('success', 'Service Deleted Successfully');
    }
    
}