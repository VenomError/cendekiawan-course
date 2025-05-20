<?php
namespace App\Livewire\Setting;

use App\Models\Metadata as ModelMetadata;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Metadata extends Component
{
    public $keys = [];
    public $metadatas;

    public function mount()
    {
        $this->metadatas = ModelMetadata::orderBy('key')->get();
        $this->keys      = $this->metadatas->pluck('value', 'key');
    }

    public function render()
    {
        return view('livewire.setting.metadata');
    }
    public function save()
    {

        $this->validate([
            'keys.*' => ['required'],
        ], attributes: [
            'keys.*' => 'value',
        ]);

        foreach ($this->keys as $key => $value) {
            ModelMetadata::where('key', $key)->update([
                'value' => $value,
            ]);

            Cache::forget($key);
        }

        flash('Update Success');

    }
}
