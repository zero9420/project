<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //
    /**
	 * 默认使用时间戳戳功能
	 *
	 * @var bool
	 */
	public $timestamps = true;

	/**
	 * 获取当前时间
	 *
	 * @return int
	 */
	public function freshTimestamp() {
		return time();
	}

	/**
	 * 避免转换时间戳为时间字符串
	 *
	 * @param DateTime|int $value
	 * @return DateTime|int
	 */
	public function fromDateTime($value) {
		return $value;
	}

	/**
	 * select的时候避免转换时间为Carbon
	 *
	 * @param mixed $value
	 * @return mixed
	 */
//  protected function asDateTime($value) {
//	  return $value;
//  }

	/**
	 * 从数据库获取的为获取时间戳格式
	 *
	 * @return string
	 */
	public function getDateFormat() {
		return 'U';
	}
}
