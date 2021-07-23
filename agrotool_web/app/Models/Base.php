<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Base extends Model
{
    
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
}
