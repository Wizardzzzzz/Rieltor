<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function advertisement()
    {
        return $this->belongsTo("App\Models\Advertisement");
    }

    public static function getImagesById($id)
    {
        return Images::where('adv_id', $id)->get();
    }

    public static function getImage()
    {
        $images = Images::all();
        $photos = [];
        $adv_id = 0;
        foreach ($images as $image) {
            if ($image['adv_id'] != $adv_id) {
                $adv_id = $image["adv_id"];
                $photos[$adv_id] = $image["path"];
            }
        }
        return $photos;
    }

    public static function setImage($id)
    {
        $count = 0;
        foreach ($_FILES['photos']['name'] as $key) {
            $file = "../public/upload/" . basename($_FILES['photos']['name'][$count]);

            if (move_uploaded_file($_FILES['photos']['tmp_name'][$count], $file)) {
                $image = new Images();
                $image->adv_id = $id;
                $image->path = $key;
                $image->save();
                $count++;
            }
        }
    }

    use HasFactory;
}
