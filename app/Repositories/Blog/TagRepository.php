<?php
namespace App\Repositories\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\Tag;
use App\Repositories\Blog\Ext\BaseBlogRepository;
use App\Repositories\IBlog\IIndexRepository;
use App\Repositories\IBlog\ITagRepository;
use Laracasts\Flash\Flash;

/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/30/16
 * Time: 20:33
 */
class TagRepository extends BaseBlogRepository implements ITagRepository
{

    /**
     * @Describe ajax获取标签列表
     * @return mixed
     */
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
        $tag = new Tag;
        if ($search) {
            $tag = $tag->where('name', 'like', "%{$search}%");
        }
        $tempTag = $tag;
        $count = $tempTag->count();
        if ($sort) {
            $orderName = request('mDataProp_' . request('iSortCol_0', ''), '');
            $tag = $tag->orderBy($orderName, $sort);
        }
        $tag = $tag->offset($start)
            ->limit($length)
            ->get();

        foreach ($tag as $v) {
            $v['actionButton'] = $v->GetActionButton();
        }
        $tag->isEmpty() ? $tag = [] : $tag = $tag->toArray();
        /*返回数据*/
        $returnData = [
            "sEcho" => $draw,
            "iTotalRecords" => $count,
            "iTotalDisplayRecords" => $count,
            "aaData" => $tag,
        ];
        return $returnData;
    }

    public function store($request)
    {
        $tag = new Tag;
        if ($tag->fill($request->all())->save()) {
            Flash::success(trans('alerts.blog.tag.addSuccess'));
            return true;
        }
        Flash::error(trans('alerts.blog.tag.addFailed'));
        return false;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 编辑标签
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        return $this->verifyTag($id);
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc post提交编辑标签
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        $tag = $this->verifyTag($id);
        if (!empty($tag)) {
            if ($tag->fill($request->all())->save()) {
                Flash::success(trans('alerts.blog.tag.updateSuccess'));
                return true;
            }
        }
        Flash::error(trans('alerts.blog.tag.updateFailed'));
        return false;
    }

    protected function verifyTag($id)
    {
        $tag = Tag::find($id);
        if (empty($tag)) {
            Flash::error(trans('alerts.blog.tag.notFind'));
            return false;
        }
        return $tag;
    }

    /**
     * Created by huaqing.chen.
     * Email huaqing.chen@bioon.com
     * Desc 删除
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $tag = $this->verifyTag($id);
        if (!empty($tag)) {
            if ($tag->delete()) {
                Flash::success(trans('alerts.blog.tag.deleteSuccess'));
                return true;
            }
        }
        Flash::error(trans('alerts.blog.tag.deletFailed'));
        return false;
    }

    public function GetTagsArray()
    {
        $tags = Tag::all();
        if ($tags->isEmpty()) return [];
        return $tags->toArray();
    }

    public function show($id)
    {
        $article = Article::with(['tags'])
                ->whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->get();
        return $article;
    }
}