<?php

namespace App\Http\Controllers;
use App\Models\Statement;
use App\Models\Status;
use App\Filters\StatementStatusFilter;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class StatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StatementStatusFilter $request)

    {  
       $user_role= auth()->user()->role;
        $user_id= auth()->user()->id;
        $user_name = auth()->user()->name;
        $user_last_name = auth()->user()->last_name;
        $user_email= auth()->user()->email;
        $statuses= Status::all();
        $statements= Statement::filter($request)->get();
        
        return view('Statement.statement_index',['statements'=>$statements,'user_id'=>$user_id,'user_name'=>$user_name,'user_last_name'=>$user_last_name,'user_email'=>$user_email ,'user_role'=>$user_role,'statuses'=>$statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      $user_name = auth()->user()->name;
           $user_last_name = auth()->user()->last_name;
           $user_email= auth()->user()->email;
           $specializations = Specialization::all();
      
        return view("Statement.statement_create",['specializations' => $specializations,'user_name'=>$user_name,'user_last_name'=>$user_last_name,'user_email'=>$user_email]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     { $validated = $request->validate([
        'name'=>'required|alpha|max:255',
        'surname'=>'required|alpha|max:255',
        'last_name' => 'nullable|alpha|max:255',
        'email'=>'required|email',
        'snils' =>'nullable|alpha_num|max:11|min:11',
        'phone_number' =>'required|max:16|min:16',
        'nationality'=>'alpha|max:255',
        'parent_info'=>'string|max:255',
        'pasport_number'=>'alpha_num|max:6|min:6',
        'pasport_seria'=>'alpha_num|max:4|min:4',
        'image_1' =>'required|image:jpg,png,jpeg|max:5048',
        'image_2' =>'required|image:jpg,png,jpeg|max:5048',
        'image_3' =>'required|image:jpg,png,jpeg|max:5048',
        'image_4' =>'required|image:jpg,png,jpeg|max:5048'
        
     ]);
     $newImageName_1= time() . '-' . $request->name . '-' . $request->image_1->extension();
     $request->image_1->move(public_path('image_1'),$newImageName_1);
     $newImageName_2= time() . '-' . $request->name . '-' . $request->image_2->extension();
     $request->image_2->move(public_path('image_2'),$newImageName_2);
     $newImageName_3= time() . '-' . $request->name . '-' . $request->image_3->extension();
     $request->image_3->move(public_path('image_3'),$newImageName_3);
     $newImageName_4= time() . '-' . $request->name . '-' . $request->image_4->extension();
     $request->image_4->move(public_path('image_4'),$newImageName_4);
    
        $user_id= auth()->user()->id;
     
        if ($request->dormitory == 'on')
            {
                $dormitory = 1;
            }
            else {
               $dormitory = 0;
            }
            if ($request->accept_1 == 'on')
            {
                $accept_1 = 1;
            } 
            else
            {
                $accept_1 = 0;
            }
            if ($request->accept_2 == 'on')
            {
                $accept_2 = 1;
            }
            else
            {
                $accept_2 = 0;
            }
            if ($request->accept_3 == 'on')
            {
                $accept_3 = 1;
            }
            else
            {
                $accept_3 = 0;
            }
            if ($request->special_condition == 'on')
            {
                $condition = 1;
            }
            else
            {
                $condition = 0;
            }
        Statement::create([
            'user_id'=>$user_id,
            'name'=>$request->name,
            'surname'=>$request->surname,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'specialization_id'=>$request->specialization_id,
            'snils'=>$request->snils,
            'phone_number'=>$request->phone_number,
            'living'=>$request->living,
            'registered'=>$request->registered,
            'nationality'=>$request->nationality,
            'place_of_birth'=>$request->place_of_birth,
            'education_level'=>$request->education_level,
            'atestat_bal'=>$request->atestat_bal,
            'date_of_end'=>$request->date_of_end,
            'language'=>$request->language,
            'issued'=>$request->issued,
            'count_education'=>$request->count_education,
            'parent_info'=>$request->parent_info,
            'parent_phone'=>$request->parent_phone,
            'parent_other'=>$request->parent_other,
            'image_1'=> $newImageName_1,
            'image_2'=> $newImageName_2,
            'image_3'=> $newImageName_3,
            'image_4'=> $newImageName_4,
             'accept_1'=>$accept_1,
             'accept_2'=>$accept_2,
             'accept_3'=>$accept_3,
             'special_condition'=>$condition,
            'pasport_seria'=>$request->pasport_seria,
            'pasport_number'=>$request->pasport_number,
            'birthsday_date'=>$request->birthsday_date,
            
            'dormitory'=>$dormitory,

        ]);
        return redirect()->route('statement_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Statement $statement)

    {
        //Если у пользователя нет прав, то пренаправляет на страницу с ошибкой 403
        if (! Gate::allows('show-statement', $statement)) {
        abort(403);
     }
        
        $user_id= auth()->user()->id;
        return view('Statement.statement_show',['statement'=>$statement, 'user_id'=>$user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Statement $statement)

     {
        $user_role= auth()->user()->role;
        if (! Gate::allows('edit-statement', $statement)) {
            abort(403);
         }
       
        $specializations = Specialization::all();
        $statuses =Status::all();
      

return view('Statement.statement_edit',['statement'=>$statement,'specializations'=>$specializations,'user_role'=>$user_role,'statuses'=>$statuses])  ;      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        
        if (! Gate::allows('update-statement', $statement)) {
            abort(403);
         }
       if ($request->hasFile('image_1')){
         $newImageName_1= time() . '-' . $request->name . '-' . $request->image_1->extension();
         $request->image_1->move(public_path('image_1'),$newImageName_1);
       }
       else
       {
        $newImageName_1 = $statement->image_1;
       }
       if ($request->hasFile('image_2')){
         $newImageName_2= time() . '-' . $request->name . '-' . $request->image_2->extension();
         $request->image_2->move(public_path('image_2'),$newImageName_2);
       }
       else
       {
        $newImageName_2 = $statement->image_2;
       }
       if ($request->hasFile('image_3')){
         $newImageName_3= time() . '-' . $request->name . '-' . $request->image_3->extension();
         $request->image_3->move(public_path('image_3'),$newImageName_3);
       }
       else
       {
        $newImageName_3 = $statement->image_3;
       }
       if ($request->hasFile('image_4')){
         $newImageName_4= time() . '-' . $request->name . '-' . $request->image_4->extension();
         $request->image_4->move(public_path('image_4'),$newImageName_4);
       }
       else
       {
        $newImageName_4 = $statement->image_4;
       }
        if ($request->dormitory == 'on')
            {
                $dormitory = 1;
            }
            else {
               $dormitory = 0;
            }
            // if ($request->accept_1 == 'on')
            // {
            //     $accept_1 = 1;
            // } 
            // else
            // {
            //     $accept_1 = 0;
            // }
            // if ($request->accept_2 == 'on')
            // {
            //     $accept_2 = 1;
            // }
            // else
            // {
            //     $accept_2 = 0;
            // }
            // if ($request->accept_3 == 'on')
            // {
            //     $accept_3 = 1;
            // }
            // else
            // {
            //     $accept_3 = 0;
            // }
            if ($request->special_condition == 'on')
            {
                $condition = 1;
            }
            else
            {
                $condition = 0;
            }
        $statement->update([
            'user_id'=>$request->user_id,
            'name'=>$request->name,
            'surname'=>$request->surname,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'specialization_id'=>$request->specialization_id,
            'snils'=>$request->snils,
            'phone_number'=>$request->phone_number,
            'living'=>$request->living,
            'registered'=>$request->registered,
            'nationality'=>$request->nationality,
            'place_of_birth'=>$request->place_of_birth,
            'education_level'=>$request->education_level,
            'atestat_bal'=>$request->atestat_bal,
            'date_of_end'=>$request->date_of_end,
            'language'=>$request->language,
            'parent_info'=>$request->parent_info,
            'parent_phone'=>$request->parent_phone,
            'parent_other'=>$request->parent_other,
            'issued'=>$request->issued,
            'count_education'=>$request->count_education,
            'image_1'=> $newImageName_1,
            'image_2'=> $newImageName_2,
            'image_3'=> $newImageName_3,
            'image_4'=> $newImageName_4,
            'accept_1'=>$request->accept_1,
            'accept_2'=>$request->accept_2,
            'accept_3'=>$request->accept_3,
            'special_condition'=>$condition,
            'pasport_seria'=>$request->pasport_seria,
            'pasport_number'=>$request->pasport_number,
            'birthsday_date'=>$request->birthsday_date,
            
            'dormitory'=>$dormitory,
            'status'=>$request->status,

        ]);
        return redirect()->route('statement_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {   if (! Gate::allows('destroy-statement', $statement)) {
        abort(403);
     }
        $statement->delete();
        return redirect()->route('statement_index');
    }
 
}
