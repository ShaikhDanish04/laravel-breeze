<?php

namespace App\Http\Livewire;

// use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use Livewire\WithFileUploads;


class UploadPhotos extends Component
{
    use WithFileUploads;

    protected $listeners = ['storePhoto'];

    public $photos = [];

    public function storePhoto($imageBlob)
    {
        $imageBlob = str_replace('data:image/png;base64,', '', $imageBlob);
        $imageBlob = str_replace(' ', '+', $imageBlob);
        $imageName = 'profile.png';

        Storage::put('1/' . $imageName, base64_decode($imageBlob));
    }
    public function render()
    {
        return view('livewire.upload-photos');
    }
}
