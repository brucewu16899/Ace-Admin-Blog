<?php
/**
 * Created by PhpStorm.
 * User: chqss
 * Date: 2016/9/16
 * Time: 16:10
 */

namespace App\Repositories\Admin;


use App\Models\Admin\Permission;
use App\Repositories\Admin\Ext\BaseRepository;
use App\Repositories\IAdmin\IPermissionRepository;
use Flash;

class PermissionRepository extends BaseRepository implements IPermissionRepository
{

    public function ajaxIndex()
    {
        /*获取数据*/
        $draw = request('sEcho', 1);//请求次数
        /*每页条数*/
        $length = request('iDisplayLength', 10);
        /*起始记录数*/
        $start = request('iDisplayStart', 0);
        /*搜索内容*/
        $search = request('sSearch', '');
        $sort = request('sSortDir_0', '');
        $permission = new Permission;
        if ($search) {
            $permission = $permission->where('name', 'like', "%{$search}%")
                ->orWhere('slug', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
        }
        $tempPermission = $permission;
        $count = $tempPermission->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $permission = $permission->orderBy($orderName, $sort);
        }
        $permission = $permission->offset($start)
            ->limit($length)
            ->get();
        foreach ($permission as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $permission->isEmpty() ? $permission = [] : $permission = $permission->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $permission,
        ];
        return $returnData;
    }

    public function store($request)
    {
        $permission = new Permission;
        $permission->fill($request->all());
        $ret = $permission->save();
        if ($ret) {
            Flash::success(trans('alerts.permission.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.permission.addFailed'));
        return false;
    }

    public function edit($id)
    {
        return $this->verifyPermission($id);
    }

    public function update($request, $id)
    {
        $permission = $this->verifyPermission($id);
        if (empty($permission))
            return false;
        $permission->fill($request->all());
        $ret = $permission->save();
        if ($ret) {
            Flash::success(trans('alerts.editSuccess'));
            return true;
        }
        Flash::error(trans('alerts.editFailed'));
        return false;
    }

    public function destroy($id)
    {
        $permission = $this->verifyPermission($id);
        if (empty($permission))
            return false;
        $ret = $permission->delete();
        if ($ret) {
            Flash::success(trans('alerts.permission.deleteSuccess'));
            return true;
        }
        Flash::error(trans('alerts.permission.deleteFailed'));
        return false;
    }

    private function verifyPermission($id)
    {
        $permission = Permission::find($id);
        if (!empty($permission)) {
            return $permission;
        }
        Flash::error(trans('alerts.permission.notFind'));
        return false;
    }

    public function GetAllPermissionArray()
    {
        $permissions = Permission::all();
        if ($permissions->isEmpty())
            return [];
        $permissions = $permissions->toArray();
        $array = [];
        foreach ($permissions as $permission) {
            array_set($array, $permission['slug'], [
                'id' => $permission['id'],
                'name' => $permission['name'],
                'desc' => $permission['description']
            ]);
        }
        return $array;
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }
}