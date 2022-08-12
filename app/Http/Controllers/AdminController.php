<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipUserStoreRquest;
use App\Models\MembershipType;
use App\Models\MembershipUser;
use App\Models\User;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index(){
        return view('dashboard.index');
    }

    public function create(){
        $memberships =  MembershipType::all();
        return view('dashboard.create',compact('memberships'));
    }

    public function membershipUserStore(MembershipUserStoreRquest $request){
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->bd = $request->bd;
        $user->password = 'password';
        $user->gym_id = auth()->user()->gym_id;
        $user->save();

        $membership = new MembershipUser();
        $membership->user_id = $user->id;
        $membership->membership_type_id = $request->membership;
        $membership_type_data =  MembershipType::find($request->membership);
        $membership_days_seconds  =  $membership_type_data->period * 30 * 24 * 60 * 60;
        $membership_end_date =  \DateTime::createFromFormat( 'U', time() + $membership_days_seconds );
        $membership->membership_end_date = $membership_end_date->format("Y-m-d");
        $membership->save();

        return redirect('admin');
    }
}
