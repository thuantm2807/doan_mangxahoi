<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Hash;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    public function maxId(){
        return self::select("id")
                    ->max("id");
    }

    public function createSeed(){
        $arr = $this->randArrInsert();

        self::insert($arr);

        return 1;
    }    

    private function randArrInsert(){
        $firstName = [
            'Nguyễn',
            'Trần',
            'Lê',
            'Phạm',
            'Phan',
            'Đặng',
            'Bùi',
            'Đỗ',
            'Hồ',
            'Ngô',
            'Dương',
            'Lý',
        ];   

        $lastName = [
            'Anh',
            'Đức',
            'Trang',
            'Hoàng',
            'Phạm',
            'Việt',
            'Dũng',
            'Giang',
            'Hiếu',
            'Hiệp',
            'Thảo',
            'Ngọc',
            'Huy',
            'Ngọc',
            'Tài',
            'Minh Ngọc',
            'Quốc Ngọc',
            'Điệp Chi',
            'Vũ Trí Đức',
            'Thị Bích Ngọc',
            'Xuân Minh',
            'Ngọc Quỳnh Như',
            'Hoàng Lâm',
            'Tiến Long',
            'Quang Tín',
            'Hải Hà An',
            'Nam Khánh',
            'Phương Linh',
        ];         



        $arr = [];
        for ($i=0; $i < 15; $i++) { 
            $fName = array_random($firstName);
            $lName = array_random($lastName);

            $arr[] = [
                'name' => $fName." ".$lName,
                'first_name' => $fName,
                'phone' => "0".mt_rand(000000000, 999999999),
                'gender' => rand(1, 3),
                'email' => time()."@gmail.com",
                'password' => bcrypt("123456"),
            ];
        }
        return $arr;
    }

    public function getAll(){
        return self::where("status",1)
                    ->get();
    }

    public function getById($id){
        return self::find($id);
    }

    public function getNameById($id){
        return $this->select('name')->find($id)['name'];
        //echo $a->name; die;
    }


}
