<?php

class UserValidator
{
  // 存儲表單數據
  private $data;

  // 存儲驗證錯誤
  private $errors = [];

  // 必須驗證的字段
  private static $fields = ['username', 'email'];

  // 建構函數，接收來自表單的數據
  public function __construct($post_data)
  {
    $this->data = $post_data;
  }

  // 驗證整個表單
  public function validateForm()
  {
    // 檢查必須字段是否存在於數據中
    foreach (self::$fields as $field) {
      if (!array_key_exists($field, $this->data)) {
        trigger_error("{$field} is not present in data");
        return;
      }
    }

    // 驗證單個字段
    $this->validateUsername();
    $this->validateEmail();

    // 返回錯誤數組
    return $this->errors;
  }

  // 驗證用戶名
  private function validateUsername()
  {
    // 移除前後空格
    $val = trim($this->data['username']);

    // 檢查是否為空
    if (empty($val)) {
      $this->addError('username', 'username can not be empty');
    } else {
      // 檢查是否符合6-12個字符且為字母數字
      if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
        $this->addError('username', 'username must be 6-12 chars & alphanumeric');
      }
    }
  }

  // 驗證電子郵件
  private function validateEmail()
  {
    // 移除前後空格
    $val = trim($this->data['email']);

    // 檢查是否為空
    if (empty($val)) {
      $this->addError('email', 'email can not be empty');
    } else {
      // 檢查是否為有效的電子郵件格式
      if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
        $this->addError('email', 'email must be a valid email');
      }
    }
  }

  // 添加錯誤信息到錯誤數組
  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
