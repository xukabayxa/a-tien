<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use App\Model\Common\ProductCategory;
use App\Model\G7\G7Product;
use App\Model\G7\G7ProductPrice;
use Illuminate\Database\Eloquent\Model;
use App\Model\Common\File;
use Illuminate\Support\Facades\Auth;
use App\Model\Common\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Helpers\FileHelper;

class Product extends BaseModel
{
    protected $fillable = ['name', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at',
        'price', 'origin', 'base_price', 'body', 'intro', 'slug', 'short_des'];

    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public const STATUS_SUCCESS = 1;
    public const STATUS_DANGER = 0;

    public const STATUSES = [
        [
            'id' => 1,
            'name' => 'Hoạt động',
            'type' => 'success'
        ],
        [
            'id' => 0,
            'name' => 'Khóa',
            'type' => 'danger'
        ]
    ];

    public function canDelete()
    {
        return true;
    }

    public function canEdit()
    {
        return Auth::user()->type == User::SUPER_ADMIN || Auth::user()->type == User::QUAN_TRI_VIEN;
    }

    public function g7_products()
    {
        return $this->hasMany(G7Product::class, 'root_product_id', 'id');
    }

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function category_specials()
    {
        return $this->belongsToMany(CategorySpecial::class, 'product_category_special', 'product_id', 'category_special_id');
    }

    public function g7_price()
    {
        return $this->hasOne(G7ProductPrice::class, 'product_id')->where('g7_id', Auth::user()->g7_id);
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'image',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->origin)) {
            $result = $result->where('origin', 'like', '%' . $request->origin . '%');
        }

        if (!empty($request->cate_special_id)) {
            $cate_special_id = $request->cate_special_id;
            $result = $result->whereHas('category_specials', function ($q) use ($cate_special_id) {
                $q->where('category_special_id', $cate_special_id);
            });
        }

        if ($request->status === 0 || $request->status === '0' || !empty($request->status)) {
            $result = $result->where('status', $request->status);
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getForSelect()
    {
        return self::select(['id', 'name'])
            ->where('status', 1)
            ->orderBy('name', 'ASC')
            ->get();
    }

    public static function getDataForEdit($id)
    {
        $product = self::where('id', $id)
            ->with([
                'image',
                'galleries' => function ($q) {
                    $q->select(['id', 'product_id', 'sort'])
                        ->with(['image'])
                        ->orderBy('sort', 'ASC');
                },
            ])
            ->firstOrFail();

        $product->category_special_ids = $product->category_specials->pluck('id')->toArray();

        return $product;
    }

    public static function findSlug($slug)
    {
        $object = self::findBySlug($slug);
        return self::where('id', $object->id)
            ->with([
                'image',
                'galleries' => function ($q) {
                    $q->select(['id', 'product_id', 'sort'])
                        ->with(['image'])
                        ->orderBy('sort', 'ASC');
                },
            ])
            ->firstOrFail();
    }

    public static function getRelate($id, $cate_id)
    {
        return self::where('id', '<>', $id)
            ->where([
                'status' => 1,
                'cate_id' => $cate_id
            ])
            ->orderBy('created_at', 'desc')->get();
    }

    public function generateCode()
    {
        $this->code = "HH-" . generateCode(6, $this->id);
        $this->save();
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }

            $deleted = ProductGallery::where('product_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = ProductGallery::find($g['id']);
                else $gallery = new ProductGallery();

                $gallery->product_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) $gallery->image->removeFromDB();
                    $file = $g['image'];
                    FileHelper::uploadFile($file, 'product_gallery', $gallery->id, ProductGallery::class, null, 1);
                }
            }
        }
    }

    public function scopeFilter($query, $filters)
    {
        $query = self::query();
        if ($filters) {
            $filters = array_merge(...array_values($filters));
            if (@$filters['manu']) {
                $query->whereIn('manufacturer_id', $filters['manu']);
            }
            if (@$filters['origin']) {
                $query->whereIn('origin_id', $filters['origin']);
            }

            if (@$filters['prices']) {
                $prices = $filters['prices'];

                $query->where(function ($q) use ($prices) {
                    foreach ($prices as $price) {
                        $price = json_decode($price, true);
                        if (count($price) > 1) {
                            $q->orWhere(function ($q) use ($price) {
                                $q->where('price', '>=', $price[0])
                                    ->where('price', '<=', $price[1]);
                            });
                        } else {
                            if ($price[0] == 16000000) {
                                $q->orWhere('price', '>=', 15000000);
                            } else {
                                $q->orWhere('price', '<=', $price[0]);
                            }
                        }
                    }
                });
            }

            if (@$filters['sorts']) {
                $sorts = $filters['sorts'];

                if (in_array('new_asc', $sorts)) {
                    $query->orderBy('created_at', 'desc');
                }
                if (in_array('price_asc', $sorts)) {
                    $query->orderBy('price', 'asc');
                }
                if (in_array('price_desc', $sorts)) {
                    $query->orderBy('price', 'desc');
                }

            }
        }

        return $query;
    }

    public function scopeFilterV2($query, $filters)
    {
        $query = self::query();
        if ($filters) {
            $filters = array_merge(...array_values($filters));
            if (@$filters['manu']) {
                $query->whereIn('manufacturer_id', $filters['manu']);
            }
            if (@$filters['origin']) {
                $query->whereIn('origin_id', $filters['origin']);
            }

            if (@$filters['prices']) {
                $prices = $filters['prices'];

                $query->where(function ($q) use ($prices) {
                    foreach ($prices as $price) {
                        $price = json_decode($price, true);
                        if (count($price) > 1) {
                            $q->orWhere(function ($q) use ($price) {
                                $q->where('price', '>=', $price[0])
                                    ->where('price', '<=', $price[1]);
                            });
                        } else {
                            if ($price[0] == 16000000) {
                                $q->orWhere('price', '>=', 15000000);
                            } else {
                                $q->orWhere('price', '<=', $price[0]);
                            }
                        }
                    }
                });
            }
        }

        return $query;
    }
}
