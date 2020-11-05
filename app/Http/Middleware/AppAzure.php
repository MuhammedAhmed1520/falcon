<?php

namespace App\Http\Middleware;

use App\Models\User;
use RootInc\LaravelAzureMiddleware\Azure as Azure;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

use Auth;


class AppAzure extends Azure
{
    protected function success($request, $access_token, $refresh_token, $profile)
    {
        $graph = new Graph();
        $graph->setAccessToken($access_token);

        $graph_user = $graph->createRequest("GET", "/me")
            ->setReturnType(Model\User::class)
            ->execute();

        $email = strtolower($graph_user->getUserPrincipalName());

        $user = User::updateOrCreate(['username' => $email], [
            'name' => $graph_user->getGivenName()." ".$graph_user->getSurname(),
        ]);

        Auth::login($user, true);

        return redirect('system');
        return parent::success($request, $access_token, $refresh_token, $profile);
    }

    protected function redirect($request)
    {
        if (Auth::user() !== null)
        {
            return $this->azure($request);
        }
        else
        {
            return parent::redirect($request);
        }
    }
}
