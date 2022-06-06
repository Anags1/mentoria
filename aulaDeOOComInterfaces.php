<?php


interface MagazineInterface
{
    public function getNumberOfRounds(): int;
    public function setNumberOfRounds(int $quantity): void;
}

class Magazine implements MagazineInterface
{
    protected int $numberOfRounds;

    public function __construct(int $numberOfRounds) 
    {
        $this->setNumberOfRounds($numberOfRounds);
    }
    
    public function getNumberOfRounds(): int
    {
        return $this->numberOfRounds;
    }
    
    public function setNumberOfRounds(int $quantity): void
    {
        $this->numberOfRounds = $quantity;
    }
    
}

interface FireArmInterface 
{
    public function getMagazine(): MagazineInterface;
    public function fire(): string;
}

class AR15 implements FireArmInterface
{
    protected MagazineInterface $magazine;
    protected string $name = 'AR-15 Assault Rilfe';

    public function __construct(MagazineInterface $objMagazine)
    {
        $this->magazine = $objMagazine;
    }

    public function getMagazine(): MagazineInterface
    {
        return $this->magazine;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function fire(): string
    {
        if ($this->getMagazine()->getNumberOfRounds() >= 1) 
        {   
            $this->getMagazine()->setNumberOfRounds(
                $this->getMagazine()->getNumberOfRounds() - 1,
            );

            return 'Phew phew';
        }

        if ($this->getMagazine()->getNumberOfRounds() == 0) return 'click click, - cabou a bala';

    }
}

$objMagazine = new Magazine(2);

$objAr15 = new AR15($objMagazine);

var_dump(
    $objAr15->getMagazine()->getNumberOfRounds(),
    $objAr15->fire(),
    $objAr15->getMagazine()->getNumberOfRounds(),
    $objAr15->fire(),
    $objAr15->getMagazine()->getNumberOfRounds(),
    $objAr15->fire(),
    $objMagazine

);
