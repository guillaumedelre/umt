<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\Repository\AbstractRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class ShipmentController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Retourne une collection paginée de shipments
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Récupère une collection paginée de shipments",
     *  section="Shipment",
     *  output="CoreBundle\Entity\Shipment",
     *  statusCodes={
     *      200="Ok",
     *      500="Internal error"
     *  }
     * )
     *
     * @see http://symfony.com/doc/current/bundles/FOSRestBundle/param_fetcher_listener.html
     *
     * @Rest\QueryParam(name="limit", requirements="\d+", default="20", strict=true, nullable=true, description="Item count limit")
     * @Rest\QueryParam(name="page", requirements="\d+", default="0", strict=true, nullable=true, description="Current page of collection")
     */
    public function cgetAction(ParamFetcher $paramFetcher)
    {
        $limit   = $paramFetcher->get('limit');
        $page    = $paramFetcher->get('page');

        $collection = $this->get('core.repository.shipment')->findBy([], [], $limit, $page * $limit);

        if(!is_array($collection)) {
            throw $this->createNotFoundException();
        }

        return View::create($collection, Codes::HTTP_OK);
    }

    /**
     * Retourne le shipment dont l'id est passé en paramètre
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Récupère le shipment dont l'id est passé en paramètre",
     *  section="Shipment",
     *  output="CoreBundle\Entity\Shipment",
     *  requirements={
     *      {"name"="id", "dataType"="integer", "required"=true, "description"="Id du shipment"}
     *  },
     *  statusCodes={
     *      200="Ok",
     *      404="Not found",
     *      500="Internal error"
     *  }
     * )
     */
    public function getAction($id)
    {
        $entity = $this->get('core.repository.shipment')->find($id);

        if(!is_object($entity)) {
            throw $this->createNotFoundException();
        }

        return View::create($entity, Codes::HTTP_OK);
    }
}
