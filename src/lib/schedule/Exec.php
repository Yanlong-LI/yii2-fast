<?php


namespace yanlongli\yii2\fast\lib\schedule;


class Exec extends Task
{
    protected $PHPBin;
    protected $Yii2BasePath;

    protected $command;

    public function __construct($command)
    {
        $this->command = $command;
    }

    public function run()
    {
        $response = exec("{$this->command}", $t, $r);
        if (!empty($t)) {
            $response = implode(PHP_EOL, $t);
        }
        $this->handleSuccess($response);
    }

    /**
     * @return mixed
     */
    public function getPHPBin()
    {
        return $this->PHPBin ?: 'php';
    }

    /**
     * @param mixed $PHPBin
     * @return $this
     */
    public function setPHPBin($PHPBin)
    {
        $this->PHPBin = $PHPBin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYii2BasePath()
    {
        return $this->Yii2BasePath ?: \Yii::$app->getBasePath();
    }

    /**
     * @param mixed $Yii2BasePath
     * @return $this
     */
    public function setYii2BasePath($Yii2BasePath)
    {
        $this->Yii2BasePath = $Yii2BasePath;
        return $this;
    }
}
