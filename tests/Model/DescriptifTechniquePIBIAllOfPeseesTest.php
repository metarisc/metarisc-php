<?php

namespace Metarisc\Test\Model;

use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;
use Metarisc\Model\DescriptifTechniquePIBIAllOfPesees;

class DescriptifTechniquePIBIAllOfPeseesTest extends TestCase
{
    private DescriptifTechniquePIBIAllOfPesees $descriptif_technique_pibi_all_of_pesees;
    private Generator $faker;

    protected function setUp() : void
    {
        $this->faker = Factory::create();

        $this->descriptif_technique_pibi_all_of_pesees = new DescriptifTechniquePIBIAllOfPesees();
        $this->descriptif_technique_pibi_all_of_pesees->setDebit1bar(1.2);

        $this->descriptif_technique_pibi_all_of_pesees->setPressionDebitRequis(1.2);

        $this->descriptif_technique_pibi_all_of_pesees->setPressionStatique(1.2);

        $this->descriptif_technique_pibi_all_of_pesees->setDebitGueuleBee(1.2);
    }

    public function testUnserialize() : void
    {
        $data = [
            'debit_1bar'            => $this->descriptif_technique_pibi_all_of_pesees->getDebit1bar(),
            'pression_debit_requis' => $this->descriptif_technique_pibi_all_of_pesees->getPressionDebitRequis(),
            'pression_statique'     => $this->descriptif_technique_pibi_all_of_pesees->getPressionStatique(),
            'debit_gueule_bee'      => $this->descriptif_technique_pibi_all_of_pesees->getDebitGueuleBee(),
        ];
        $object = DescriptifTechniquePIBIAllOfPesees::unserialize($data);
        $this->assertInstanceOf(DescriptifTechniquePIBIAllOfPesees::class, $object);
    }

    public function testgetDebit1bar() : void
    {
        $debit_1bar = $this->descriptif_technique_pibi_all_of_pesees->getDebit1bar();

        $this->assertIsFloat($debit_1bar);
        $this->descriptif_technique_pibi_all_of_pesees->setDebit1bar(2.2);
        $this->assertSame(2.2, $this->descriptif_technique_pibi_all_of_pesees->getDebit1bar());
    }

    public function testgetPressionDebitRequis() : void
    {
        $pression_debit_requis = $this->descriptif_technique_pibi_all_of_pesees->getPressionDebitRequis();

        $this->assertIsFloat($pression_debit_requis);
        $this->descriptif_technique_pibi_all_of_pesees->setPressionDebitRequis(2.2);
        $this->assertSame(2.2, $this->descriptif_technique_pibi_all_of_pesees->getPressionDebitRequis());
    }

    public function testgetPressionStatique() : void
    {
        $pression_statique = $this->descriptif_technique_pibi_all_of_pesees->getPressionStatique();

        $this->assertIsFloat($pression_statique);
        $this->descriptif_technique_pibi_all_of_pesees->setPressionStatique(2.2);
        $this->assertSame(2.2, $this->descriptif_technique_pibi_all_of_pesees->getPressionStatique());
    }

    public function testgetDebitGueuleBee() : void
    {
        $debit_gueule_bee = $this->descriptif_technique_pibi_all_of_pesees->getDebitGueuleBee();

        $this->assertIsFloat($debit_gueule_bee);
        $this->descriptif_technique_pibi_all_of_pesees->setDebitGueuleBee(2.2);
        $this->assertSame(2.2, $this->descriptif_technique_pibi_all_of_pesees->getDebitGueuleBee());
    }
}
