<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Employee;
use App\Employer;
use App\Admin;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPublicRoutes()
    {
        $this->visit('/register');
        $this->visit('/staff');
        $this->visit('/register/employer');
        $this->visit('/register/employee');
    }

    public function testAdminRoutes()
    {
        $user = User::where("admin_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);

        $this->visit('/home')
            ->see('Admin');

        $this->visit('/admin/user');
        $this->visit('/admin/user/1');
        $this->visit('/staff');
        $this->visit('/admin/comments');
        $this->visit('/admin/settings');

        $this->visit('/profile');
        $this->visit('/profile/security');
        $this->visit('/profile/delete');
    }

    public function testEmployeeRoutes() {
        $user = User::where("employee_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);

        $this->visit('/offers');        
        $this->visit('/my-reviews');
        $this->visit('/home');

        $this->visit('/staff/'.$user->id);

        $this->visit('/profile');
        $this->visit('/profile/skills');
        $this->visit('/profile/experience');
        $this->visit('/profile/availability');
        $this->visit('/profile/security');
        $this->visit('/profile/delete');
    }

    public function testEmployerRoutes() {
        $user = User::where("employer_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);

        $this->visit('/jobs');        
        $this->visit('/reviews');
        $this->visit('/staff');
        $this->visit('/staff/1');
        $this->visit('/home');

        $this->visit('/profile');
        $this->visit('/profile/subscription');
        $this->visit('/profile/security');
        $this->visit('/profile/delete');
    }
}
