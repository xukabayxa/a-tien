<?php

namespace App\Http\Controllers\Front;

use App\Http\Traits\ResponseTrait;
use App\Model\Admin\ActivityCategory;
use App\Model\Admin\ActivityPost;
use App\Model\Admin\Banner;
use App\Model\Admin\CategorySpecial;
use App\Model\Admin\Contact;
use App\Model\Admin\CustomerRepresentative;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Origin;
use App\Model\Admin\Policy;
use App\Model\Admin\PostCategorySpecial;
use App\Model\Admin\Project;
use App\Model\Admin\Store;
use App\Model\Common\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Vanthao03596\HCVN\Models\Province;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use App\Http\Controllers\Controller;
use App\Helpers\FileHelper;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Review;
use App\Model\Admin\Config;
use DB;
use Mail;
use SluggableScopeHelpers;

class FrontController extends Controller
{
    use ResponseTrait;
    protected $view;

    public function __construct(Agent $agent)
    {
        $this->view = 'front';
    }

    public function index()
    {
        $config = Config::query()->first();
        $banners = Banner::query()->where('page', 'home_page')->get();
        $posts = Post::query()->latest()->take(5)->get();

        // lấy các sản phẩm ghim ngoài trang chủ
        $products = Product::query()->get();
//        $customers = CustomerRepresentative::query()->latest()->get();

        return view($this->view . '.index', compact('banners', 'config', 'posts', 'products'));
    }

    // trang danh sách sản phẩm
    public function getProductCategory(Request $request) {
        $products = Product::query();

        if($request->order == 'alpha-asc') {
            $products = $products->orderBy('name', 'asc');
        } elseif ($request->order == 'alpha-desc') {
            $products = $products->orderBy('name', 'desc');
        } else {
            $products = $products->latest();
        }

        $products = $products->paginate(15);

        return view($this->view . '.product_category', compact('products'));
    }

    public function getDataProduct(Request $request, $id) {
        $product = Product::query()->with('image')->find($id);

        return $this->responseSuccess("", $product);
    }

    // trang chi tiết sản phẩm
    public function getDetailProduct($slug) {
        $product = Product::findSlug($slug);

        return view($this->view . '.product_detail', compact('product'));
    }

    // trang danh sách bài viết
    public function getPosts(Request $request) {
        $posts = Post::query()->latest()->paginate(9);
        // tin nổi bật
        $postSpecial = CategorySpecial::query()->find(5)->posts;

        return view($this->view . '.news', compact('posts', 'postSpecial'));
    }

    // trang chi tiết bài viết
    public function getPostDetail(Request $request, $slug) {
        $post = Post::findBySlug($slug);
        // tin liên quan
        $postRe = $post->category->posts()->limit(5)->get();
        // tin khác
        $postOther = Post::query()->whereNotIn('id', [$post->id])->get()->random(3);

        return view($this->view . '.news_detail', compact('post', 'postRe', 'postOther'));
    }

    // trang liên hệ
    public function contact(Request $request) {
        $config = Config::query()->get()->first();

        return view($this->view . '.contact', compact('config'));
    }

    public function sendContact(Request $request)
    {

        $rule = [
            'user_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^(0)[0-9]{9,11}$/',
            'content' => 'required',
        ];

        $translate =
            [
                'user_name.required' => 'Vui lòng nhập họ tên',
                'email.email' => 'Email không hợp lệ',
                'phone_number.required' => 'Vui lòng nhập số điện thoại',
                'phone_number.regex' => 'Số điện thoại không hợp lệ',
                'content.required' => 'Vui lòng nhập nội dung liên hệ',
            ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            $translate
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            return Response::json($json);
        }

        $contact = new Contact();
        $contact->user_name = $request->user_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->content = $request->content;
        $contact->address = $request->address;

        $contact->save();

        return $this->responseSuccess();
    }

    public function resetPass() {
        $user = User::query()->where('email', 'admin@gmail.com')->first();

        $user->password = bcrypt('12332121');
        $user->save();

        return response()->json(['user' => $user, 'message' => 'reset mật khẩu thành công']);
    }

}
