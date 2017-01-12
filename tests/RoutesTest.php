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

        $this->visit('/register')->seeStatusCode(200);
        $this->visit('/staff')->seeStatusCode(200);
        $this->visit('/register/employer')->seeStatusCode(200);
        $this->visit('/register/employee')->seeStatusCode(200);

    }

    public function testAdminRoutes()
    {
        $user = User::where("admin_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);

        $this->visit('/home')
            ->see('Admin');

        $this->visit('/admin/user')->seeStatusCode(200);
        $this->visit('/admin/user/1')->seeStatusCode(200);
        $this->visit('/staff')->seeStatusCode(200);
        $this->visit('/admin/comments')->seeStatusCode(200);
        $this->visit('/admin/settings')->seeStatusCode(200);

        $this->visit('/profile')->seeStatusCode(200);
        $this->visit('/profile/security')->seeStatusCode(200);
        $this->visit('/profile/delete')->seeStatusCode(200);
    }

    public function testEmployeeRoutes() {
        $user = User::where("employee_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);


        $this->visit('/offers')->seeStatusCode(200);
        $this->visit('/my-reviews')->seeStatusCode(200);
        $this->visit('/home')->seeStatusCode(200);

        $this->visit('/staff/1')->seeStatusCode(200);

        $this->visit('/profile')->seeStatusCode(200);
        $this->visit('/profile/skills')->seeStatusCode(200);
        $this->visit('/profile/experience')->seeStatusCode(200);
        $this->visit('/profile/availability')->seeStatusCode(200);
        $this->visit('/profile/security')->seeStatusCode(200);
        $this->visit('/profile/delete')->seeStatusCode(200);
    }

    public function testEmployerRoutes() {
        $user = User::where("employer_id", "!=", null)->get();
        $user = $user[0];

        $this->be($user);

        $this->visit('/jobs')->seeStatusCode(200);        
        $this->visit('/reviews')->seeStatusCode(200);
        $this->visit('/staff')->seeStatusCode(200);
        $this->visit('/staff/1')->seeStatusCode(200);
        $this->visit('/home')->seeStatusCode(200);

        $this->visit('/profile')->seeStatusCode(200);
        $this->visit('/profile/subscription')->seeStatusCode(200);
        $this->visit('/profile/security')->seeStatusCode(200);
        $this->visit('/profile/delete')->seeStatusCode(200);
    }


}
