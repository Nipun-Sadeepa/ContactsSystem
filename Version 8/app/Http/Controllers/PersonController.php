<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    // public function sign(Request $req){
    //     $person= new Person();
    //     $person->fName = $req->fName;
    //     $person->lName = $req->lName;
    //     $person->email = $req->email;
    //     $person->contactNo = $req->contactNo;
    //     $person->address = $req->address;
    //     $person->city = $req->city;
    //     $person->gender = $req->gender;
    //     $person->status = $req->status;
    //     $person->regDate = carbon::now();
    //     $person->password = Hash::make($req->contactNo);
    //     $person->role = "customer";
    //     $person->save();
    // }

    // public function login(Request $req){
    //     $result=Person::find($req->email);
    //     if(isset($result)){
    //         $essentialDetails = array("id"=>$result->id, "role"=>$result->role);
    //         return json_encode($essentialDetails);  //resource or required things only
    //     }else{
    //         return response(["msg"=>"Credentials are not matched"]);
    //     }
    // }
    
    //for choosing customer when adding contacts
    public function getCustomers(){
        $result=Customer::all();
        return $result;
    }

    public function addContacts(Request $req){

        $person= new Person();
        $person->customerId	=$req->customer;
        $person->fName = $req->fName;
        $person->lName = $req->lName;
        $person->email = $req->email;
        $person->contactNo = $req->contactNo;
        $person->address = $req->address;
        $person->gender = $req->gender;
        $person->save();

        return (["msg"=>"ok"]);
    }


    // Editing function
    public function getUser($id){
        $result = Person::where("id",$id)->get();
        return $result;
    }

    public function edit(Request $req){
        $user=Person::where("id",$req->id)->update($req->all()); 
        if($user==1){
            return response(["msg"=>"updated"]);
        }else{ 
            return response(["msg"=>"Not Found"]); 
        }
    }

    public function delete($id){
        Person::where("id",$id)->delete(); 
        return (["msg"=>"ok"]);
    }

    public function search(Request $req){
        // $searchResult=Person::join("customers","customers.id","people.customerId")->where("name",$req->selectedName)->get();
        // return $searchResult;
        if($req->selectedOption=="contact"){
            $searchResult=Person::where("fname",$req->selectedName)->get();
            return $searchResult;
        }
        
        if($req->selectedOption=="customer"){
            $searchResult=Customer::where("name",$req->selectedName)->get();
            return $searchResult;
        }
    }

    public function view(){
        $result=Person::all();
        return $result;
    }
}
