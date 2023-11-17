<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $table = 'setting';

    static public function getSingle()
    {
        return self::find(1);
    }

    public function getLogo()
    {
        if(!empty($this->logo) && file_exists('upload/setting/'.$this->logo))
        {
            return url('upload/setting/'.$this->logo);
        }
        else
        {
            return '';
        }
    }

    public function getFevicon()
    {
        if(!empty($this->fevicon_icon) && file_exists('upload/setting/'.$this->fevicon_icon))
        {
            return url('upload/setting/'.$this->fevicon_icon);
        }
        else
        {
            return '';
        }
    }

    public function getLoginImage()
    {
        if(!empty($this->login_image) && file_exists('upload/setting/'.$this->login_image))
        {
            return url('upload/setting/'.$this->login_image);
        }
        else
        {
            return '';
        }
    }
}
