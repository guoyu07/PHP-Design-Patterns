<?php

/**
 * 数据库操作类
 * @author roy.cai
 */

class Db
{
	public static $instance;
	public static $pdo;

	private function __construct(){
		$this->pdoConfig();	
		self::$pdo->exec("SET names utf8");
	}

	private function __clone(){}

	/**
	 * 获取实例
	 */
	public static function getInstance()
	{
		if (!(self::$instance instanceof self)) {
			self::$instance  = new self();
		}
		return self::$instance;
	}

	/**
	 * 数据库配置
	 * @param $config 配置数组
	 */
	public function pdoConfig()
	{
		if(!self::$pdo){
			self::$pdo = new PDO('mysql:host=localhost;dbname=test','root','');
		}
		return self::$pdo;
	}

	/**
	 * 基础查询方法
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return pdo stmt 对象
	 */
	public function baseQuery($sql,$params)
	{	
		$stmt = self::$pdo->prepare($sql);
		$stmt->setFetchMode(\PDO::FETCH_ASSOC);
		$this->bindParams($stmt,$params);
		$stmt->execute();
		return $stmt;
	}

	/**
	 * 查询一条记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function queryOne($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->fetch();
	}

	/**
	 * 查询多条记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function queryAll($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->fetchAll();
	}

	/**
	 * 插入记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 返回插入状态
	 */
	public function insert($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->rowCount();
	}


	/**
	 * 更新记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function update($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->rowCount();
	}

	/**
	 * 执行sql
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function execute($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->rowCount();
	}


	/**
	 * 删除记录
	 * @param $sql sql语句
	 * @param $params 参数数组
	 * @return 结果集数组
	 */
	public function delete($sql,$params=array())
	{
		$stmt = $this->baseQuery($sql,$params);
		return $stmt->rowCount();
	}

	/**
	 * 绑定参数
	 * @param $stmt pdo prepare对象
	 * @param $params 参数数组
	 */
	public function bindParams($stmt,$params)
	{
		foreach ($params as $k=>$v) {
			$stmt->bindParam($k,$params[$k],\PDO::PARAM_STR);
		}
	}
}