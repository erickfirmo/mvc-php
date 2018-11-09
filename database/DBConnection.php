<?php





class DBConnection
{

    protected $config;

    public function __construct()
    {
        $this->setConfig();
        $this->getPDOConnection();
    }

    
    public function getConfig($config)
    {
        return $this->config[$config];
    }

    public function getPDOConnection()
    {
        $dsn = 'mysql:host='.$this->getConfig('HOST').';dbname='.$this->getConfig('DB_NAME');

        try {
            
            $pdo = new PDO($dsn, $this->getConfig('DB_USER'), $this->getConfig('DB_PASSWORD'));
        
        } catch(Exception $ex) {

            print 'Erro: '.$ex->getMessage();

        }
    }

    public function setConfig()
    {
        $this->config = include 'Config.php';
    }
}