<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use \App\Models\Application;
use Livewire\WithPagination;


class ApplicationList extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('viewAny', Application::class))
            abort(401);

        $searchTerm = '%'.$this->searchTerm.'%';
        return view('applications.application-list', [
            'applications' => Application::join('users', 'users.id', '=', 'applications.applicant_id')->whereNull('status')->where('name', 'like', $searchTerm)->select("applications.*")->paginate(10),
        ]);
    }
}
