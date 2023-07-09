<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\AttributeValue;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Product;
use App\Model\Admin\ProductCategorySpecial;
use App\Model\Common\File;
use Illuminate\Http\Request;
use App\Model\Admin\Product as ThisModel;
use App\Model\Common\Unit;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use Rap2hpoutre\FastExcel\FastExcel;
use PDF;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use DB;
use App\Helpers\FileHelper;
use App\Model\Common\User;
use App\Model\Common\ActivityLog;
use Auth;

class ProductController extends Controller
{
    protected $view = 'admin.products';
    protected $route = 'Product';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->addColumn('name', function ($object) {
                return $object->name;
            })
            ->editColumn('image', function ($object) {
                if($object->image) {
                    return '<img width="160" height="120" src="'.$object->image->path.'">';
                }
                return '<img width="160" height="120" src="">';
            })
            ->editColumn('base_price', function ($object) {
                return formatCurrent($object->base_price);
            })
            ->editColumn('price', function ($object) {
                return formatCurrent($object->price);
            })
            ->editColumn('created_at', function ($object) {
                return Carbon::parse($object->created_at)->format("d/m/Y");
            })
            ->editColumn('created_by', function ($object) {
                return $object->user_create->name ? $object->user_create->name : '';
            })
            ->editColumn('updated_by', function ($object) {
                return $object->user_update->name ? $object->user_update->name : '';
            })
            ->editColumn('cate_id', function ($object) {
                return $object->category ? $object->category->name : '';
            })
            ->addColumn('category_special', function ($object) {
                return $object->category_specials->implode('name', ', ');
            })
            ->addColumn('action', function ($object) {
                $result = '<div class="btn-group btn-action">
                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class = "fa fa-cog"></i>
                </button>
                <div class="dropdown-menu">';

                if ($object->canEdit()) {
                    $result = $result . ' <a href="' . route($this->route . '.edit', $object->id) . '" title="sửa" class="dropdown-item"><i class="fa fa-angle-right"></i>Sửa</a>';
                }
                if ($object->canDelete()) {
                    $result = $result . ' <a href="' . route($this->route . '.delete', $object->id) . '" title="xóa" class="dropdown-item delete"><i class="fa fa-angle-right"></i>Xóa</a>';

                }

                $result = $result . ' <a href="" title="thêm vào danh mục đặc biệt" class="dropdown-item add-category-special"><i class="fa fa-angle-right"></i>Thêm vào danh mục đặc biệt</a>';
                $result = $result . ' <a href="' . route($this->route . '.pin', $object->id) . '" title="ghim vào trang chủ" class="dropdown-item confirm"><i class="fa fa-angle-right"></i>Ghim vào trang chủ</a>';
                $result = $result . '</div></div>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['action','image'])
            ->make(true);
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:products,name',
                'origin' => 'nullable',
                'intro' => 'nullable',
                'short_des' => 'nullable',
                'body' => 'nullable',
                'base_price' => 'nullable|integer',
                'price' => 'required|integer',
                'status' => 'required|in:0,1',
                'image' => 'required|file|mimes:jpg,jpeg,png|max:3000',
                'galleries' => 'nullable|array|min:1|max:20',
                'galleries.*.image' => 'nullable|file|mimes:png,jpg,jpeg|max:10000',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = new ThisModel();
            $object->name = $request->name;
            $object->origin = $request->origin;
            $object->intro = $request->intro;
            $object->short_des = $request->short_des;
            $object->body = $request->body;
            $object->base_price = $request->base_price;
            $object->price = $request->price;
            $object->status = $request->status;

            $object->save();

            FileHelper::uploadFile($request->image, 'products', $object->id, ThisModel::class, 'image', 1);

            $object->syncGalleries($request->galleries);

            DB::commit();
            ActivityLog::createRecord("Thêm mới hàng hóa thành công", route('Product.edit', $object->id, false));
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function edit($id)
    {
        $object = ThisModel::getDataForEdit($id);
        return view($this->view . '.edit', compact('object'));
    }

    public function update(Request $request, $id)
    {
        $validate = \Illuminate\Support\Facades\Validator::make(
            $request->all(),
            [
                'name' => 'required|unique:products,name,' . $id,
                'origin' => 'nullable',
                'short_des' => 'nullable',
                'intro' => 'nullable',
                'body' => 'nullable',
                'base_price' => 'nullable|integer',
                'price' => 'required|integer',
                'status' => 'required|in:0,1',
                'image' => 'nullable|file|mimes:jpg,jpeg,png|max:3000',
                'galleries' => 'nullable|array|min:1|max:20',
                'galleries.*.image' => 'required_without:galleries.*.id|file|mimes:png,jpg,jpeg',

                'attributes' => 'array',
                'attributes.*.attribute_id' => 'required',
                'attributes.*.value' => 'required',
            ]
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = ThisModel::findOrFail($id);

            if (!$object->canEdit()) {
                $json->success = false;
                $json->message = "Bạn không có quyền sửa hàng hóa này";
                return Response::json($json);
            }

            $object->name = $request->name;
            $object->origin = $request->origin;
            $object->intro = $request->intro;
            $object->short_des = $request->short_des;
            $object->body = $request->body;
            $object->base_price = $request->base_price;
            $object->price = $request->price;
            $object->status = $request->status;

            $object->save();

            if ($request->image) {
                if ($object->image) {
                    FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
                }
                FileHelper::uploadFile($request->image, 'products', $object->id, ThisModel::class, 'image', 1);
            }

            $object->syncGalleries($request->galleries);


            DB::commit();
            ActivityLog::createRecord("Cập nhật hàng hóa thành công", route('Product.edit', $object->id, false));
            $json->success = true;
            $json->message = "Thao tác thành công!";
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);
        if (!$object->canDelete()) {
            $message = array(
                "message" => "Không thể xóa!",
                "alert-type" => "warning"
            );
        } else {
            $object->delete();
            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );
        }
        return redirect()->route($this->route . '.index')->with($message);
    }

    public function pin($id)
    {
        $object = ThisModel::findOrFail($id);

        $object->pin_home_page = true;
        $object->save();

        $message = array(
            "message" => "Thao tác thành công!",
            "alert-type" => "success"
        );

        return redirect()->route($this->route . '.index')->with($message);
    }

    public function getData(Request $request, $id)
    {
        $json = new stdclass();
        $json->success = true;
        $json->data = ThisModel::getDataForEdit($id);
        return Response::json($json);
    }

    // Xuất Excel
    public function exportExcel(Request $request)
    {
        return (new FastExcel(ThisModel::searchByFilter($request)))->download('danh_sach_hang_hoa.xlsx', function ($object) {
            if (Auth::user()->type == User::G7 || Auth::user()->type == User::NHOM_G7) {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Giá bán' => formatCurrency($object->g7_price->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            } else {
                return [
                    'ID' => $object->id,
                    'Mã' => $object->code,
                    'Tên' => $object->name,
                    'Loại' => $object->category->name,
                    'Giá đề xuất' => formatCurrency($object->price),
                    'Điểm tích lũy' => $object->point,
                    'Trạng thái' => $object->status == 0 ? 'Khóa' : 'Hoạt động',
                ];
            }
        });
    }

    // Xuất PDF
    public function exportPDF(Request $request)
    {
        $data = ThisModel::searchByFilter($request);
        $pdf = PDF::loadView($this->view . '.pdf', compact('data'));
        return $pdf->download('danh_sach_hang_hoa.pdf');
    }

    public function addToCategorySpecial(Request $request)
    {
        $product = Product::query()->find($request->product_id);

        $product->category_specials()->sync($request->category_special_ids);

        return Response::json(['success' => true, 'message' => 'Thêm sản phẩm vào danh mục đặc biệt thành công']);
    }

    public function deleteAllFile() {
        File::query()->truncate();
    }
}
