<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminpanelsettingRequest;
use App\Models\Adminpanelsetting;
use App\Models\Admin;

use function PHPUnit\Framework\fileExists;

class Adminpanel extends Controller
{
    //
    public function index()
    {
        $data=Adminpanelsetting::where('com_code', auth()->user()->com_code)->first();

        if (!empty($data)) {
            if ($data['updated_by']>0 and $data['updated_by']!='null') {
                $data['updated_by_admin']=Admin::where('id', $data['updated_by'])->value('name');
            }
        }
        return view('admin.admin_panal_settings.index', ['data'=>$data]);
    }

    public function update(AdminpanelsettingRequest $request)
    {
        try {
            $data=Adminpanelsetting::where('com_code', auth()->user()->com_code)->first();
            $data->system_name=$request->SystemName;
            $data->com_code=$request->CompanyCode;
            $data->phone=$request->CompanyPhone;
            $data->address=$request->CompanyAddress;
            $data->general_alert=$request->Companymass;
            $data->active=$request->CompanyStatue;
            $data->updated_by=auth()->user()->id;
            $data->updated_at=date("Y-m-d H:i:s");
            $oldphoto=$data->photo;
            
            if ($request->has('photo')) {
             // dd($request->photo);
                $request->validate([
                    'photo'=>'required|mimes:png,jpg,jpeg|max:2000'
                ]);
                $the_file_path=uploadeImage('assets/admin/uploads', $request->photo);
                $data->photo=$the_file_path;
                if(fileExists('assets/admin/uploads/'.$oldphoto)){
                    unlink('assets/admin/uploads/'.$oldphoto);
                }

         
            } 
            $data->save();
            return redirect()->route('adminpanelsetting.index')->with(['success'=>'تم تحديث البيانات بنجاح']);
        } catch(\Exception $ex) {
            return redirect()->route('adminpanelsetting.index')->with(['error'=>' عفوا حدث خطأ ما'.$ex->getMessage()]);
        }
    }

    public function edit()
    {
        $data=Adminpanelsetting::where('com_code', auth()->user()->com_code)->first();
        return view('admin.admin_panal_settings.edit', ['data'=>$data]);
    }
}
