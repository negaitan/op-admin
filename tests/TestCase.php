<?php

namespace Tests;

use App\Models\Auth\Role;
use App\Models\Auth\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

/**
 * Class TestCase.
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create the admin role or return it if it already exists.
     *
     * @return mixed
     */
    protected function getAdminRole()
    {
        if ($role = Role::whereName(config('access.users.admin_role'))->first()) {
            return $role;
        }

        $adminRole = factory(Role::class)->create(['name' => config('access.users.admin_role')]);
        $adminRole->givePermissionTo(factory(Permission::class)->create(['name' => 'view backend']));

        return $adminRole;
    }

    /**
     * Create an administrator.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    protected function createAdmin(array $attributes = [])
    {
        $adminRole = $this->getAdminRole();
        $admin = factory(User::class)->create($attributes);
        $admin->assignRole($adminRole);

        return $admin;
    }

    /**
     * Login the given administrator or create the first if none supplied.
     *
     * @param bool $admin
     *
     * @return bool|mixed
     */
    protected function loginAsAdmin($admin = false)
    {
        if (! $admin) {
            $admin = $this->createAdmin();
        }

        $this->actingAs($admin);

        return $admin;
    }

    /**
     * Make ajax POST request
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @param  boolean  $json
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxPost($uri, array $data = [], $json = false)
    {
        switch ($json) {
            case true:
                return $this->postJson($uri, $data, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
                break;
            default:
                return $this->post($uri, $data, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
        }
    }

    /**
     * Make ajax GET request
     *
     * @param  string  $uri
     * @param  array  $data
     * @param  boolean  $json
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function ajaxGet($uri, array $data = [], $json = false)
    {
        switch ($json) {
            case true:
                return $this->getJson($uri, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
                break;
            default:
                return $this->get($uri, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
        }
    }
}
