<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Game extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_path', 'release_date'];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function addImage(UploadedFile $image)
    {
        $this->image_path = $image->store('images/games', 's3');
    }

    public function buyByUser(User $user)
    {
        if ($this->release_date < now() && !$user->hasGame($this) && $this->getFinalPrice() <= $user->credits) {
            Library::create(['user_id' => $user->id, 'game_id' => $this->id]);

            $user->credits -= $this->getFinalPrice();
            $user->save();

            return true;
        }
        return false;
    }

    function getFinalPrice()
    {
        $price = $this->price;

        foreach ($this->promotions as $promotion) {
            if ($promotion->start_date < now() && $promotion->end_date > now() && $promotion->price < $price) {
                $price = $promotion->price;
            }
        }

        return $price;
    }

    function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
