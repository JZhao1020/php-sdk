<?php
// +----------------------------------------------------------------------
// | 生成随机红包数组
// +----------------------------------------------------------------------
// | 版权所有
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/JZhao1020/php-sdk
// +----------------------------------------------------------------------


namespace PHPSDK\lib;


class Hongbao{

    /**
     * @param $amount 总金额
     * @param $num 红包个数
     * @return array|bool
     */
    public function red_rand($amount, $num){
        $amount = intval($amount * 100);
        //校验是否保证每个红包最少获得0.01
        if($num > $amount){
            return false;
        }
        //
        $reds = array();
        while(--$num){
            $r = rand(1, $amount);
            $r = $this->fix_rand($r, $reds, $amount);
            $reds[] = $r;
        }
        asort($reds);
        $arr = array();
        $last = 0;
        foreach($reds as $v){
            $arr[] = ($v - $last) / 100;
            $last = $v;
        }
        $arr[] = ($amount - $last) / 100;
        return $arr;
    }

    private function fix_rand($r, $reds, $max){
        if(in_array($r, $reds) || $r == $max){
            $r1 = $r;
            while(--$r1){
                if( ! in_array($r1, $reds)){
                    return $r1;
                    break;
                }
            }
            while(true){
                ++$r;
                if( ! in_array($r, $reds)){
                    return $r;
                    break;
                }
            }
        }
        return $r;
    }
}