<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Game extends Model
{
    protected $fillable = ['name', 'price', 'description', 'image_path', 'release_date'];

    public function addImage(UploadedFile $image)
    {
        $this->image_path = $image->store('images/games', 's3');
    }

    public function buyByUser(User $user)
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
