<?php

namespace App\Observers;

use App\Project;
use App\Notifications\QA_EmailNotification;
use Illuminate\Support\Facades\Notification;

class ProjectCrudActionObserver
{

    public function created(Project $model)
    {
        $emails = ["admin@admin.com"];
        $data = [
            "action" => "Created",
            "crud_name" => "Projects"
        ];

        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));

    }

    public function updated(Project $model)
    {
        $emails = ["admin@admin.com"];
        $data = [
            "action" => "Updated",
            "crud_name" => "Projects"
        ];
        $users = \App\User::where("email", $emails)->get();
        Notification::send($users, new QA_EmailNotification($data));
    }

    

}