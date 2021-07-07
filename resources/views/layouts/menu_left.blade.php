<!-- Sidebar Menu -->
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!-- Tableau de board -->
          <li class="nav-item">
            <a href="{{ Route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tableau de bord
              </p>
            </a>
          </li>

          @if(user_web()->hasRole(['Directeur_DGEFC']) || user_web()->usager)
          <!-- Mes Demandes -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Demandes Annuelles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(user_web()->usager)
              <li class="nav-item">
                <a href="{{ Route('nouvelle_demande') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouvelle Demande</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ Route('demandes', ['details' => 'toute']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Toutes <span class="badge badge-info right">{{ demande_user_info()['demandes_annuelle']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Mes Demandes end --> 
          @endif
          @if(user_web()->hasRole(['Directeur_DGEFC']) || user_web()->usager || user_web()->hasRole(['Agent_PAC']) || user_web()->forestier || user_web()->hasRole(['Agent_CNCB'])  || user_web()->hasRole(['Agent_Douane']) )
          <!-- Mes Procedures -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Exportations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               @if(user_web()->usager)
              <li class="nav-item">
                <a href="{{ Route('nouvelle_procedure') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouvelle Procedure</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{ Route('process', ['details' => 'toute']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Toutes <span class="badge badge-info right">{{ process_user_info()['process_toutes']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('process', ['details' => 'traitement']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En traitement <span class="badge badge-info right">{{ process_user_info()['process_traitement']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('process', ['details' => 'fermees']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fermées <span class="badge badge-info right">{{ process_user_info()['process_fermer']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('process', ['details' => 'rejetees']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejetées <span class="badge badge-info right">{{ process_user_info()['process_rejeter']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Mes Procedure end --> 
          @endif
          @if(user_web()->hasRole(['Agent_PAC']))
           <!-- Scanning -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Scanning
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('scanning', ['details' => 'attente']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scanning en attente <span class="badge badge-info right">{{ benin_control_info()['bc_attente']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('scanning', ['details' => 'conforme']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scanning conforme <span class="badge badge-info right">{{ benin_control_info()['bc_conforme']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('scanning', ['details' => 'non_conforme']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Scanning non conforme <span class="badge badge-info right">{{ benin_control_info()['bc_non_conforme']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Scanning end --> 
          @endif
          @if(user_web()->hasRole(['Agent_CNCB']))
           <!-- CNCB -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                VGM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('vgm', ['details' => 'attente']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attentes <span class="badge badge-info right">{{ cncb_info()['vgm_attente']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('vgm', ['details' => 'delivre']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrées<span class="badge badge-info right">{{ cncb_info()['vgm_recues']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- CNCB end --> 

          @endif @if(user_web()->hasRole(['Agent_Douane']))
           <!-- Douane -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                BFU
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('bfu', ['details' => 'attente']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BFU en attentes <span class="badge badge-info right">{{ douane_info()['bfu_attente']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('bfu', ['details' => 'delivre']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BFU Délivrés<span class="badge badge-info right">{{ douane_info()['bfu_delivre']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Scanning end --> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fermeture De Procédure
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liquidation', ['details' => 'attente']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ attente_fermeture()['attente_fermeture']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Scanning end --> 
          @endif

          @if(user_web()->usager)          
          <!-- Etat de versement -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Etats De Versement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste_versement.non_regle') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Réglés <span class="badge badge-info right">{{ etat_user_info()['etat_non_regle']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste_versement.regle') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Réglés <span class="badge badge-info right">{{ etat_user_info()['etat_regle']}}</span></p>
                </a>
              </li>
              
            </ul>
          </li><!-- Etat de versement end --> 
           <!-- BFU -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                BFU
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('bfu', ['details' => 'attente_usager']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Non Réglés <span class="badge badge-info right">{{ bfu_user_info()['bfu_attente']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('bfu', ['details' => 'regle']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Réglés <span class="badge badge-info right">{{ bfu_user_info()['bfu_regle']}}</span></p>
                </a>
              </li>
              
            </ul>
          </li><!-- Etat de versement end --> 
          @endif
          
          @if(user_web()->hasRole(['Commandant_BFSP', 'Agent_Forestier_BFSP']))
            <!-- bfsp -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Visa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste.en_attente_visa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente  <span class="badge badge-info right">{{ visa_info()['visa_attente']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.delivres_visa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivré <span class="badge badge-info right">{{ visa_info()['visa_delivre']}}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.visa_rejete') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Réjeté <span class="badge badge-info right">{{ visa_info()['visa_rejete']}}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- bfsp end -->  
          @endif
          @if(user_web()->hasRole(['Responsable_SCEFC', 'Agent_Forestier_SCEFC']))
          <!-- Constat de conformité -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Constats De Conformités
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste.en_attente_constat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ info_menu_constat()['constat_en_attente'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.delivres_constat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrés <span class="badge badge-info right">{{ info_menu_constat()['constat_delivre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.constat_rejete') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejetés <span class="badge badge-info right">{{ info_menu_constat()['constat_en_rejete'] }}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Constat de conformité end --> 
          @endif

          @if(user_web()->hasRole(['Chef_IF', 'Agent_Forestier_IF', 'Chef_Cantonnement', 'Agent_Forestier_Cantonnement']))
          <!-- Mes Laissez-passer -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Laissez-Passer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste.delivres') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrés <span class="badge badge-info right">{{ info_menu_laissez_passer()['lp_delivre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.en_attente') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ info_menu_laissez_passer()['procedure_attente_lp'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.etendre') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>A étendre <span class="badge badge-info right">{{ info_menu_laissez_passer()['lp_a_etendre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('liste.rejets')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejetés <span class="badge badge-info right">{{ info_menu_laissez_passer()['demande_lp_rejet'] }}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Mes Laissez-passer end --> 
          @endif

          @if(user_web()->hasRole(['Directeur_PCEFC', 'Agent_Forestier_PCEFC','Directeur_RAF', 'Agent_Forestier_DRAF']))
          <!-- Contre Constats -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Contre Constats
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste.en_attente_contre_constat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ info_menu_contre_constat()['contre_constat_en_attente'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.delivres_contre_constat') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrés <span class="badge badge-info right">{{ info_menu_contre_constat()['contre_constat_delivre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste.contre_constat_rejete') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejetés <span class="badge badge-info right">{{ info_menu_contre_constat()['contre_constat_en_rejete'] }}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Contre Constats --> 
          @endif
          @if(user_web()->hasRole(['Directeur_RAF', 'Agent_Forestier_DRAF',]))
           <!-- Etat de versement -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Etat de versement
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ Route('liste_versement.delivres') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrés <span class="badge badge-info right">{{ info_menu_etat_versement()['etat_delivre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste_versement.attente') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ info_menu_etat_versement()['etat_en_attente'] }}</span></p>
                </a>
              </li>
              
            </ul>
          </li><!-- Etat de versement end --> 

           <!-- Avis technique -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Avis techniques
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
			 <li class="nav-item">
                <a href="{{ Route('liste_avis.attente') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En attente <span class="badge badge-info right">{{ info_menu_avis_technique()['avis_attentes'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ Route('liste_avis.delivres') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Délivrés <span class="badge badge-info right">{{ info_menu_avis_technique()['avis_delivres'] }}</span></p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ Route('liste_avis.etendre') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>A étendre <span class="badge badge-info right">{{ info_menu_avis_technique()['avis_etendre'] }}</span></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{Route('liste_avis.rejet')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejetés <span class="badge badge-info right">{{ info_menu_avis_technique()['avis_rejet'] }}</span></p>
                </a>
              </li>
            </ul>
          </li><!-- Avis technique end --> 
          @endif
         

        </ul>
