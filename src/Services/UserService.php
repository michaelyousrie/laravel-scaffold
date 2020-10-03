<?php

namespace LaravelScaffold\Services;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LaravelScaffold\Resources\UserResource;
use LaravelScaffold\Responses\FailResponse;
use LaravelScaffold\Responses\CreatedResponse;
use LaravelScaffold\Responses\SuccessResponse;
use LaravelScaffold\Responses\NotFoundResponse;
use LaravelScaffold\Repositories\UserRepository;

class UserService extends ScaffoldService
{
    public function __construct(UserRepository $userRepo)
    {
        $this->repo = $userRepo;
    }

    public function getLoggedIn()
    {
        return (new SuccessResponse)
            ->setData(new UserResource(Auth::guard('api')->user()))
            ->send();
    }

    public function createUser($request)
    {
        $user = $this->repo->create([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'password'  => bcrypt($request->password),
            'api_token' => Str::random(80)
        ]);

        return (new CreatedResponse)
            ->setData(['user' => new UserResource($user)])
            ->send();
    }

    public function login($request)
    {
        $user = $this->repo->getBy('email', $request->email);

        if ($user == false) {
            return (new NotFoundResponse())
                ->setErrors(['email' => __("scaffold::errors.wrong_email")])
                ->send();
        }

        if (!Hash::check($request->password, $user->password)) {
            return (new FailResponse())
                ->setErrors(['password' => __("scaffold::errors.wrong_password")])
                ->send();
        }

        $user->api_token = Str::random(80);
        $user->save();

        $user = User::find($user->id);

        return (new SuccessResponse)
            ->setData(['user' => new UserResource($user)])
            ->send();
    }
}
