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
        return view('page_admin.device.device_list',compact('device'));
    }

    public function getDevice_add(){
        return view('page_admin.device.device_add');
    }

    public function postDevice_add(Request $req){
        $device = new Device;
        $data = [$req->IP1, $req->IP2, $req->IP3, $req->IP4];
        $device->IP = implode('.', $data);
        $device->sysDescr = $req->Description;
        $device->sysContact = $req->Contact;
        $device->sysName = $req->Name;
        $device->type = $req->Type;
        $device->status = 1;
        $device->sysLocation = $req->Location;
        $device->sysServices = $req->Services;
        $device->note = $device->Note;
        $device->community = $req->Community;
        $device->save();
        return redirect()->back()->with('thongbao','Thêm thành công !');
    }

    public function getDevice_information($id){
        //$device = Device::where('deviceId',$id)->get();
        $device = Device::find($id);
        $deviceip = Deviceip::where('deviceId',$id)->get();

        $time = $device->sysUpTime/100;
        $hour = (int)($time/3600);
        $minute = (int)(($time%3600)/60);
        $seconds = ($time%3600)%60;
        $data = [$hour,'h', $minute,'m', $seconds,'s'];
        $uptime = implode(' ', $data);

        return view('page_admin.device.device_information',compact('device','deviceip','uptime'));
    }

    public function getDevice_edit($id){
        $device = Device::find($id);
        $data = explode('.', $device->IP);
        return view('page_admin.device.device_edit',compact('device','data'));
    }

    public function postDevice_edit(Request $req, $id){
        $device = Device::find($id);
        $deviceip = Deviceip::where('deviceId',$id)->get();
        $data = [$req->IP1, $req->IP2, $req->IP3, $req->IP4];
        $device->IP = implode('.', $data);
        $device->sysDescr = $req->Description;
        $device->sysContact = $req->Contact;
        $device->sysName = $req->Name;
        $device->type = $req->Type;
        $device->status = 1;
        $device->sysLocation = $req->Location;
        $device->sysServices = $req->Services;
        $device->note = $device->Note;
        $device->community = $req->Community;
        $device->save();

        return redirect('device-information/'.$id)->with('thongbao','Sửa thành công !');
    }

    public function getDevice_del($id){
        $device = Device::find($id);
        $device->delete();
        return redirect()->back()->with('thongbao','Xóa thành công !');
    }

}