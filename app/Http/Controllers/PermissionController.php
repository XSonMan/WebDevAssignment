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
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin';
        $admin_role->save();
        $admin_role->permissions()->attach($dev_permission);

        $user_role = new Role();
        $user_role->slug = 'user';
        $user_role->name = 'User';
        $user_role->save();
        $user_role->permissions()->attach($manager_permission);

        $admin_role = Role::where('slug','admin')->first();
        $user_role = Role::where('slug', 'user')->first();

        $adminPermission1 = new Permission();
        $adminPermission1->slug = 'manage-event';
        $adminPermission1->name = 'Manage Event';
        $adminPermission1->save();
        $adminPermission1->roles()->attach($admin_role);

        $userPermission1 = new Permission();
        $userPermission1->slug = 'payment';
        $userPermission1->name = 'Payment';
        $userPermission1->save();
        $userPermission1->roles()->attach($user_role);

        $admin_role = Role::where('slug','admin')->first();
        $user_role = Role::where('slug', 'user')->first();
        $admin_perm1= Permission::where('slug','manage-event')->first();
        $user_perm1= Permission::where('slug','payment')->first();

        $developer = new User();
        $developer->name = 'Son';
        $developer->email = 'Son@admin';
        $developer->password = bcrypt('123');
        $developer->is_admin = '1';
        $developer->status = '1';
        $developer->save();
        $developer->roles()->attach($admin_role);
        $developer->permissions()->attach($admin_perm1);

        $developer = new User();
        $developer->name = 'Gus';
        $developer->email = 'Gus@admin';
        $developer->password = bcrypt('123');
        $developer->is_admin = '1';
        $developer->status = '1';
        $developer->save();
        $developer->roles()->attach($admin_role);
        $developer->permissions()->attach($admin_perm1);

        $manager = new User();
        $manager->name = 'XSon';
        $manager->email = 'Son@use';
        $manager->password = bcrypt('123');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($user_role);
        $manager->permissions()->attach($user_perm1);

        $manager = new User();
        $manager->name = 'test';
        $manager->email = 'test@use';
        $manager->password = bcrypt('123');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($user_role);
        $manager->permissions()->attach($user_perm1);

        $manager = new User();
        $manager->name = 'cuba';
        $manager->email = 'cuba@use';
        $manager->password = bcrypt('123');
        $manager->is_admin = '0';
        $manager->status = '0';
        $manager->save();
        $manager->roles()->attach($user_role);
        $manager->permissions()->attach($user_perm1);


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
