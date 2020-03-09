<?php
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Security;
use Doctrine\ORM\EntityManagerInterface;

class MenuBuilder
{

    private $factory;

    private $security;

    private $em;

    /**
     *
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory, Security $security, EntityManagerInterface $em)
    {
        $this->factory = $factory;
        $this->security = $security;
        $this->em = $em;
    }

    public function createMainAdminMenu(array $options)
    {
        //$nbReport = $this->em->getRepository('App:Fiche')->getPlanifiees(0, true);

        $menu = $this->factory->createItem('root', [
            'childrenAttributes' => [
                'class' => 'navbar-nav mr-auto'
            ]
        ]);
        $menu->addChild('Déploiement version', [
            'route' => 'adminz_varioversion_index',
            'attributes' => [
                'icon' => 'fa fa-upload'
            ],
            'extras' => [
                'safe_label' => true
            ],
            'linkAttributes' => [ // 'class' => 'nav-link'
            ]
        ]);

        $menu->addChild('Fichiers divers', [
            'route' => 'adminz_variofichier_index',
            'attributes' => [
                'icon' => 'fa fa-upload'
            ],
            'extras' => [
                'safe_label' => true
            ],
            'linkAttributes' => [ // 'class' => 'nav-link'
            ]
        ]);

        // $menu->addChild('OF', [
        //     'route' => 'admin_fabrication_encours',
        //     'attributes' => [
        //         'icon' => 'fa fa-bars'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $mp = [
        //     'route' => 'admin_planification_report',
        //     'attributes' => [
        //         'icon' => 'fa fa-clock'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => [
        //         'class' => ($nbReport > 0) ? 'text-light bg-danger' : ''
        //     ]
        // ];
        // if ($nbReport > 0) {
        //     $mp['route'] = 'admin_planification_report';
        //     $mp['linkAttributes']['class'] = 'text-danger';
        // } else {
        //     $mp['linkAttributes']['class'] = 'disabled';
        //     $mp['uri'] = '#';
        // }
        // $menu->addChild('report', $mp);

        // $mp = [
        //     'attributes' => [
        //         'icon' => 'fa fa-calendar-alt'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => [
        //         'class' => ''
        //     ]
        // ];

        // if ($nbReport > 0) {
        //     $mp['linkAttributes']['class'] = 'disabled';
        //     $mp['uri'] = '#';
        // } else {
        //     $mp['route'] = 'admin_planning_index';
        // }

        // $menu->addChild('planning', $mp);

        // $menu->addChild('débit', [
        //     'route' => 'admin_planification_debit_index',
        //     'attributes' => [
        //         'icon' => 'fa fa-sort-numeric-up'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $menu->addChild('jour', [
        //     'route' => 'admin_planification_jour',
        //     'attributes' => [
        //         'icon' => 'fa fa-file-pdf'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $menu->addChild('travaux', [
        //     'route' => 'admin_fiche_travaux',
        //     'attributes' => [
        //         'icon' => 'fa fa-user-cog'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $menu->addChild('réalisé', [
        //     'route' => 'admin_fiche_realise',
        //     'attributes' => [
        //         'icon' => 'fa fa-tasks'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown = $menu->addChild('terminé', [
        //     'uri' => '',
        //     'attributes' => [
        //         'dropdown' => true,
        //         'icon' => 'fa fa-check'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => [ // 'class' => 'nav-link dropdown-toggle'
        //     ]
        // ]);

        // $dropdown->addChild('fabrications terminées', [
        //     'route' => 'admin_fabrication_termine',
        //     'attributes' => [
        //         'icon' => 'fa fa-list-ul'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);
        // $dropdown->addChild('fiches retenues', [
        //     'route' => 'admin_fiche_termine_retenu',
        //     'attributes' => [
        //         'icon' => 'fa fa-list-ul'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown = $menu->addChild('params', [
        //     'uri' => '',
        //     'attributes' => [
        //         'dropdown' => true,
        //         'icon' => 'fab fa-whmcs'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => [ // 'class' => 'nav-link dropdown-toggle'
        //     ]
        // ]);

        // $dropdown->addChild('application', [
        //     'route' => 'admin_param_index',
        //     'attributes' => [
        //         'divider_prepend' => false,
        //         'icon' => 'fa fa-wrench '
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown->addChild('postes', [
        //     'route' => 'admin_poste_index',
        //     'attributes' => [
        //         'icon' => 'fa fa-cube'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown->addChild('utilisateurs', [
        //     'route' => 'admin_utilisateur_index',
        //     'attributes' => [
        //         'icon' => 'fa fa-users'
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown = $menu->addChild('interface', [
        //     'uri' => '',
        //     'attributes' => [
        //         'dropdown' => true,
        //         'icon' => 'fa fa-share-alt '
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => [ // 'class' => 'nav-link dropdown-toggle'
        //     ]
        // ]);

        // $dropdown->addChild('débit', [
        //     'route' => 'debit_home',
        //     'attributes' => [
        //         'icon' => 'fa fa-angle-double-down '
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $dropdown->addChild('poste', [
        //     'route' => 'poste_home',
        //     'attributes' => [
        //         'icon' => 'fa fa-archive '
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        // $menu->addChild('quitter', [
        //     'label' => '',
        //     'route' => 'app_logout',
        //     'attributes' => [
        //         'divider_prepend' => true,
        //         'icon' => 'fa fa-power-off '
        //     ],
        //     'extras' => [
        //         'safe_label' => true
        //     ],
        //     'linkAttributes' => []
        // ]);

        return $menu;
    }
}