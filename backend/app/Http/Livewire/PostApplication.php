<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Application;
use Illuminate\Support\Facades\Auth;

class PostApplication extends Component
{
    public $text;

    protected $rules = [
        'text' => 'required|min:20',
    ];

    public function render()
    {
        return view('applications.post-application');
    }

    public function submit()
    {
        $this->validate();

        Application::create([
            'text' => $this->text,
            'applicant_id' => Auth::id(),
        ]);

        return redirect()->to('/');
    }
}
