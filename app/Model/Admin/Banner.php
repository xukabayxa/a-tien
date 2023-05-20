<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use App\Model\Common\File;

class Banner extends BaseModel
{
    protected $table = 'banners';

//    protected $fillable = ['post_id', 'category_special_id'];

    public const PAGES = [
        'home_page' => 'Trang chủ',
        'news_page' => 'Trang tin tức',
        'contact_page' => 'Trang liên hệ',
        'about_page' => 'Trang giới thiệu',
        'activity_page' => 'Trang lĩnh vực hoạt động',
    ];

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'image',
        ]);

        if (!empty($request->title)) {
            $result = $result->where('title', 'like', '%' . $request->title . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getDataForEdit($id)
    {
        return self::with('image')->where('id', $id)
            ->firstOrFail();
    }

    public function canDelete()
    {
        return true;
    }
}
