<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_path', 'release_date'];

    function buyByUser(User $user)
    {
        if ($this->release_date < now() && !$user->hasGame($this) && $this->price <= $user->credits) {
            $user->credits -= $this->price;
            $user->save();

            Library::create(['user_id' => $user->id, 'game_id' => $this->id]);

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
