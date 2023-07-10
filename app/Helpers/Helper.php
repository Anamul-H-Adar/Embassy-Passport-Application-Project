<?php
use App\Models\User;

function status()
{
	return ['pending'=>'Pending','received'=>'Received','delivered'=>'Delivered','halt'=>'Halt'];
}

function datatableOrdering(){
	$order = false;
	if(isset(request()->order[0])){
		foreach(request()->order as $key => $ordering){
			if($ordering['column'] != 0){
				$order = $ordering;
			}
		}
	}

	return $order;
}

function userColumnVisibilities(){
	$columnVisibilities = \App\Models\UserColumnVisibility::where([
		'user_id' => auth()->user()->id,
		'url' => request()->fullUrl()
	])->first();
	if(isset($columnVisibilities->id)){
		$columns = (!empty($columnVisibilities->columns) && is_array(json_decode($columnVisibilities->columns, true)) ? json_decode($columnVisibilities->columns, true) : []);
		$hidden = [];
		if(isset($columns[0])){
			foreach ($columns as $key => $column) {
				if($column == "false"){
					array_push($hidden, $key);
				}
			}
		}

		return $hidden;
	}

	return [];
}

function wordRestrictions(){
	$words = [];
	$roles = \Spatie\Permission\Models\Role::whereIn('name', auth()->user()->getRoleNames())->get();
	if(isset($roles[0])){
		foreach($roles as $key => $role){
			$restrictions = array_map(function($value){
                            return strtolower($value);
                        }, isset(json_decode($role->word_restrictions, true)[0]) ? json_decode($role->word_restrictions, true) : []);
			if(isset($restrictions[0])){
				foreach($restrictions as $key => $restriction){
					array_push($words, $restriction);
				}
			}
		}
	}

	return array_unique($words);
}