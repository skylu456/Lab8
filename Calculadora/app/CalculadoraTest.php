<?php
require_once(__DIR__.'/Calculadora.php');
use \PHPUnit\Framework\TestCase;
class CalculadoraTest extends TestCase{

    public function sumarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, -2],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [0, -1, -1],
            'Caso 4' => [-1, 0, -1]
        ];
    }
    public function restarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, 0],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [0, -1, 1],
            'Caso 4' => [-1, 0, -1]
        ];
    }
    public function multiplicarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, 1],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [0, -1, 0],
            'Caso 4' => [-1, 0, 0]
        ];
    }
    public function dividirProveedor()
    {
        return [
            'Caso 1' => [-1, -1, 1, 0],
            'Caso 2' => [0, 0,"Exception", ""],
            'Caso 3' => [0, -1, 0, 0],
            'Caso 4' => [-1, 0, "Exception", ""],
            'Caso 5' => [1, 3, 0.33, 0.01]
        ];
    }

    /**
    * @dataProvider sumarProveedor
    */
    public function testSumar($numero1, $numero2, $resultado_esperado)
    {
    $calculadora = new Calculadora();
    /*$this->assertEquals(6,$calculadora->sumar(3,3));
    $this->assertSame("6",$calculadora->sumar(3,3));*/
    $this->assertEquals($resultado_esperado,$calculadora->sumar($numero1,$numero2));
    }

     /**
    * @dataProvider restarProveedor
    */        
    public function testRestar($numero1, $numero2, $resultado_esperado){
        $calculadora = new Calculadora();
        //$this->assertEquals(0,$calculadora->restar(3,3));
        $this->assertEquals($resultado_esperado,$calculadora->restar($numero1,$numero2));
    }

     /**
    * @dataProvider multiplicarProveedor
    */  
    public function testMultiplicar($numero1, $numero2, $resultado_esperado){
        $calculadora = new Calculadora();
        //$this->assertEquals(9,$calculadora->multiplicar(3,3));
        $this->assertEquals($resultado_esperado,$calculadora->multiplicar($numero1,$numero2));
    }

     /**
    * @dataProvider dividirProveedor
    */
    public function testDividir($numero1, $numero2, $resultado_esperado, $delta){
        $calculadora = new Calculadora();
        if($numero2 != 0){
            $this->assertEqualsWithDelta($resultado_esperado,$calculadora->dividir($numero1,$numero2), $delta);
        }else{
            $this->expectException('Exception');
            $calculadora->dividir($numero1, $numero2);
        }
        //$this->assertEqualsWithDelta(0.33,$calculadora->dividir(1,3),0.003);
        
    }

    public function testGenerarArreglo()
    {
        $calculadora = new Calculadora();
        //$this->assertContains(6, $calculadora->generarArreglo());
        //$this->assertCount(3, $calculadora->generarArreglo());
        $this->assertNotEmpty($calculadora->generarArreglo());
    }






}