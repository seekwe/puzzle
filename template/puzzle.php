<?php
namespace base;

class puzzle
{
  public $stage = "";  // 关卡编号
  public $title = "";  // title tip
  public $next = "";   // 下关链接
  public $passwd = ""; // 关卡密码
  public $jsCode = ""; // 所要插入的关卡js
  public $cssCode = ""; // 所要插入的关卡css
  public $unicode = "utf-8";
  public $sub = false;
  public $feedback = array();

  function __construct($init)
  {
    if(isset($init["stage"])) $this->stage = $init["stage"];
    if(isset($init["title"])) $this->title = $init["title"];
    if(isset($init["next"])) $this->next = $init["next"];
    if(isset($init["passwd"])) $this->passwd = $init["passwd"];
    if(isset($init["jsCode"])) $this->jsCode = $init["jsCode"];
    if(isset($init["cssCode"])) $this->cssCode = $init["cssCode"];
    if(isset($init["unicode"])) $this->unicode = $init["unicode"];
    if(isset($init["sub"])) $this->sub = $init["sub"];
    if(isset($init["feedback"])) $this->feedback = $init["feedback"];
  }

  function check()
  {
    if(isset($_POST["passwd"]))
    {

      if($_POST["passwd"] == $this->passwd)
      {
        return true;
      }
      else {
        header("Content-Type:text/html;charset=utf-8");
        if(isset($this->feedback[$_POST["passwd"]]))
        {
          echo $this->feedback[$_POST["passwd"]];
        }
        else
        {
          echo "密码错误！";
        }
        exit(0);
      }
    }
    return false;
  }

  function next()
  {
    header("Location: ".$this->next);
  }

  function header()
  {
    include($_SERVER['DOCUMENT_ROOT']."/template/header.php");
  }

  function footer()
  {
    include($_SERVER['DOCUMENT_ROOT']."/template/footer.php");
  }
}
