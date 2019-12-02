<?php

namespace App\Controller;

use App\Service\ContractServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     name="contract_",
 *     path="/contract"
 * )
 */
class ContractController extends AbstractController
{
    /**
     * @var ContractServiceInterface
     */
    protected $contractService;

    /**
     * ContractController constructor.
     * @param ContractServiceInterface $contractService
     */
    public function __construct(ContractServiceInterface $contractService)
    {
        $this->contractService = $contractService;
    }

    /**
     * @Route(
     *     name="create",
     *     path="/create"
     * )
     */
    /*
    public function create(int )
    {
        $this->contractService->create();
    }

    public function list()
    {

    }*/
}
