<?php

namespace App\Http\Controllers;


use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->password = password_hash($request->get('password'), PASSWORD_BCRYPT);
        $user->email = $request->get('email');
        $user->role_id = $request->get('role_id');
        $user->active = false;

        $user->save();

        return fractal()
                ->item($user)
                ->transformWith(new UserTransformer());
    }

    /**
     * @param User $user
     * @return $this
     */
    public function show(User $user)
    {
        return fractal()
                ->item($user)
                ->parseIncludes(['role'])
                ->transformWith(new UserTransformer());
    }


    /**
     * @return array
     */
    public function all()
    {
        return fractal()
                ->collection(User::all())
                ->parseIncludes('role')
                ->transformWith(new UserTransformer())
                ->toArray();
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return $this
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->get('name', $user->name);
        $user->email = $request->get('email', $user->email);
        $user->role_id = $request->get('role_id', $user->role_id);

        $user->save();

        return fractal()
            ->item($user)
            ->parseIncludes('role')
            ->transformWith(new UserTransformer());


    }

    /**
     * @param User $user
     * @return $this
     * @internal param User $user
     *
     */
    public function destroy(User $user)
    {
        $user->delete();

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer());
    }
}