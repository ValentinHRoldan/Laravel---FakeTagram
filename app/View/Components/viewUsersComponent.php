<?php

namespace App\View\Components;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class viewUsersComponent extends Component
{
    public $users;

    public function __construct($usersId = [])
    {
        if(empty($usersId)){
            $this->users = User::paginate(10);
        }
        else{
            $this->users = User::whereIn('id', $usersId)->paginate(10);
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.view-users-component');
    }
}
