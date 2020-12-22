<?php

namespace App\Http\Livewire;

use App\Models\Application;
use App\Models\Team;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ApplicationStatusChanged;
use \App\Actions\Jetstream\AddTeamMember;

class ApplicationView extends Component
{
    public $application;

    public $messageContent;
    public $isOpen = 0;
    public $isApproved = false;

    public function render()
    {
        $user = Auth::user();
        if (!$user->can('view', Application::class))
            abort(401);

        return view('applications.application-view', [
            'application' => $this->application,
        ]);
    }

    public function mount($id)
    {
        $this->application = Application::findOrFail($id);
    }


    public function approve()
    {
        $this->isApproved = true;
        $this->messageContent = 'Your merchant application has been approved.';
        $this->openModal();
    }

    public function reject()
    {
        $this->isApproved = false;
        $this->messageContent = 'Your merchant application has been rejected.';
        $this->openModal();
    }

    public function confirm()
    {
        $application = Application::findOrFail($this->application->id);

        $user = Auth::user();
        if (!$user->can('manage', $application))
            abort(401);

        $mailData = [
            'message' => $this->messageContent,
        ];

        Mail::to($user->email)->send(new ApplicationStatusChanged($mailData));

        $application->update([
            'reviewer_id' => Auth::id(),
            'status' => $this->isApproved ? 1 : 0,
            'comment' => $this->messageContent
        ]);

        if ($this->isApproved)
        {
            $merchantTeam = Team::find(2);

            $merchantTeam->users()->attach(
                $application->applicant,
            );

            $application->applicant->switchTeam($merchantTeam);
            
        }

        $this->application->status = $this->isApproved ? 1 : 0;

        $this->closeModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
}
