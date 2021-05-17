<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function Permission()
    {
        $dev_permission = Permission::where('slug','manage-event')->first();
        $manager_permission = Permission::where('slug', 'payment')->first();

        //RoleTableSeeder.php
        $dev_role = new Role();
        $dev_role->slug = 'admin';
        $dev_role->name = 'Admin';
        $dev_role->save();
        $dev_role->permissions()->attach($dev_permission);

        $manager_role = new Role();
        $manager_role->slug = 'user';
        $manager_role->name = 'User';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission);

        $dev_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'user')->first();

        $createTasks = new Permission();
        $createTasks->slug = 'manage-event';
        $createTasks->name = 'Manage Event';
        $createTasks->save();
        $createTasks->roles()->attach($dev_role);

        $editUsers = new Permission();
        $editUsers->slug = 'payment';
        $editUsers->name = 'Payment';
        $editUsers->save();
        $editUsers->roles()->attach($manager_role);

        $dev_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'user')->first();
        $dev_perm = Permission::where('slug','manage-event')->first();
        $manager_perm = Permission::where('slug','payment')->first();

        $developer = new User();
        $developer->name = 'Admin1';
        $developer->email = 'Son@admin.com';
        $developer->password = bcrypt('123456');
        $developer->is_admin = '1';
        $developer->status = '1';
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);

        $developer = new User();
        $developer->name = 'Admin2';
        $developer->email = 'Gus@admin.com';
        $developer->password = bcrypt('123456');
        $developer->is_admin = '1';
        $developer->status = '1';
        $developer->save();
        $developer->roles()->attach($dev_role);
        $developer->permissions()->attach($dev_perm);

        $manager = new User();
        $manager->name = 'User1';
        $manager->email = 'Son@user.com';
        $manager->password = bcrypt('123456');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

        $manager = new User();
        $manager->name = 'User2';
        $manager->email = 'test@user.com';
        $manager->password = bcrypt('123456');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);

        $manager = new User();
        $manager->name = 'User3';
        $manager->email = 'cuba@user.com';
        $manager->password = bcrypt('123456');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);


        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
