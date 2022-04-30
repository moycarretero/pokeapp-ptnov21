<?php



    namespace App\Controller;



    use Symfony\Component\HttpFoundation\Response;

    use Symfony\Component\Routing\Annotation\Route;



    class CalculaController

    {

        #[Route("/calcula/{data}")]

        public function calcula($data)

        {

            $result = null;

            if(is_numeric($data)) {



                $result = $data % 2 === 0 ? 'El numero es par' : 'El numero no es par';



            } else {

                for($i=0; $i < strlen($data); $i++) {

                   

                    if($i % 2 === 0) {

                        $data[$i] = strtoupper($data[$i]);

                    } else {

                        $data[$i] = strtolower($data[$i]);

                    }                    

                }

                $result = $data;

            }

            return new Response(content: $result);

        }



    }