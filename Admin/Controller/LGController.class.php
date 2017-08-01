<?php
namespace Admin\Controller;
use Think\Controller;
class LGController extends Controller{
    function lg_test(){
        $student = M('Student');
        //查询年龄大于100岁的学生
        //$data = $student->where('sage>100')->select();
        //查询年龄小于等于28的男学生
        //$data = $student->where('sage<=28 && ssex="男"')->select();
        //查询年龄小于等于28的男学生的姓名和学号
        /*$data = $student
        ->field('sno,sname')
        ->where('sage<=28 && ssex="男"')
        ->select();*/
        //查询年龄大于20岁的学生，并按年龄降序排序
        /*$data = $student
        ->where('sage>20')
        ->order('sage asc')
        ->select();*/
        //统计男女生各有多少个
        $data = $student
        ->field('ssex,count(*) as num')
        ->group('ssex')
        ->select();
        dump($data); 
    }
    function m_table(){
        //实例化空模型
        $model = M();
        $data = $model
        //等值链接方式
        ->table('oa_student s,oa_department d')
        ->where('s.sdept=d.did')
        ->select();
        dump($data);
    }
    function join_test(){
        //在使用左右外链接时，实例化主表模型
        $data = M('Student')->alias('s')
            ->join('left join oa_department d on s.sdept=d.did')
            ->where('s.sage<=28')
            ->select();
        dump($data);
    }
    function col_test(){
        //使用集合函数
        $student = M('Student');
        //echo $student->count();
        //echo $student->max('sno');
        //echo $student->min('sage');
        //echo $student->sum('sage');
        echo $student->avg('sage');
    }
    function sql_test(){
        $model = M();
        //执行查询
        //$data = $model->query('select * from oa_student');
        //dump($data);
        //执行删除
        $model->execute('delete from oa_department where sname="赵敏2"');
    }
}