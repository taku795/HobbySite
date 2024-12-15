<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/'.'Common/Const.php';
    
class URL {
    private string $_protokol;
    private string $_hostName;
    private string $_errormsg = '想定外の画面に遷移しようとしています';
    private $_pathMap = [
        'home' => PATH_HOME_PAGE,
        'login' => PATH_LOGIN_PAGE,
        'loginLogic' => PATH_LOGIN_LOGIC
    ];

    public function __construct() {
        $this->_protokol = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
        $this->_hostName = $_SERVER['SERVER_NAME'];
    }

    // 遷移先のURLを返してフロントで画面遷移させる
    public function getUrl(string $transitionPath) {
        if (!array_key_exists($transitionPath,$this->_pathMap)) {
            throw new Exception($_errormsg);
        }

        return $this->_protokol . $this->_hostName .'/'. $this->_pathMap[$transitionPath];
    }
} 

?>