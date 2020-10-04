<?php

namespace App\Models\content;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Faq extends Model
{

    static public function getAllFaq($request){
        $faqs = DB::table('faqs as f')
        ->select('f.*');

        if(isset($request['filterByCreated']) && in_array($request['filterByCreated'], ['DESC', 'ASC'])){
            $faqs = $faqs->orderBy('f.updated_at', $request['filterByCreated']);
        }else{
            $faqs = $faqs->orderBy('f.updated_at', 'DESC');
        }

        if(isset($request['active']) && in_array($request['active'], ['0', '1'])){
            $active = $request['active'] == '1' ? 1 : 0 ;
            $faqs = $faqs->where('f.active', '=', $active);
        }

        if(isset($request['search']) && !empty($request['search'])){
            $search = $request['search'];
            $faqs = $faqs->where(function ($query) use ($search) {
                $query->where('f.question', '=', $search)
                ->orWhere('f.answer', '=', $search);
            });
        }

        return $faqs->simplePaginate(5);
    }

    static public function store($request){
                $faq = new self();
                $faq->question = $request['question'];
                $faq->answer = $request['answer'];
                $faq->save();
                return true;
    }

    static public function deleteFaq(int $id){
            $query = DB::table('faqs')->where('id', $id);;
            if($query->first()){
                $query->delete();
            }
    }

    static public function getFaq($id){
        if(is_numeric($id)){
            $faqs = DB::table('faqs as b')
            ->where('b.id', '=', $id)
            ->select('b.*')
            ->first();
            return $faqs;
        }
    }

    static public function updateFaq($request,int $id){

        DB::table('faqs')
        ->where('id', '=', $id)
        ->update([
            'question' => $request['question'],
            'answer' => $request['answer'],
            'updated_at' => Carbon::now()
        ]);
        return TRUE;
    }

    static public function activeFaq($request){

        if(!is_numeric($request['id']) || !in_array($request['value'], ['true', 'false'])) return false;
        $value = ($request['value'] == 'true') ? 1 : 0;
        DB::table('faqs')
        ->where('id', '=', $request['id'])
        ->update([
            'active' => $value,
        ]);
        return TRUE;
    }

}
