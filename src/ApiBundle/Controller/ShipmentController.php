<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\Repository\AbstractRepository;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
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
     *  parameters={
     *      {"name"="limit", "dataType"="integer", "required"=false, "description"="Nombre d'éléments retournés (20 par défaut)"},
     *      {"name"="page", "dataType"="integer", "required"=false, "description"="Numéro de la page souhaitée (la première page a la valeur 0)"}
     *  },
     *  statusCodes={
     *      200="Ok",
     *      500="Internal error"
     *  }
     * )
     */
    public function cgetAction(Request $request)
    {
        $limit  = ($request->query->get('limit')) ? $request->query->get('limit') : AbstractRepository::DEFAULT_LIMIT;
        $page = ($request->query->get('page')) ? $request->query->get('page') : 0;

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
