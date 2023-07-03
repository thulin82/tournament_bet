<?php
class Core
{
    /**
     * Current controller
     * 
     * @var string $currentController
     */
    protected $currentController = 'Pages';

    /**
     * Current method
     * 
     * @var string $currentMethod
     */
    protected $currentMethod = 'index';

    /**
     * Parameters
     * 
     * @var array $params
     */
    protected $params = [];

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $url = $this->getUrl();

        // Controller.
        if (!empty($url[0]) && file_exists('../src/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        require_once '../src/controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

        // Method.
        if (isset($url[1])) {
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Params.
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Get URL
     * 
     * @return array
     */
    public function getUrl(){
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return ['pages'];
    }
}
