<?php

namespace App\Http\Controllers;
use App\Arptable;
use App\Device;
use App\Deviceadmin;
use App\Deviceip;
use App\Event;
use App\Iftable;
use App\Inputip;
use App\Link;
use App\Topology;

use Illuminate\Http\Request;

class DeviceController extends Controller
{
	public function getDevice_List(){
        $device = Device::all();
        $deviceadmin = Deviceadmin::all();
        return view('page_admin.device.device_list',compact('device','deviceadmin'));
    }

    public function getDevice_add(){
        return view('page_admin.device.device_add');
    }

    public function postDevice_add(Request $req){
        $device = new Deviceadmin;
        $data = [$req->IP1, $req->IP2, $req->IP3, $req->IP4];
        $device->IP = implode('.', $data);
        $device->sysDescr = $req->Description;
        $device->sysContact = $req->Contact;
        $device->sysName = $req->Name;
        $device->type = $req->Type;
        $device->sysLocation = $req->Location;
        $device->sysServices = $req->Services;
        $device->note = $device->Note;
        $device->community = $req->Community;
        $device->save();
        return redirect()->back()->with('thongbao','Thêm thành công !');
    }

    public function getDevice_information($id, $status){
        //$device = Device::where('deviceId',$id)->get();
        if($status == '1')
            $device = Deviceadmin::find($id);
        else 
            $device = Device::find($id);
        
        $Status = $status;
        $deviceip = Deviceip::where('deviceId',$id)->get();
        $time = $device->sysUpTime/100;
        $hour = (int)($time/3600);
        $minute = (int)(($time%3600)/60);
        $seconds = ($time%3600)%60;
        $data = [$hour,'h', $minute,'m', $seconds,'s'];
        $uptime = implode(' ', $data);

        return view('page_admin.device.device_information',compact('device','deviceip','uptime','Status'));
    }

    public function getDevice_edit($id, $status){
        if($status == '1')
            $device = Deviceadmin::find($id);
        else
            $device = Device::find($id);
        
        $Status = $status;
        $data = explode('.', $device->IP);
        return view('page_admin.device.device_edit',compact('device','data','Status'));
    }

    public function postDevice_edit(Request $req, $id, $status){
        if ($status == '1')
            $device = Deviceadmin::find($id);
        else
            $device = Device::find($id);
        
        $Status = $status;
        $deviceip = Deviceip::where('deviceId',$id)->get();
        $data = [$req->IP1, $req->IP2, $req->IP3, $req->IP4];
        $device->IP = implode('.', $data);
        $device->sysDescr = $req->Description;
        $device->sysContact = $req->Contact;
        $device->sysName = $req->Name;
        $device->type = $req->Type;
        $device->sysLocation = $req->Location;
        $device->sysServices = $req->Services;
        $device->note = $device->Note;
        $device->community = $req->Community;
        $device->save();

        return redirect('device-information/'.$id.'/'.$Status)->with('thongbao','Sửa thành công !');
    }

    public function getDevice_del($id, $status){
        if($status == '1')
            $device = Deviceadmin::find($id);
        else
            $device = Device::find($id);

        $device->delete();
        return redirect('device-list')->with('thongbao','Xóa thành công !');
    }

    public function getDevice_search(Request $req){
        $device = Device::where('IP','like','%'.$req->key.'%')->orWhere('sysName','like','%'.$req->key.'%')->get();
        $deviceadmin = Deviceadmin::where('IP','like','%'.$req->key.'%')->orWhere('sysName','like','%'.$req->key.'%')->get();
        $Key = $req->key;
        return view('page_admin.device.device_search',compact('device','deviceadmin','Key'));

    }

    public function getWarning_list(){
        $event = Event::orderBy('timestamp', 'DESC')->get();
        return view('page_admin.device.warning_list',compact('event'));
    }

    public function getHome(){
        $warning = Event::orderBy('timestamp', 'DESC')->take(5)->get();
        return view('page_admin.home',compact('warning'));
    }

    public function getWarning_search(Request $req){
        $event = Event::where('address','like','%'.$req->key.'%')->orWhere('timestamp','like','%'.$req->key.'%')->get();
        $Key = $req->key;
        return view('page_admin.device.warning_search',compact('event','Key'));

    }

}