<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Post::create([
        	'titulo' 		=>  'Coalas',
        	'descricao' 		=>  '----',
        	'imagemdecapa'	=> 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Cutest_Koala.jpg/800px-Cutest_Koala.jpg',
        	'status'  	=>  1,
        	'corpo' => 'Todos as descrições das pessoas são sobre a humanidade do atendimento, a pessoa pega no pulso, examina, olha com carinho. Então eu acho que vai ter outra coisa, que os médicos cubanos trouxeram pro brasil, um alto grau de humanidade.'
        ]
    );
    }
}
