<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;
use App\Models\Application;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    public $staffTeam;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->staffTeam = Team::find(1);
    }

    public function before(User $user, $ability)
    {
        if ($user->currentTeam->id === 1)
        {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Application $application)
    {
        return false;
    }

    public function manage(User $user, Application $application)
    {
        return false;
    }
}
