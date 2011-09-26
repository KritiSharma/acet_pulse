<?php
class  member
{
	public $id;
	public $name;
	public $display_picture;
	public $department;
	public $dob;
	public $sex;
	public $acc_type;
	public $batch;
	public $status;
	public $designation;
	public $experience;
	public $qualification;
	public $arr_connections;
	
	
	function __construct($id)
	{
		$userdata = mysql_query("SELECT * FROM users where user_id = '$id'") or die(mysql_error());
		while($info = mysql_fetch_array($userdata))
		{
			$this->id = $info['user_id'];
			$this->name = $info['name'];
			$this->display_picture = $info['display_picture'];
			$this->dob = $info['dob'];
			$this->department = $info['department'];
			$this->sex = $info['sex'];
			$this->acc_type = $info['user_type'];
		}
		
		if($this->acc_type == 'Student')
		{
			$studentdata = mysql_query("SELECT * FROM student where user_id = '$id'") or die(mysql_error());
			while($info = mysql_fetch_array($studentdata))
			{
				$this->batch = $info['batch'];
				$this->status = $info['status'];
			}
		}
		
		if($this->acc_type == 'Faculty')
		{
			$teacherdata = mysql_query("SELECT * FROM teachers where user_id = '$id'") or die(mysql_error());
			while($info = mysql_fetch_array($teacherdata))
			{
				$this->qualification = $info['qual'];
				$this->designation = $info['desg'];
				$this->experience = $info['exp'];
			}
		}
	}
	
	function connect($id)
	{
		$connect = mysql_query("INSERT into connections values('$this->id','$id')") or die(mysql_error());
	}
	
	function connections($id)
	{
		$query = mysql_query("Select * from connections where user_id = '$id'");
		while($info = mysql_fetch_array($query))
		{
			$this->arr_connections[] = $info['connection_id'];
		}
		
	}
}
?>