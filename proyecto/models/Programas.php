<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programas".
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property string $estado
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 * @property string $fecha_creacion
 * @property string $fecha_actualizacion
 *
 * @property Progreso[] $progresos
 * @property UsuarioPrograma[] $usuarioProgramas
 */
class Programas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'estado', 'fecha_creacion', 'fecha_actualizacion'], 'required'],
            [['descripcion', 'estado'], 'string'],
            [['fecha_inicio', 'fecha_fin', 'fecha_creacion', 'fecha_actualizacion'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
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
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'fecha_inicio' => 'Fecha Inicio',
            'fecha_fin' => 'Fecha Fin',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * Gets query for [[Progresos]].
     *
     * @return \yii\db\ActiveQuery|ProgresoQuery
     */
    public function getProgresos()
    {
        return $this->hasMany(Progreso::class, ['programa_id' => 'id']);
    }

    /**
     * Gets query for [[UsuarioProgramas]].
     *
     * @return \yii\db\ActiveQuery|UsuarioProgramaQuery
     */
    public function getUsuarioProgramas()
    {
        return $this->hasMany(UsuarioPrograma::class, ['programa_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProgresoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProgresoQuery(get_called_class());
    }

    public function getProgress()
    {
        if ($this->fecha_inicio && $this->fecha_fin) {
            $start = strtotime($this->fecha_inicio);
            $end = strtotime($this->fecha_fin);
            $now = time();

            if ($now < $start) return 0;
            if ($now > $end) return 100;

            $duration = $end - $start;
            $progress = $now - $start;

            return ($progress / $duration) * 100;
        }
        return 0;
    }
}
