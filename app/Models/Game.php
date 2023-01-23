<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Game extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_path', 'release_date'];

    function addImage(UploadedFile $image)
    {
        $name = $image->getClientOriginalName();
        $destination = 'images/games/'.$this->id;
        $image->move(public_path($destination), $name);

        $this->image_path = $destination.'/'.$name;
    }

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
}
