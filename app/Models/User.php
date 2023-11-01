<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
   
    static public function getSingle($id){
        return self::find($id);
    }

    static public function getSingleClass($id){
        return self::select('users.*', 'class.amount', 'class.name as class_name')
                    ->join('class', 'class.id', 'users.class_id')
                    ->where('users.id', '=', $id)
                    ->first();
    }

    static public function SearchUser($search){
        $return = self::select('users.*')
                ->where(function($query) use ($search){
            $query->where('users.name', 'like', '%'.$search.'%')
            ->orWhere('users.last_name', 'like', '%'.$search.'%');
        })
                ->limit(10)
                ->get();
        return $return;
    }


    static function getAdmin()
    {
        $return = self::select('users.*')
                            ->where('user_type','=',1)
                            ->where('is_delete','=',0);
                            if(!empty(Request::get('name')))
                            {
                                $return = $return ->where('name','like','%'.Request::get('name').'%');
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return ->where('email','like','%'.Request::get('email').'%');
                            }
        $return = $return ->orderBy('id', 'desc')
        ->paginate(25);
        return $return;

    }

    static function getParent()
    {
        $return = self::select('users.*')
                            ->where('user_type','=',5)
                            ->where('is_delete','=',0);
                            if(!empty(Request::get('name')))
                            {
                                $return = $return ->where('users.name','like','%'.Request::get('name').'%');
                            }
                            if(!empty(Request::get('last_name')))
                            {
                                $return = $return ->where('users.last_name','like','%'.Request::get('last_name').'%');
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return ->where('users.email','like','%'.Request::get('email').'%');
                            }
                            
                            if(!empty(Request::get('gender')))
                            {
                                $return = $return ->where('users.gender','like','%'.Request::get('gender').'%');
                            }
                            if(!empty(Request::get('occupation')))
                            {
                                $return = $return ->where('users.occupation','like','%'.Request::get('occupation').'%');
                            }
                            if(!empty(Request::get('address')))
                            {
                                $return = $return ->where('users.address','like','%'.Request::get('address').'%');
                            }
                            if(!empty(Request::get('mobile_number')))
                            {
                                $return = $return ->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
                            }
                            
                            if(!empty(Request::get('created_at')))
                            {
                                $return = $return ->wheredate('users.created_at','=', Request::get('created_at'));
                            }
                            if(!empty(Request::get('status')))
                            {
                                $status = (Request::get('status') == 100) ? 0 : 1;
                                $return = $return->whereDate('users.status', '=', $status);
                            }
        $return = $return ->orderBy('id', 'desc')
        ->paginate(25);
        return $return;

    }

    static function getStudent()
    {
        $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_last_name')
                            ->join('class', 'class.id', '=', 'users.class_id', 'left')
                            ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
                            ->where('users.user_type','=',2)
                            ->where('users.is_delete','=',0);
                            if(!empty(Request::get('name')))
                            {
                                $return = $return ->where('users.name','like','%'.Request::get('name').'%');
                            }
                            if(!empty(Request::get('last_name')))
                            {
                                $return = $return ->where('users.last_name','like','%'.Request::get('last_name').'%');
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return ->where('users.email','like','%'.Request::get('email').'%');
                            }
                            if(!empty(Request::get('admission_number')))
                            {
                                $return = $return ->where('users.admission_number','like','%'.Request::get('admission_number').'%');
                            }
                            if(!empty(Request::get('roll_number')))
                            {
                                $return = $return ->where('users.roll_number','like','%'.Request::get('roll_number').'%');
                            }
                            if(!empty(Request::get('class')))
                            {
                                $return = $return ->where('class.name','like','%'.Request::get('class').'%');
                            }
                            if(!empty(Request::get('gender')))
                            {
                                $return = $return ->where('users.gender','like','%'.Request::get('gender').'%');
                            }
                            if(!empty(Request::get('caste')))
                            {
                                $return = $return ->where('users.caste','like','%'.Request::get('caste').'%');
                            }
                            if(!empty(Request::get('religion')))
                            {
                                $return = $return ->where('users.religion','like','%'.Request::get('religion').'%');
                            }
                            if(!empty(Request::get('mobile_number')))
                            {
                                $return = $return ->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
                            }
                            if(!empty(Request::get('blood_group')))
                            {
                                $return = $return ->where('users.blood_group','like','%'.Request::get('blood_group').'%');
                            }
                            if(!empty(Request::get('admission_date')))
                            {
                                $return = $return ->wheredate('users.admission_date','=', Request::get('admission_date'));
                            }
                            if(!empty(Request::get('created_at')))
                            {
                                $return = $return ->wheredate('users.created_at','=', Request::get('created_at'));
                            }
                            if(!empty(Request::get('status')))
                            {
                                $status = (Request::get('status') == 100) ? 0 : 1;
                                $return = $return->whereDate('users.status', '=', $status);
                            }
        $return = $return ->orderBy('users.id', 'desc')
        ->paginate(25);
        return $return;

    }

    static function getCollectFeesStudent()
    {
        $return = self::select('users.*', 'class.name as class_name', 'class.amount')
                            ->join('class', 'class.id', '=', 'users.class_id')
                            ->where('users.user_type','=',2)
                            ->where('users.is_delete','=',0);
                            if(!empty(Request::get('class_id')))
                            {
                                $return = $return ->where('users.class_id','like','%'.Request::get('class_id').'%');
                            }

                            if(!empty(Request::get('student_id')))
                            {
                                $return = $return ->where('users.id','like','%'.Request::get('student_id').'%');
                            }

                            if(!empty(Request::get('first_name')))
                            {
                                $return = $return ->where('users.name','like','%'.Request::get('first_name').'%');
                            }
                            if(!empty(Request::get('last_name')))
                            {
                                $return = $return ->where('users.last_name','like','%'.Request::get('last_name').'%');
                            }

                            if(!empty(Request::get('email')))
                            {
                                $return = $return ->where('users.email','like','%'.Request::get('email').'%');
                            }

        $return = $return ->orderBy('users.name', 'asc')
        ->paginate(50);
        return $return;

    }

    static function getStudentClass($class_id)
    {
        return self::select('users.id', 'users.name', 'users.last_name')
                            ->where('users.user_type','=',2)
                            ->where('users.is_delete','=',0)
                            ->where('users.class_id','=',$class_id)
                            ->orderBy('users.id', 'desc')
                            ->get();

    }
   
    public function UpdateMyaccountParent(Request $request)
    {
        $id = Auth::user()->id;

        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:50',
            'occupation' => 'max:50',
        ]);

        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
            
        }
        
        $parent->mobile_number = trim($request->mobile_number);
        $parent->email = trim($request->email);
        $parent->save();
        return redirect()->back()->with('success', "Parent Succesfully created.");

    }

    static public function getSearchStudent()
{
    return self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
        ->join('users as parent', 'parent.id', '=', 'users.parent_id', 'left')
        ->join('class', 'class.id', '=', 'users.class_id', 'left')
        ->where('users.user_type', '=', 2)
        ->where('users.is_delete', '=', 0)
        ->when(Request::get('id'), function ($query, $id) {
            return $query->where('users.id', $id);
        })
        ->when(Request::get('name'), function ($query, $name) {
            return $query->where('users.name', 'like', '%' . $name . '%');
        })
        ->when(Request::get('last_name'), function ($query, $last_name) {
            return $query->where('users.last_name', 'like', '%' . $last_name . '%');
        })
        ->when(Request::get('email'), function ($query, $email) {
            return $query->where('users.email', 'like', '%' . $email . '%');
        })
        ->orderBy('users.id', 'desc')
        ->limit(50)
        ->get();
}

    static public function getTeacherStudent($teacher_id)
    {
        $return = self::select('users.*', 'class.name as class_name', 'parent.name as parent_name', 'parent.last_name as parent_last_name')
                            ->join('class', 'class.id', '=', 'users.class_id')
                            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
                            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
                            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
                            ->where('users.user_type','=',2)
                            ->where('assign_class_teacher.status','=',0)
                            ->where('assign_class_teacher.is_delete','=',0)
                            ->where('users.is_delete','=',0);
        $return = $return ->orderBy('users.id', 'desc')
        ->paginate(20);
        return $return;

        
    }

    static public function getTotalStudentCount($teacher_id)
    {
        $return = self::select('users.id')
                            ->join('class', 'class.id', '=', 'users.class_id')
                            ->join('assign_class_teacher', 'assign_class_teacher.class_id', '=', 'class.id')
                            ->where('assign_class_teacher.teacher_id', '=', $teacher_id)
                            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
                            ->where('users.user_type','=',2)
                            ->where('assign_class_teacher.status','=',0)
                            ->where('assign_class_teacher.is_delete','=',0)
                            ->where('users.is_delete','=',0)
                            ->orderBy('users.id', 'desc')
        ->count();
        return $return;

        
    }


    public static function getMyStudent($parent_id): \Illuminate\Database\Eloquent\Collection
    {
        return self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
            ->join('users as parent', 'parent.id', '=', 'users.parent_id')
            ->leftJoin('class', 'class.id', '=', 'users.class_id')
            ->where('users.user_type', 2)
            ->where('users.parent_id', $parent_id)
            ->where('users.is_delete', 0)
            ->orderBy('users.id', 'desc')
            ->get();
    }
    

static public function getMyStudentCount($parent_id){
    return self::select('users.id')
    ->join('users as parent', 'parent.id', '=', 'users.parent_id')
    ->join('class', 'class.id', '=', 'users.class_id', 'left')
    ->where('users.user_type', '=', 2)
    ->where('users.parent_id', '=', $parent_id)
    ->where('users.is_delete', '=', 0)
    ->count();
}

    static public function getTeacher()
    {
        $return = self::select('users.*')
               ->where('users.user_type', '=', 3)
               ->where('users.is_delete', '=', 0);
               if(!empty(Request::get('name')))
                            {
                                $return = $return ->where('users.name','like','%'.Request::get('name').'%');
                            }
                            if(!empty(Request::get('last_name')))
                            {
                                $return = $return ->where('users.last_name','like','%'.Request::get('last_name').'%');
                            }
                            if(!empty(Request::get('email')))
                            {
                                $return = $return ->where('users.email','like','%'.Request::get('email').'%');
                            }
                            if(!empty(Request::get('gender')))
                            {
                                $return = $return ->where('users.gender','like','%'.Request::get('gender').'%');
                            }
                            if(!empty(Request::get('religion')))
                            {
                                $return = $return ->where('users.religion','like','%'.Request::get('religion').'%');
                            }
                            if(!empty(Request::get('mobile_number')))
                            {
                                $return = $return ->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
                            }
                            if(!empty(Request::get('marital_status')))
                            {
                                $return = $return ->where('users.marital_status','like','%'.Request::get('marital_status').'%');
                            }
                            if(!empty(Request::get('address')))
                            {
                                $return = $return ->where('users.address','like','%'.Request::get('address').'%');
                            }
                            if(!empty(Request::get('admission_date')))
                            {
                                $return = $return ->wheredate('users.admission_date','=', Request::get('admission_date'));
                            }
                            if(!empty(Request::get('created_at')))
                            {
                                $return = $return ->wheredate('users.created_at','=', Request::get('created_at'));
                            }
                            if(!empty(Request::get('status')))
                            {
                                $status = (Request::get('status') == 100) ? 0 : 1;
                                $return = $return->whereDate('users.status', '=', $status);
                            }

        $return = $return->orderBy('users.id', 'desc')
               ->paginate(20);

        return $return;
    }

    static public function getTeacherClass()
    {
        $return = self::select('users.*')
               ->where('users.user_type', '=', 3)
               ->where('users.is_delete', '=', 0);
        $return = $return->orderBy('users.id', 'desc')
               ->get();

        return $return;
    }

    static public function getEmailSingle($email){
        return User::where('email', '=', $email)->first();
    }
    static public function getTokenSingle($remember_token){
        return User::where('remember_token', '=', $remember_token)->first();
    }
    public function getProfile()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return '';
        }
    }
    public function getProfileDirect()
    {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
        {
            return url('upload/profile/'.$this->profile_pic);
        }
        else
        {
            return url('upload/profile/user.png');
        }
    }









    public static function getChildrenByParentId($parentId)
{
    // Assuming 'parent_id' is the column in the 'users' table that links children to their parent
    return self::select('users.*', 'class.name as class_name', 'parent.name as parent_name')
        ->join('users as parent', 'parent.id', '=', 'users.parent_id')
        ->join('class', 'class.id', '=', 'users.class_id', 'left')
        ->where('users.user_type', 2)
        ->where('users.parent_id', $parentId) // Filter by the parent's ID.
        ->where('users.is_delete', 0)
        ->orderBy('users.id', 'desc')
        ->get();
}


    static public function getAttendance($student_id, $class_id, $attendance_date)
    {
        return StudentAttendanceModel::CheckAlreadyAttendance($student_id, $class_id, $attendance_date);
    }

    static public function getPaidAmount($student_id, $class_id)
    {
        return StudentAddFeesModel::getPaidAmount($student_id, $class_id);
    }

    static public function getTotalUser($user_type)
    {
        return self::select('users.id')
                            ->where('user_type','=', $user_type)
                            ->where('is_delete','=',0)
                             ->count();
    }

}
