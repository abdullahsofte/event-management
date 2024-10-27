<?php

namespace App\Http\Controllers;

use Log;
use Cart;
use App\Models\Ad;
use App\Models\Faq;
use App\Models\Area;
use App\Models\Blog;
use App\Models\Team;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Order;
use App\Models\Quote;
use App\Models\Thana;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Upazila;
use App\Models\Category;
use App\Models\District;
use App\Models\Question;
use App\Models\Management;
use App\Models\Subscriber;
use App\Models\SubCategory;
use App\Models\DeliveryTime;
use App\Models\OrderDetails;
use App\Models\PhotoGallery;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\RecordingMode;
use GuzzleHttp\Handler\Proxy;
use PharIo\Manifest\Manifest;
use App\Models\CompanyProfile;
use App\Models\Subsubcategory;
use App\Models\VideoGallery;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;
use function PHPUnit\Framework\returnSelf;

class HomeController extends Controller
{


    public function index()
    {
        $data['banners'] = Banner::latest()->get();
        $data['galleris'] = PhotoGallery::latest()->take(15)->get();
        $data['videos'] = VideoGallery::latest()->take(8)->get();
        $data['events'] = Blog::latest()->take(8)->get()->map(function ($event) {
            $event->formattedDate = \Carbon\Carbon::parse($event->date);
            return $event;
        });
        $data['services'] = Service::with('features')->where('status', 'a')->get();
        $data['partners'] = Partner::latest()->take(9)->get();
        $data['client'] = Team::latest()->take(6)->get();
    
        return view('website.index', $data);
    }
    
    

    public function newsEvent()
    {
        $data['events'] = Blog::latest()->get()->map(function ($event) {
            $event->formattedDate = \Carbon\Carbon::parse($event->date);
            return $event;
        });
        return view('website.news_event', $data);
    }

    public function newsEventDetails($id)
    {
        $event = Blog::latest()->find($id);
        $events = Blog::latest()->get();
        return view('website.event_details', compact('events', 'event'));
    }

    public function gallery()
    {
        $galleris = PhotoGallery::latest()->get();
        return view('website.gallery', compact('galleris'));
    }

    public function video()
    {
        $videos = VideoGallery::latest()->get();
        return view('website.video', compact('videos'));
    }

    public function management()
    {
        $management = Management::orderBy('rank', 'asc')->get();
        return view('website.management', compact('management'));
    }

    public function service(){
        $services = Service::where('status', 'a')->latest()->get();
        return view('website.service', compact('services'));
    }



    public function serviceDetails($slug)
        {
            $service = Service::with('features')->where('status', 'a')->where('slug', $slug)->firstOrFail();
           $services = Service::where('status', 'a')->get();
            return view('website.service_details', compact('service', 'services'));
        }




    public function brandProduct($id)
    {
        $brand_product = Product::where('brand_id', $id)->get();
        return view('website.brandProduct', compact('brand_product'));
    }

    public function productCategory($id)
    {
        $product = Product::where('category_id', $id)->get();
        return view('website.categoryProduct', compact('product'));
    }



    public function ProductDetails($slug)
    {
        $product = Product::with('productImage')->where('slug', $slug)->first();
        return view('website.productDetails', compact('product'));
    }


    // product details popup

    public function product()
    {
        $product = Product::where('status', 1)->latest()->get();
        return view('website.product', compact('product'));
    }

    public function productList($id)
    {
        $data['brands'] = Brand::all();
        $subcategoris = SubCategory::where('id', $id)->first();
        $data['product'] = Product::with('features', 'inventory')->get()->map(function ($product) {
            $product->setRelation('features', $product->features->take(4));
            return $product;
        });
        $brandArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($brandArr, $item->brand_id);
        }
        $data['brand_array'] = $brandArr;
        $catArr = [];
        foreach ($data['product'] as $key => $item) {
            array_push($catArr, $item->category_id);
        }
        $data['category_array'] = $catArr;
        return view('website.product', compact('subcategoris'), $data);
    }



    // search main


    public function singleProduct($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->first();
        return view('website.singleProduct', compact('product'));
    }

    public function productSearch()
    {
        $data['brands'] = Brand::get();
        $data['category'] = Category::get();
        if (request()->query('q')) {
            $keyword = request()->query('q');
            $data['search_result'] = Product::with('features_4')->Where('name', 'like', "%$keyword%")->get()->map(function ($product) {
                $product->setRelation('features', $product->features->take(4));
                return $product;
            });
            $brandArr = [];
            foreach ($data['search_result'] as $key => $item) {
                array_push($brandArr, $item->brand_id);
            }

            $data['brand_array'] = $brandArr;

            $catArr = [];
            foreach ($data['search_result'] as $key => $item) {
                array_push($catArr, $item->category_id);
            }

            $data['category_array'] = $catArr;

            return view('website.search', $data);
        }

        return redirect()->back();
    }




    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $product = Product::where("name", "LIKE", "%" . $request->search . "%")
            ->orWhere("slug", "LIKE", "%" . $request->search . "%")
            ->orWhere("price", "LIKE", "%" . $request->search . "%")
            ->paginate(60);
        return view('website.search', compact('product'));
    }



    // Get Product
    public function productGet(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $product = Product::where("name", "LIKE", "%" . $request->search . "%")
            ->orWhere("slug", "LIKE", "%" . $request->search . "%")
            ->orWhere("price", "LIKE", "%" . $request->search . "%")
            ->get();

        return $product;
    }


    public function contactUs()
    {
        return view('website.contact');
    }

    public function contactStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:11',
            'email' => 'email|max:50',
            'subject' => 'required|max:100',
            'message' => 'required'
        ]);
        $contact = new Message();
        $contact->sender_name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->ip_address = $request->ip();
        $contact->save();
        return back()->with('success', 'Message send successfully');
    }

    public function aboutUs()
    {
        $partners = Partner::latest()->get();
        $managements = Management::orderBy('rank', 'asc')->get();
        return view('website.aboutUs', compact('managements', 'partners'));
    }

    public function companyInfo()
    {
        return view('website.company_info');
    }

    public function welcomeNote()
    {
        return view('website.welcome_note');
    }

    public function ourSpeciality()
    {
        return view('website.spaciality');
    }



    public function clientList()
    {
        $client = Team::latest()->get();
        return view('website.client_list', compact('client'));
    }


    public function brand()
    {
        $brand = Brand::get();
        return view('website.brand', compact('brand'));
    }


    public function return()
    {
        return view('website.return');
    }


    // public function orderTrack(Request $request)
    // {
    //     $order = Order::with(['customer'])->where('invoice_no', $request->invoice_no)->first();
    //     if ($order) {
    //         $orderItem = OrderDetails::with(['product'])->where('order_id', $order->id)->latest()->get();
    //         return view('website.trackorder', compact('order', 'orderItem'));
    //     } else {
    //         $notification = array(
    //             'message' => 'Order Not Found',
    //             'alert-type' => 'error'
    //         );
    //         return Redirect()->back()->with($notification);
    //     }
    // }
}
