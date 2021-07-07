<?php

//https://github.com/spatie/laravel-permission#installation
//https://github.com/Laravel-Backpack/PermissionManager


use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder {

    public function run() {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $objetsPermissionAdmin = [
            'ACL' => 'Droit d\'accès',
            'User' => 'User',
            'Revisions' => 'Audit',
        ];
             
        
        $cruds = [
            'create' => 'Ajouter',
            'read' => 'Lire',
            'update' => 'Modifier',
            'delete' => 'Supprimer',
        ];
        
        $objetsPermissionUser = [
            '1' => 'Creer_Demande_annuelle',
            '2' => 'Modifier_Demande_annuelle',
            '3' => 'Supprimer_Demande_annuelle',
            '4' => 'Consulter_Demande_annuelle',
            '5' => 'Telecharger_Demande_annuelle',
            
            '7' => 'Creer_Procedure_exportation',
            '8' => 'Modifier_Procedure_exportation',
            '9' => 'Supprimer_Procedure_exportation',
            '10' => 'Consulter_Procedure_exportation',
            '11' => 'Emettre_Constat_Conformite',
            '12' => 'Modifier_Constat_Conformite',
            '13' => 'Emettre_Contre_Constat_Conformite',
            '14' => 'Modifier_Contre_Constat_Conformite',
            '15' => 'Emettre_Laissez_Passer',
            '16' => 'Modifier_Laissez_Passer',
            '17' => 'Emettre_Avis_Technique',
            '18' => 'Modifier_Avis_Technique',
            '18' => 'Telecharger_Documents_Procedure_exportation',
           
        ];
        
        
        /*
          |--------------------------------------------------------------------------
          | Create permissions : CRUD
          |--------------------------------------------------------------------------
        */
        //Guard backpack
        foreach ($objetsPermissionAdmin as $objet => $objetValue) {
            foreach ($cruds as $crud => $crudValue) {
                Permission::create([
                    'name' => "$crud $objet",
                    'display_name' => $crudValue.' '."$objetValue (".guard_admin().")",
                    'guard_name' => guard_admin(),
                ]);
            }
        }
        //Guard web
        //@TODO : Filter les permission utilisables par le guard web
        foreach ($objetsPermissionUser as $objet => $objetValue) {           
                Permission::create([
                    'name' => "$objetValue",
                    'display_name' => "$objetValue",
                    'guard_name' => guard_web(),
                ]);           
        }

        /*
          |--------------------------------------------------------------------------
          | Create roles and assign created permissions. This can be done as separate statements
          |--------------------------------------------------------------------------
         */

        //1-super admin
        $permissions = Permission::where(['guard_name' => guard_admin()])->get();
        $superR = Role::create(['id' => 1, 'name' => 'SuperAdmin', 'display_name' => 'Super admin', 'guard_name' => guard_admin()]);
        $superR->syncPermissions($permissions);
         
        //2-usager
        $adminR = Role::create(['id' => 2, 'name' => 'Admin', 'display_name' => 'Admin', 'guard_name' => guard_admin()]);
        $adminR->syncPermissions($permissions);
        
        //@TODO : Programmer les permissions personnalisées par défaut pour les rôles autre que Système
        
        //3-usager
        $permissions = Permission::whereIn('name', ['Creer_Demande_annuelle', 'Modifier_Demande_annuelle', 'Supprimer_Demande_annuelle','Consulter_Demande_annuelle','Telecharger_Demande_annuelle',
                                                    'Creer_Procedure_exportation', 'Modifier_Procedure_exportation', 'Supprimer_Procedure_exportation', 'Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 3, 'name' => 'Usager', 'display_name' => 'Usager', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);    
        
         //4-Directeur Général des Eaux Forets et Chasse
        $permissions = Permission::whereIn('name', ['Consulter_Demande_annuelle','Telecharger_Demande_annuelle', 
                                                    'Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 4, 'name' => 'Directeur_DGEFC', 'display_name' => 'Directeur_DGEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
         //5-Agent_Forestier_DGEFC
        $permissions = Permission::whereIn('name', ['Consulter_Demande_annuelle','Telecharger_Demande_annuelle', 
                                                    'Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 5, 'name' => 'Agent_Forestier_DGEFC', 'display_name' => 'Agent_Forestier_DGEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //6-Directeur des Politiques, du Contrôle de l’Exploitation Forestière et du Contentieux
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 6, 'name' => 'Directeur_PCEFC', 'display_name' => 'Directeur_PCEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //7-Agent forestier Direction des Politiques, du Contrôle de l’Exploitation Forestière et du Contentieux
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 7, 'name' => 'Agent_Forestier_DPCEFC', 'display_name' => 'Agent_Forestier_DPCEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
         //8-Directeur du Reboisement et de l’Aménagement des Forêts
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation', 
                                                    'Emettre_Contre_Constat_Conformite', 'Modifier_Contre_Constat_Conformite'])->get();
        $exploitantR = Role::create(['id' => 8, 'name' => 'Directeur_RAF', 'display_name' => 'Directeur_RAF', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //9-Agent Direction du Reboisement et de l’Aménagement des Forêts
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 9, 'name' => 'Agent_Forestier_DRAF', 'display_name' => 'Agent_Forestier_DRAF', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //10-Chef d’Inspection Forestière
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation', 
                                                    'Emettre_Laissez_Passer', 'Modifier_Laissez_Passer'])->get();
        $exploitantR = Role::create(['id' => 10, 'name' => 'Chef_IF', 'display_name' => 'Chef_IF', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //11-Agent Inspection Forestière
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 11, 'name' => 'Agent_Forestier_IF', 'display_name' => 'Agent_Forestier_IF', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //12-Chef Cantonnement
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation',
                                                    'Emettre_Laissez_Passer', 'Modifier_Laissez_Passer'])->get();
        $exploitantR = Role::create(['id' => 12, 'name' => 'Chef_Cantonnement', 'display_name' => 'Chef_Cantonnement', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //13-Agent du Cantonnement
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 13, 'name' => 'Agent_Forestier_Cantonnement', 'display_name' => 'Agent_Forestier_Cantonnement', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //14-Commandantt Brigade Forestière Spéciale du Port
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 14, 'name' => 'Commandant_BFSP', 'display_name' => 'Commandant_BFSP', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //15-Agent Brigade Forestière Spéciale du Port
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 15, 'name' => 'Agent_Forestier_BFSP', 'display_name' => 'Agent_Forestier_BFSP', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //16-Responsable de la Section Communale des Eaux, Forêts et Chasse
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation',
                                                    'Emettre_Constat_Conformite', 'Modifier_Constat_Conformite'])->get();
        $exploitantR = Role::create(['id' => 16, 'name' => 'Responsable_SCEFC', 'display_name' => 'Responsable_SCEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //17-Responsable de la Section Communale des Eaux, Forêts et Chasse
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation', 'Telecharger_Documents_Procedure_exportation',
                                                    'Emettre_Constat_Conformite', 'Modifier_Constat_Conformite'])->get();
        $exploitantR = Role::create(['id' => 17, 'name' => 'Agent_Forestier_SCEFC', 'display_name' => 'Agent_Forestier_SCEFC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //18-Forestier généraliste
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 18, 'name' => 'Agent_Forestier', 'display_name' => 'Agent_Forestier', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);

        //19-Agent PAC ,  Bénin Contrôle, …
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation','Telecharger_Documents_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 19, 'name' => 'Agent_PAC', 'display_name' => 'Agent_PAC', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //20-Agent_CNCB
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 20, 'name' => 'Agent_CNCB', 'display_name' => 'Agent_CNCB', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
        //21-Agent douane
        $permissions = Permission::whereIn('name', ['Consulter_Procedure_exportation'])->get();
        $exploitantR = Role::create(['id' => 21, 'name' => 'Agent_Douane', 'display_name' => 'Agent_Douane', 'guard_name' => guard_web()]);
        $exploitantR->syncPermissions($permissions);
        
    }

}
