<?php

namespace Cartman\Init\Pokemon\Model;




/**
 * Class TrainerModel
 * @package Akoceru\PokemonBattle\Model
 *
 * @Entity
 * @Table(name="pokemon")
 */
class PokemonModel implements PokemonInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $hp;

    /**
     * @var int
     */
    private $type;

    const TYPE_FIRE     = 0;
    const TYPE_WATER    = 1;
    const TYPE_PLANT    = 2;
    const TYPE_ELECTRIC = 3;
    const TYPE_PSY      = 4;
    const TYPE_NORMAL   = 5;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name => string');

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getHP()
    {
        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp += $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
        else
            throw new \Exception('HP => int && > 0');

        return $this->hp;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
            self::TYPE_FIRE,
            self::TYPE_WATER,
            self::TYPE_PLANT,
            self::TYPE_ELECTRIC,
            self::TYPE_PSY,
            self::TYPE_NORMAL,
        ]))
            $this->type = $type;
        else
            throw new \Exception('Type => Bad');

        return $this;
    }
    /**
     * @param int $type
     * @param int $type_atk
     * @return bool
     */
    public function isTypeWeak($type, $type_atk){
        if($type == self::TYPE_FIRE){
            return (self::TYPE_WATER === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_WATER){
            return (self::TYPE_PLANT === $type_atk) ? true : false;
        }
        elseif($type === self::TYPE_PLANT){
            return (self::TYPE_FIRE === $type_atk) ? true : false;
        }
        else
            return false;

    }

    /**
     * @param int $type
     * @return bool
     */
    public function isTypeStrong($type, $type_atk){
        if($type == self::TYPE_FIRE){
            return (self::TYPE_WATER === $type_atk) ? false : true;
        }
        elseif($type === self::TYPE_WATER){
            return (self::TYPE_PLANT === $type_atk) ? false : true;
        }
        elseif($type === self::TYPE_PLANT){
            return (self::TYPE_FIRE === $type_atk) ? false : true;
        }

        else
            return false;

    }

}