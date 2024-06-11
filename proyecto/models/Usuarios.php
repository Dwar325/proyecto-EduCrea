<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property string $contraseña
 * @property string $rol
 * @property int $activo
 *
 * @property Progreso[] $progresos
 * @property UsuarioPrograma[] $usuarioProgramas
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'contraseña', 'rol'], 'required'],
            [['rol'], 'string'],
            [['activo'], 'integer'],
            [['nombre', 'email', 'contraseña'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'contraseña' => 'Contraseña',
            'rol' => 'Rol',
            'activo' => 'Activo',
        ];
    }

    /**
     * Gets query for [[Progresos]].
     *
     * @return \yii\db\ActiveQuery|ProgresoQuery
     */
    public function getProgresos()
    {
        return $this->hasMany(Progreso::class, ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioProgramas]].
     *
     * @return \yii\db\ActiveQuery|UsuarioProgramaQuery
     */
    public function getUsuarioProgramas()
    {
        return $this->hasMany(UsuarioPrograma::class, ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }
}
