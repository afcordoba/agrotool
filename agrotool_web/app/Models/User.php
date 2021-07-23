<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Validator;
use Illuminate\Support\Facades\Input;
use Spatie\Activitylog\Traits\CausesActivity;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use CausesActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static $rules = [
    'name' => ['string','required','max:255','min:5'], 
    'email' => ['required','email','unique:users,email,[ID],id'],
    'password' => ['string','required','confirmed','sometimes','max:255','min:8'],
    'image' => 'mimes:jpeg,jpg,png,gif'
    ];  
    
    protected static $search_fields = ['name','email'];
    
    /**
     * Check if the inputs are valid
     *
     * @param inputs array values to insert
     * @return boolean 
     */       
    public function isValid($inputs)
    {   
        if(isset($this->id)){
            foreach(self::$rules as $key => $rules){
                self::$rules[$key] = str_replace('[ID]',$this->id, $rules);
            }
        }
        $validation = Validator::make($inputs,self::$rules); 
        if($validation->passes()) return true;

        $this->message = $validation->messages();
        return false;
    }
    
    public static function search()
    {
        return parent::relevanceSearch(self::$search_fields);  
    }


    /**
     * Get a relevance search of a model
     * 
     * @param array $fields the columns to use for the search query
     * @return \Illuminate\Support\Collection object 
     */        
    public static function relevanceSearch($fields=[])
    {
        $terms = Input::get('q',''); // get terms to search
        $words = explode(" ",$terms);
        $entity = self::query();    
        if($terms!=''){
            foreach($words as $word) {

                $entity->where(function($query) use ($word,$fields)
                {
                    foreach($fields as $search_field){
                        $query->orWhere($search_field,'LIKE','%'.$word.'%');
                    }
                });   
            }
        };
        return $entity;
    }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }    
}
