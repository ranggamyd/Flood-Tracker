<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use Psr\Log\LoggerInterface;
use App\Models\PelaporanModel;
use CodeIgniter\HTTP\CLIRequest;
use App\Models\LokasiBanjirModel;
use App\Models\AsetTerdampakModel;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    protected $lbm;
    protected $atm;
    protected $pm;
    protected $um;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->lbm = new LokasiBanjirModel();
        $this->atm = new AsetTerdampakModel();
        $this->pm = new PelaporanModel();
        $this->um = new UserModel();
    }
}
