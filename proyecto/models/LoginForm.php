<?php

namespace app\models;

use app\models\Usuarios;
use Yii;
use yii\base\Model;
use yii\web\IdentityInterface;
use yii\web\User;

// use stmswitcher\Yii2LdapAuth\Model\LdapUser;


/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public array $oficinas;
    public string $oficina;
    public string $dependencia;
    public $rememberMe = true;
    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'rememberMe' => 'Recuerdame',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = LdapCerbero::findIdentity($this->username);
            if (!$user || !Yii::$app->ldapAuth->authenticate($user->getDn(), $this->password)) {
                Yii::$app->session->setFlash('warning', 'Contraseña Incorrecta');
                $this->addError($attribute,);
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        /**@var Usuarios $usuario */
        $usuario = Usuarios::find()->where(['nombre'=>$this->username])->one();
        if (!isset($usuario)) {
            Yii::$app->session->setFlash('error','Usuario no encontrado');
            return false;
        }
        //$apl = Aplicacion::find()->where(['apl_vcNombre'=> Yii::$app->name])->one();
        //$useapl = UsuarioAplicacion::find()->where(['usu_iCodigo'=>$usuario->usu_iCodigo])->andWhere(['apl_iCodigo'=>$apl->apl_iCodigo])->one();
        /*if(!isset($useapl)){
            Yii::$app->session->setFlash('error','Usuario no registrado en la Aplicación');
            return false;
        }*/
        /*
        if ($this->validate()) {
            $oficinas = $usuario->usuarioOficinas;
            if (!$oficinas || count($oficinas)==0){
                Yii::$app->session->setFlash('warning','El usuario necesita ser registrado en alguna Oficina, pongase en contacto con su administrador');
                return false;
            }
            Yii::$app->session->set('oficinas',$oficinas);
            Yii::$app->session->set('oficina',$oficinas[0]->ofi_iCodigo);
            return Yii::$app->user->login(
                LdapCerbero::findIdentity($this->username), 0
            );
        }*/
        return false;
    }

    public function user()
    {

        $user = Usuarios::find()->where(['nombre' => $this->username])->one();

        if (isset($user)) {
            $pass = strtoupper(sha1($this->password));

            if ($user->contraseña == $pass) {
                /*
                $apl = Aplicacion::find()->where(['apl_vcNombre'=> Yii::$app->name])->one();
                $useapl = UsuarioAplicacion::find()->where(['usu_iCodigo'=>$user->usu_iCodigo])->andWhere(['apl_iCodigo'=>$apl->apl_iCodigo])->one();
                $oficinas = $user->usuarioOficinas;
                Yii::$app->session->set('oficinas',$oficinas);
                Yii::$app->session->set('oficina',$oficinas[0]->ofi_iCodigo);
                if (isset($useapl)) {
                    return Yii::$app->user->login(
                        LdapCerbero::findIdentity($this->username), 0
                    );
                }
                Yii::$app->session->setFlash('warning', 'No puede usar esta aplicacion');
                return false;
            }*/
                Yii::$app->session->setFlash('error', 'Contraseña Incorrecta');
                return false;
            }
            Yii::$app->session->setFlash('error', 'Usuario no encontrado');
            return false;

        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return IdentityInterface|User|null
     */
    /*public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = LdapCerbero::findIdentity($this->username);
        }
        return $this->_user;
    }*/
}
