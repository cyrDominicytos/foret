<?php

namespace App\Models;

use App\Models\Role;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Venturecraft\Revisionable\RevisionableTrait;
use Yadahan\AuthenticationLog\AuthenticationLogable;
use App\Notifications\VerifyEmail;

class User extends Authenticatable implements MustVerifyEmail {

    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use CrudTrait;
    use RevisionableTrait;
    use AuthenticationLogable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'firstname',
        'telephone',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
     /*
      |----------------------------------------------------------------------------------------------------------------
      |Override from Illuminate\Auth\MustVerifyEmail; inhirit from Illuminate\Foundation\Auth\User as Authenticatable;
      |-----------------------------------------------------------------------------------------------------------------
     */
    
    
     /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $type = ($this->forestier || $this->intervenant) ? true : false;
        $name = $this->firstname.' '.$this->name;
        $this->notify(new VerifyEmail ($type, $name));
    }
    
    

    /*
      |--------------------------------------------------------------------------
      | FUNCTIONS
      |--------------------------------------------------------------------------
     */

    /**
     * Attempt to find the user id of the currently logged in user
     * Supports Cartalyst Sentry/Sentinel based authentication, as well as stock Auth
     * */
    public function getSystemUserId() {
        try {
            if (class_exists($class = '\SleepingOwl\AdminAuth\Facades\AdminAuth') || class_exists($class = '\Cartalyst\Sentry\Facades\Laravel\Sentry') || class_exists($class = '\Cartalyst\Sentinel\Laravel\Facades\Sentinel')
            ) {
                return ($class::check()) ? $class::getUser()->id : null;
            } elseif (\Auth::check()) {
                return \Auth::user()->getAuthIdentifier();
            } elseif (\Auth::check()) {
                //Seulement si l'utilisateur est connecté. Il faut noter que la confirmation de compte peut se faire sans être conencté. Donc, ça crée un bug quand l'utilisateur n,est pas connecté
                $user = user_web();
                return $user ? $user->id : null;
            }
        } catch (\Exception $e) {
            return null;
        }

        return null;
    }

    /**
     * Assign the given role to the model.
     *
     * @param array|string|\Spatie\Permission\Contracts\Role ...$roles
     * @param string $guard
     *
     * @return $this
     */
    public function assignRole($roles, string $guard = null) {
        $roles = is_string($roles) ? [$roles] : $roles;   //redéfinition
        $guard = $guard ?: $this->getDefaultGuardName();   //redéfinition

        $roles = collect($roles)
                ->flatten()
                ->map(function ($role) use ($guard) {   //redéfinition
                    if (empty($role)) {
                        return false;
                    }

                    return $this->getStoredRole($role, $guard);   //redéfinition
                })
                ->filter(function ($role) {
                    return $role instanceof Role;
                })
                ->each(function ($role) {
                    $this->ensureModelSharesGuard($role);
                })
                ->map->id
                ->all();

        $model = $this->getModel();

        if ($model->exists) {
            $this->roles()->sync($roles, false);
            $model->load('roles');
        } else {
            $class = \get_class($model);

            $class::saved(
                    function ($object) use ($roles, $model) {
                static $modelLastFiredOn;
                if ($modelLastFiredOn !== null && $modelLastFiredOn === $model) {
                    return;
                }
                $object->roles()->sync($roles, false);
                $object->load('roles');
                $modelLastFiredOn = $object;
            });
        }

        $this->forgetCachedPermissions();

        return $this;
    }

    /**
     * getStoredRole
     *
     * @param Role $role
     * @param string $guard
     *
     * @return $this
     */
    protected function getStoredRole($role, string $guard): Role {
        $roleClass = $this->getRoleClass();

        if (is_numeric($role)) {
            return $roleClass->findById($role, $guard);
        }

        if (is_string($role)) {
            return $roleClass->findByName($role, $guard);
        }

        return $role;
    }

    /**
     * Accès complet commun à Admin et Super
     *
     * @return Boolean
     */
    public function isSuperOrAdmin() {
        return $this->isSuper() || $this->isAdmin();
    }

    /**
     * Tester si user courant a le role super
     *
     * @return Boolean
     */
    public function isSuper() {
        return $this->hasRole([Role::super()->name], guard_admin());
    }

    /**
     * Tester si user courant a le role admin
     *
     * @return Boolean
     */
    public function isAdmin() {
        return $this->hasRole([Role::admin()->name], guard_admin());
    }

    /**
     * Tester si user courant a le role Intervenant
     *
     * @return Boolean
     */
    public function isIntervenant() {
        return $this->hasRole([Role::intervenant()->name], guard_web());
    }
    
    /**
     * retourne la nature du user: usager, forestier, ...
     *
     * @return String
     */
    public function natureIntervenant() {
        if($this->usager()){return 'Usager';}
        else if($this->forestier()){return 'Forestier';} 
        else if($this->intervenent()){return 'Intervenant';}       
    }

    
    /*
      |--------------------------------------------------------------------------
      | Relations
      |--------------------------------------------------------------------------
     */
    /**
     * Get the forestier record associated with the user.
     */
    public function forestier()
    {
        return $this->hasOne('App\Models\Forestier', 'id_user');
    }
    
    /**
     * Get the usager record associated with the user.
     */
    public function usager()
    {
        return $this->hasOne('App\Models\Usager', 'id_user');
    }
    
     /**
     * Get the Intervenant record associated with the user.
     */
    public function intervenant()
    {
        return $this->hasOne('App\Models\Intervenant', 'id_user');
    }
    
    /**
     * Get the parameters that the user modify the last.
     */
    public function parametres()
    {
        return $this->hasMany('App\Models\Parametre', 'modification_faite_par');
    }
    
    
    /*
      |--------------------------------------------------------------------------
      | Accessors
      |--------------------------------------------------------------------------
     */
    
     /**
     * Get the titre of forestier.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitreAttribute()
    {
        return ($this->forestier)? $this->forestier->titre : '';

    }
     /**
     * Get the titre of intervenant.
     *
     * @param  string  $value
     * @return string
     */
    public function getTitreIntervenantAttribute()
    {
        return ($this->intervenant)? $this->intervenant->titre : '';

    }
    
     /**
     * Get the grade of forestier.
     *
     * @param  string  $value
     * @return string
     */
    public function getGradeAttribute()
    {
        return ($this->forestier)? $this->forestier->grade : '';
    }
    
    /**
     * Get the grade of forestier.
     *
     * @param  string  $value
     * @return string
     */
    public function getCommuneAttribute()
    {
        return ($this->forestier)? $this->forestier->commune->nom : '';
    }
    /**
     * Get the grade of forestier.
     *
     * @param  string  $value
     * @return string
     */
    public function getPosteAttribute()
    {
        return ($this->forestier)? $this->forestier->poste->nom : '';
    }
    /**
     * Get the grade of intervenent.
     *
     * @param  string  $value
     * @return string
     */
    public function getPosteIntervenantAttribute()
    {
        return ($this->intervenant)? $this->intervenant->poste->nom : '';
    }
    /**
     * Get the xx of xx.
     *
     * @param  string  $value
     * @return string
     */
    public function getReferenceCarteProfessionnelleAttribute()
    {
        return ($this->usager)? $this->usager->reference_carte_professionnelle : '';
    }
    /**
     * Get the xx of xx.
     *
     * @param  string  $value
     * @return string
     */
    public function getReferencePermisCoupeAttribute()
    {
        return ($this->usager)? $this->usager->reference_permis_coupe : '';
    }
    
    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */

    /**
     * Scope a query
     *
     * @param Builder $query
     * @param string $email
     * 
     * @return Builder
     */
    public function scopeByEmail($query, $email) {
        return $query->where('email', $email);
    }

}
