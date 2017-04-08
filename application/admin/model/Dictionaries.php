<?php
namespace app\admin\model;

use think\Model;
class Dictionaries extends Model
{
    protected  $table = 'xx_dictionaries';
    protected $pk ='id';
    public function initialize(){
    
        parent::initialize();
    }
    //返回所有字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getAllDic(){
        $dic = $this->select();
        return $dic;
    }
    //返回所有字典指定字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getDicByParent($id,$limit,$start){
        $start = ($start-1)*$limit;
        $dic = $this->where(['parentID'=>$id,'IsDelete'=>0])->order('orderby asc')->limit($start,$limit)
        ->select(); 
        return $dic;
    }
    //添加字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function addDiction($data){
        $dic = $this->where(["bianma"=>$data['bianma'],"parentID"=>$data['parentID']])
        ->find();
        if($dic != null){
            return null;
        }
        $result = $this->validate("DictionariesValidate")->save($data);
//         if($result == false){
//            var_dump($this->getError());
//         }
        return $result;
    }
    //更新字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function updateDiction($data,$id){
        $dic = $this->where(['name'=>$data['name'],"bianma"=>$data['bianma'],"parentID"=>$data['parentID']])
        ->find();
        if($dic != null){
        
            if($dic->getdata()['bz'] != trim($data['bz'])||$dic->getdata()['state'] != trim($data['state'])){
                
                $result = $this->validate("DictionariesValidate")->save($data,['id'=>$id]);
                return $result;
                
            }else{return null;}
        }
        $result = $this->validate("DictionariesValidate")->save($data,['id'=>$id]);
        
        return $result;
        
    }
    //删除字典
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function deleDiction($data){
        $result = $this->save(['IsDelete'=>'1'],['id'=>$data]);
        return $result;
    }
    //获取指点父id的字节的数量
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getAllDicSize($parentID){
        
        $count = $this->where(['parentID'=>$parentID,'IsDelete'=>0])->count();
        return $count;
    }
    //获取所有的字典选项
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getDicParent(){
        
        $reault = $this->where(['parentID'=>0,'IsDelete'=>0])->select();
        //$data =array();
        foreach ($reault as $key => &$value){
            $value['pid'] = $value['parentID'];
            $value['title'] = $value['name'];
        }
        return $reault;
    }
    //根据编码返回数据
    /**
     * [index 首页]
     * @return [type] [description]
     * @author
     */
    public function getDicByBM($bianma){
        $result = $this->get(["bianma"=>$bianma]);
        return $result;
    }
    
}

?>